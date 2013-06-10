<?php

/**
 * This is the model class for table "user_login_log".
 *
 * The followings are the available columns in table 'user_login_log':
 * @property string $id
 * @property string $user_login_id
 * @property string $ip
 * @property string $timestamp
 * @property string $success
 * @property string $is_real_user
 */
class LoginLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LoginLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_login_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_login_id, ip', 'required'),
			array('user_login_id, ip', 'length', 'max'=>50),
			array('success, is_real_user', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_login_id, ip, timestamp, success, is_real_user', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_login_id' => 'User Login',
			'ip' => 'Ip',
			'timestamp' => 'Timestamp',
			'success' => 'Success',
			'is_real_user' => 'Is Real User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_login_id',$this->user_login_id,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('success',$this->success,true);
		$criteria->compare('is_real_user',$this->is_real_user,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}