<?php

class CourseController extends Controller
{
    public function actionCourse()
    {
        $document_list = CourseDocument::model()->findAllByAttributes(array("course_id" => 1));
        $this->smarty->render('course',array('documents'=>$document_list));
    }

    public function actionSearch()
    {
        $this->smarty->render('search');
    }

}