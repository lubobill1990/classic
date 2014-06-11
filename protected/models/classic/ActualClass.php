<?php

Yii::import('application.models.classic._base.BaseActualClass');

class ActualClass extends BaseActualClass
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}