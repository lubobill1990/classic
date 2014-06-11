<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();


    public function init()
    {
        Yii::app()->viewRenderer->assign('controller', Yii::app()->controller->id);
        Yii::app()->viewRenderer->assign('page_title', Yii::app()->params['page_title']['default']);
        Yii::import('application.components.common');

        Yii::app()->viewRenderer->assign('login_user', Yii::app()->user->user);
        Yii::app()->viewRenderer->assign('YiiApp', Yii::app());
        $categories = CourseCategory::model()->findAll();
        foreach ($categories as $category) {
            $category->courses = array_slice($category->courses(), 0, 14);
        }
//        var_dump($categories[0]->courses());
        Yii::app()->viewRenderer->assign('categories', $categories);
    }
    public function setPageTitle($title_array)
    {
        if (!is_array($title_array)) {
            $arg_num = func_num_args();
            $title_array = array();
            for ($i = 0; $i < $arg_num; ++$i) {
                $title_array[] = func_get_arg($i);
            }
        }

        $page_title = '';
        $coma = '';
        foreach ($title_array as $item) {
            if (empty($item)) {
                continue;
            }
            $page_title .= $coma . $item;
            $coma = ' | ';
        }
        if ($title_array[count($title_array) - 1] != Yii::app()->name) {
            $page_title .= $coma . Yii::app()->name;
        }
        Yii::app()->viewRenderer->assign('page_title', $page_title);
        return $page_title;
    }

    /**
     * require key in given array
     * can be used in controller as:
     * $this->requireValues($_POST,array("user_id","user_name"));
     * $this->requireValues($_POST,"user_id","user_name");
     * if any of the given key does not exist, return false
     * @param $array
     * @param $key_array
     * @return bool
     */
    protected function requireValues($array, $key_array)
    {
        if (is_array($array)) {
            $validate_array = $array;
        } else {
            $validate_array = $_REQUEST;
        }
        if (!is_array($key_array)) {
            $arg_num = func_num_args();
            $key_array = array();
            for ($i = 1; $i < $arg_num; ++$i) {
                $key_array[] = func_get_arg($i);
            }
        }

        foreach ($key_array as $key) {
            if (!array_key_exists($key, $validate_array)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Use this function to load model in controller
     * the syntax is like:
     * $this->loadModel($id,ModelClassName);
     * $this->loadModel(array("polish_waiting","polish_handling"));
     * $this->loadModel(array("polish_waiting-polish_handling"));
     * @param $key
     * @param $modelClass
     * @return CActiveRecord
     * @throws CHttpException
     */
    public function loadModel($key, $modelClass)
    {
        // Get the static model.
        $staticModel = GxActiveRecord::model($modelClass);

        if (is_array($key)) {
            // The key is an array.
            // Check if there are column names indexing the values in the array.
            reset($key);
            if (key($key) === 0) {
                // There are no attribute names.
                // Check if there are multiple PK values. If there's only one, start again using only the value.
                if (count($key) === 1)
                    return $this->loadModel($key[0], $modelClass);

                // Now we will use the composite PK.
                // Check if the table has composite PK.
                $tablePk = $staticModel->getTableSchema()->primaryKey;
                if (!is_array($tablePk))
                    throw new CHttpException(400, Yii::t('controller', 'Your request is invalid.'));

                // Check if there are the correct number of keys.
                if (count($key) !== count($tablePk))
                    throw new CHttpException(400, Yii::t('controller', 'Your request is invalid.'));

                // Get an array of PK values indexed by the column names.
                $pk = $staticModel->fillPkColumnNames($key);

                // Then load the model.
                $model = $staticModel->findByPk($pk);
            } else {
                // There are attribute names.
                // Then we load the model now.
                $model = $staticModel->findByAttributes($key);
            }
        } else {
            // The key is not an array.
            // Check if the table has composite PK.
            $tablePk = $staticModel->getTableSchema()->primaryKey;
            if (is_array($tablePk)) {
                // The table has a composite PK.
                // The key must be a string to have a PK separator.
                if (!is_string($key))
                    throw new CHttpException(400, Yii::t('controller', 'Your request is invalid.'));

                // There must be a PK separator in the key.
                if (stripos($key, '-') === false)
                    throw new CHttpException(400, Yii::t('controller', 'Your request is invalid.'));

                // Generate an array, splitting by the separator.
                $keyValues = explode('-', $key);

                // Start again using the array.
                return $this->loadModel($keyValues, $modelClass);
            } else {
                // The table has a single PK.
                // Then we load the model now.
                $model = $staticModel->findByPk($key);
            }
        }

        // Check if we have a model.
        if ($model === null)
            throw new CHttpException(404, Yii::t('controller', 'The requested page does not exist.'));

        return $model;
    }
    private $message = array();

    protected function throwMessage($key, $msg, $throw = true)
    {
        $this->message[$key] = $msg;
        if ($throw) {
            throw new Exception("{$key}:{$msg}");
        }
    }

    protected function getThrownMessage()
    {
        return $this->message;
    }
}