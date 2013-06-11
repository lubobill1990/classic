<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 勃
 * Date: 13-6-8
 * Time: 下午8:49
 * To change this template use File | Settings | File Templates.
 */
class CourseDocumentController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl'
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('list', 'search', 'table')
            ),
            array('allow',
                'actions' => array('modify', 'delete', 'create'),
                'users' => array('@')
            ),
            array(
                'deny',
                'users' => array('*')
            )
        );
    }

    public function actionSearch($type, $id)
    {
        if (!isset($_REQUEST['keyword'])) {
            Yi::app()->end();
        }
        $keyword = addcslashes($_REQUEST['keyword'], '%_'); // escape LIKE's special characters
        //TODO 用like的方式搜索的效率很低，如果数据量比较大，可能需要考虑其他方法
        //TODO 但实际上注意有一层course_id或者class_id的条件，会首先删选符合的记录
        //TODO 所以不会导致全表查询
        $q = new CDbCriteria(array(
            'condition' => "{$type}_id=:id AND title LIKE :match", // no quotes around :match
            'params' => array(':match' => "%$keyword%", ":id" => $id) // Aha! Wildcards go here
        ));

        $document_list = CourseDocument::model()->findAll($q);
        $this->smarty->render('table', array('documents' => $document_list));
    }

    public function actionGetItemHtml($id)
    {
        $document = CourseDocument::model()->findByPk($id);
        $this->smarty->render('item', array('doc' => $document));
    }

    public function actionList($type, $id)
    {
        $document_list = CourseDocument::model()->findAllByAttributes(array($type . "_id" => $id));
        $this->smarty->renderAll('list',
            array(
                'documents' => $document_list,
                'course_or_class' => $type,
                'course_or_class_id' => $id
            )
        );
    }

    public function actionTable($type, $id, $page = 1)
    {
        $document_list = CourseDocument::model()->findAllByAttributes(array($type . "_id" => $id));
        $this->smarty->render('table', array('documents' => $document_list));
    }

    /**
     * 根据已经上传的文件，得到该文件的upload_file对象的id，创建课程相关的document
     */
    public function actionCreate($type, $id, $file_id, $return = 'html')
    {
        if (!isset($_REQUEST['title'])) {
            AjaxResponse::missParam("未设置文件资料标题");
        }
        $file = UploadFile::model()->findByPk($file_id);
        if (empty($file)) {
            AjaxResponse::resourceNotFound("文件{$file_id}未找到");
        }
        if ($file->user_id != Yii::app()->user->id) {
            AjaxResponse::forbidden("您不是文件{$file_id}的创建者");
        }
        if (!in_array($type, array('teacher', 'course', 'class'))) {
            AjaxResponse::invalidParam();
        }
        $class_name = Common::getClassName($type);
        if($class_name=="Class"){
            $class_name="ActualClass";
        }
        $obj = $class_name::model()->findByPk($id);
        if (empty($obj)) {
            AjaxResponse::resourceNotFound();
        }
        $class_id = null;
        $teacher_id = null;
        if ($type == 'course') {
            $course_id = $obj->id;
        } elseif ($type = 'class') {
            $course_id = $obj->course->id;
            $class_id = $obj->id;
        }
        $document = new CourseDocument();
        $document->attributes = array(
            'user_id' => Yii::app()->user->id,
            'file_id' => $file_id,
            'course_id' => $course_id,
            'class_id' => $class_id,
            'title' => $_REQUEST['title'],
            'description' => isset($_REQUEST['description']) ? $_REQUEST['description'] : ''
        );
        if ($document->save()) {
            if ($return == 'html') {
                AjaxResponse::success($this->smarty->fetchString('item', array(
                    'doc' => $document
                )));
            } elseif ($return == 'json') {
                AjaxResponse::success($document);
            }
            AjaxResponse::success();
        } else {
            AjaxResponse::saveError($document->errors);
        }
    }

    public function actionDelete($doc_id)
    {
        $document = CourseDocument::model()->findByPk($doc_id);
        if (empty($document)) {
            AjaxResponse::resourceNotFound("资料{$doc_id}未找到");
        }
        if ($document->user_id != Yii::app()->user->id) {
            AjaxResponse::forbidden("您不是资料{$doc_id}的拥有者");
        }
        if ($document->delete()) {
            AjaxResponse::success();
        } else {
            AjaxResponse::nothingChanged("资料{$doc_id}未成功删除");
        }
    }

    public function actionModify($doc_id, $return = 'html')
    {
        if (!isset($_REQUEST['title'])) {
            AjaxResponse::missParam('未设置要修改的文件的标题');
        }
        $document = CourseDocument::model()->findByPk($doc_id);
        if (empty($document)) {
            AjaxResponse::resourceNotFound("资料{$doc_id}未找到");
        }
        if ($document->user_id != Yii::app()->user->id) {
            AjaxResponse::forbidden("您不是资料{$doc_id}的拥有者");
        }
        $document->title = $_REQUEST['title'];
        $document->description = isset($_REQUEST['description']) ? $_REQUEST['description'] : '';
        if ($document->save()) {
            if ($return == 'html') {
                AjaxResponse::success($this->smarty->fetchString("item", array(
                    'doc' => $document
                )));
            } elseif ($return == 'json') {
                AjaxResponse::success($document);
            }
            AjaxResponse::success();
        }
        AjaxResponse::nothingChanged();
    }
}
