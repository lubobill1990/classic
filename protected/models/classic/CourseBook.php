<?php

Yii::import('application.models.classic._base.BaseCourseBook');

class CourseBook extends BaseCourseBook
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}