<?php

Yii::import('application.models.classic._base.BaseTimeSite');

class TimeSite extends BaseTimeSite
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}