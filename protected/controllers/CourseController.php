<?php

class CourseController extends Controller
{
    public function actionCourse()
    {
        $this->smarty->render('course');
    }

    public function actionSearch()
    {
        $this->smarty->render('search');
    }

}