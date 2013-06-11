<?php

class CourseController extends Controller
{
    public function filters(){
        return array(
            'accessControl'
        );
    }
    public function accessRules(){
        return array(
            array('allow',
                'actions' => array('search', 'view')
            ),
            array('allow',
                'actions' => array('follow', 'unfollow'),
                'users' => array('@')
            ),
            array(
                'deny',
                'users' => array('*')
            )
        );
    }
    public function actionView($id)
    {
        $course = Course::model()->findByPk($id);
        $this->smarty->renderAll('view', array('course' => $course));
    }

    public function actionSearch()
    {
        if (Yii::app()->request->isPostRequest) {
            $keyword = addcslashes($_REQUEST['keyword'], '%_'); // escape LIKE's special characters
            //TODO 用like的方式搜索的效率很低，如果数据量比较大，可能需要考虑其他方法
            $q = new CDbCriteria(array(
                'condition' => "name LIKE :match", // no quotes around :match
                'params' => array(':match' => "%$keyword%") // Aha! Wildcards go here
            ));

            $courses = Course::model()->findAll($q);
            $array = array(
                'search_keyword' => $_REQUEST['keyword'],
                'courses' => $courses
            );
            $this->smarty->render('search', $array);
        } else {
            $this->smarty->render('search');
        }
    }

    public function actionFollow($id)
    {
        $follow_course = new FollowCourse();
        $follow_course->attributes = array(
            'user_id' => Yii::app()->user->id,
            'course_id' => $id
        );
        try {
            if ($follow_course->save()) {
                AjaxResponse::success();
            } else {
                AjaxResponse::saveError($follow_course->errors);
            }
        } catch (CDbException $e) {
            AjaxResponse::saveError($e->getMessage());
        }
    }

    public function actionUnfollow($id)
    {
        $follow_course = FollowCourse::model()->findByAttributes(array('course_id' => $id, 'user_id' => Yii::app()->user->id));
        if (empty($follow_course)) {
            AjaxResponse::resourceNotFound();
        }
        if ($follow_course->delete()) {
            AjaxResponse::success();
        } else {
            AjaxResponse::saveError($follow_course->errors);
        }
    }
}