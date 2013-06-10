<?php

/**
 * This is the model class for table "teacher".
 *
 * The followings are the available columns in table 'teacher':
 * @property string $id
 * @property string $name
 * @property string $gender
 * @property string $introduction
 *
 * The followings are the available model relations:
 * @property CourseDocument[] $courseDocuments
 * @property CourseResource[] $courseResources
 * @property Class[] $classes
 */
class Teacher extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Teacher the static model class
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
		return 'teacher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>32),
			array('gender', 'length', 'max'=>6),
			array('introduction', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, gender, introduction', 'safe', 'on'=>'search'),
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
			'courseDocuments' => array(self::HAS_MANY, 'CourseDocument', 'teacher_id'),
			'courseResources' => array(self::HAS_MANY, 'CourseResource', 'teacher_id'),
			'classes' => array(self::MANY_MANY, 'Class', 'teaching(teacher_id, class_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'gender' => 'Gender',
			'introduction' => 'Introduction',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('introduction',$this->introduction,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}