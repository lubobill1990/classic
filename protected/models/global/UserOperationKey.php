<?php

Yii::import('application.models.global._base.BaseUserOperationKey');

class UserOperationKey extends BaseUserOperationKey
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}