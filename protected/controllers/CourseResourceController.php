<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 勃
 * Date: 13-5-30
 * Time: 下午2:38
 * To change this template use File | Settings | File Templates.
 */
class CourseResourceController extends Controller
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
                'actions' => array('test', 'list', 'html', 'groupList')
            ),
            array('allow',
                'actions' => array('index', 'delete', 'modify'),
                'users' => array('@')
            ),
            array(
                'deny',
                'users' => array('*')
            )
        );
    }

    protected function getList($options)
    {
        $count = 0;
        $or = ' ';
        $sql = "SELECT file_id FROM " . UploadFileGroup::model()->tableName() . " WHERE ";
        $query_data = array();

        if (isset($options['course_id']) && !empty($options['course_id'])) {
            $count++;
            $sql .= "{$or} (subject_type='course' AND subject_id=:course_id) ";
            $or = 'OR';
            $query_data['course_id'] = $options['course_id'];
        }
        if (isset($options['teacher_id']) && !empty($options['teacher_id'])) {
            $count++;
            $sql .= "{$or} (subject_type='teacher' AND subject_id=:teacher_id) ";
            $or = 'OR';
            $query_data['teacher_id'] = $options['teacher_id'];
        }
        if (isset($options['major_id']) && !empty($options['major_id'])) {
            $count++;
            $sql .= "{$or} (subject_type='major' AND subject_id=:major_id) ";
            $or = 'OR';
            $query_data['major_id'] = $options['major_id'];
        }

        $sql .= " GROUP BY file_id HAVING count(*)='{$count}'";
        $full_sql = "SELECT * FROM upload_file AS t1 INNER JOIN ({$sql}) AS t2 ON t2.file_id=t1.id";
        $res = Yii::app()->db->createCommand($full_sql)->query($query_data)->readAll();
        $ret_val=array();
        foreach ($res as &$file) {
            $file_obj=new UploadFile();
            $file_obj->attributes=$file;
            if (empty($file_obj->title)) {
                $file_obj->title = $file_obj->name;
            }
            $ret_val[]=$file_obj;
        }
        return $ret_val;
    }

    public function actionModify($file_id)
    {
        $file = UploadFile::model()->findByPk($file_id);
        if (empty($file)) {
            AjaxResponse::resourceNotFound();
        }
        if ($file->user_id != Yii::app()->user->id) {
            AjaxResponse::forbidden();
        }
        if (!isset($_REQUEST['title'])) {
            AjaxResponse::missParam();
        }
        $file->title = $_REQUEST['title'];
        $file->description = isset($_REQUEST['description']) ? $_REQUEST['description'] : '';
        if ($file->save()) {
            AjaxResponse::success();
        } else {
            AjaxResponse::saveError($file->errors);
        }

    }

    public function actionList()
    {
        $files = $this->getList($_REQUEST);

        $this->smarty->renderAll('list', array('files' => $files));
    }
}
