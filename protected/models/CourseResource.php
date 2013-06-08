<?php

/**
 * This is the model class for table "course_resource".
 *
 * The followings are the available columns in table 'course_resource':
 * @property string $id
 * @property string $user_id
 * @property string $course_id
 * @property string $class_id
 * @property string $teacher_id
 * @property string $create_time
 * @property string $category
 * @property string $detail
 * @property string $title
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property User $user
 * @property Class $class
 * @property Teacher $teacher
 */
class CourseResource extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseResource the static model class
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
		return 'course_resource';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id, title', 'required'),
			array('user_id, course_id, class_id, teacher_id', 'length', 'max'=>10),
			array('category', 'length', 'max'=>5),
			array('title', 'length', 'max'=>255),
			array('detail, description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, course_id, class_id, teacher_id, create_time, category, detail, title, description', 'safe', 'on'=>'search'),
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
			'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'class' => array(self::BELONGS_TO, 'Class', 'class_id'),
			'teacher' => array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'course_id' => 'Course',
			'class_id' => 'Class',
			'teacher_id' => 'Teacher',
			'create_time' => 'Create Time',
			'category' => 'Category',
			'detail' => 'Detail',
			'title' => 'Title',
			'description' => 'Description',
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('course_id',$this->course_id,true);
		$criteria->compare('class_id',$this->class_id,true);
		$criteria->compare('teacher_id',$this->teacher_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}