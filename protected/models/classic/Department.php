<?php

Yii::import('application.models.classic._base.BaseDepartment');

class Department extends BaseDepartment
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}