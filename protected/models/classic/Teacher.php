<?php

Yii::import('application.models.classic._base.BaseTeacher');

class Teacher extends BaseTeacher
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}