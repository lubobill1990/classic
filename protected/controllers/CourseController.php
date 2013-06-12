<?php

class CourseController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
            'postOnly + recommendBook'
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('search', 'view', 'test')
            ),
            array('allow',
                'actions' => array('follow', 'unfollow', 'setScore', 'recommendBook'),
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
        if (empty($course)) {
            throw new CHttpException(404);
        }
        $this->setPageTitle($course->name, '课程');
        $document_list = $course->courseDocuments(array('with'=>'user'));
        $resources=$course->courseResources(array('with'=>'user'));
        $this->smarty->render('view', array('course' => $course, 'documents' => $document_list,'resources'=>$resources));
    }

    public function actionSearch()
    {
        $this->setPageTitle('搜索');
        if (isset($_REQUEST['keyword']) && mb_strlen($_REQUEST['keyword']) > 0) {
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

    public function actionSetScore($course_id, $score)
    {
        $course = Course::model()->findByPk($course_id);
        if (empty($course)) {
            AjaxResponse::resourceNotFound("课程未找到");
        }
        if ($score > 5) {
            $score = 5;
        } elseif ($score < 0) {
            $score = 0;
        }
        $course_score = CourseScore::model()->findByAttributes(array('course_id' => $course_id, 'user_id' => Yii::app()->user->id));
        if (!empty($course_score)) {
            $course_score->delete();
        }
        $course_score = new CourseScore();
        $course_score->attributes = array(
            'course_id' => $course_id,
            'user_id' => Yii::app()->user->id,
            'score' => $score
        );
        if ($course_score->save()) {
            $course->score = $course->averageScore;
            if($course->save()){
                AjaxResponse::success($course->score);
            }else{
                AjaxResponse::saveError($course->errors);
            }
        }
        AjaxResponse::saveError($course_score->errors);

    }

    public function actionRecommendBook()
    {
        $course_book=new CourseBook();
        $course_book->attributes=$_POST;
        $course_book->user_id=Yii::app()->user->id;
        if($course_book->save()){
            AjaxResponse::success();
        }else{
            AjaxResponse::saveError($course_book->errors);
        }
    }

    public function actionTest()
    {
    }
}