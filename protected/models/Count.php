<?php

/**
 * This is the model class for table "count".
 *
 * The followings are the available columns in table 'count':
 * @property string $subject_type
 * @property string $subject_id
 * @property string $count_type
 * @property integer $count
 */
class Count extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Count the static model class
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
		return 'count';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject_id', 'required'),
			array('count', 'numerical', 'integerOnly'=>true),
			array('subject_type', 'length', 'max'=>9),
			array('subject_id', 'length', 'max'=>11),
			array('count_type', 'length', 'max'=>19),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('subject_type, subject_id, count_type, count', 'safe', 'on'=>'search'),
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
			'subject_type' => 'Subject Type',
			'subject_id' => 'Subject',
			'count_type' => 'Count Type',
			'count' => 'Count',
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

		$criteria->compare('subject_type',$this->subject_type,true);
		$criteria->compare('subject_id',$this->subject_id,true);
		$criteria->compare('count_type',$this->count_type,true);
		$criteria->compare('count',$this->count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getRedisKey(){
        return "{$this->subject_type}:{$this->subject_id}:count:{$this->count_type}";
    }
}