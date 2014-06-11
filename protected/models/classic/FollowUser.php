<?php

Yii::import('application.models.classic._base.BaseFollowUser');

class FollowUser extends BaseFollowUser
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}