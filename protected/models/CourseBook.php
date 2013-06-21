<?php

/**
 * This is the model class for table "course_book".
 *
 * The followings are the available columns in table 'course_book':
 * @property string $id
 * @property string $course_id
 * @property string $class_id
 * @property string $teacher_id
 * @property string $user_id
 * @property string $create_time
 * @property string $name
 * @property string $description
 * @property string $comment
 * @property string $url
 * @property string $thumbnail_url
 * @property string $type
 * @property string $author
 * @property string $isbn
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Course $course
 * @property Class $class
 * @property Teacher $teacher
 */
class CourseBook extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseBook the static model class
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
		return 'course_book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('name, description, comment, url, thumbnail_url, author', 'filter', 'filter' => array(Yii::app()->htmlPurifier, 'purify')),
            array('course_id, name', 'required'),
			array('course_id, class_id, teacher_id, user_id', 'length', 'max'=>10),
			array('name, author', 'length', 'max'=>255),
			array('type', 'length', 'max'=>9),
            array('isbn','length','max'=>13),
			array('description, comment, url, thumbnail_url, create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, course_id, class_id, teacher_id, user_id, create_time, name, description, comment, url, thumbnail_url, type, author, isbn', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
			'class' => array(self::BELONGS_TO, 'ActualClass', 'class_id'),
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
			'course_id' => 'Course',
			'class_id' => 'Class',
			'teacher_id' => 'Teacher',
			'user_id' => 'User',
			'create_time' => 'Create Time',
			'name' => 'Name',
			'description' => 'Description',
			'comment' => 'Comment',
			'url' => 'Url',
			'thumbnail_url' => 'Thumbnail Url',
			'type' => 'Type',
            'author' => 'Author',
            'isbn' => 'ISBN',
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
		$criteria->compare('course_id',$this->course_id,true);
		$criteria->compare('class_id',$this->class_id,true);
		$criteria->compare('teacher_id',$this->teacher_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('thumbnail_url',$this->thumbnail_url,true);
		$criteria->compare('type',$this->type,true);
        $criteria->compare('author',$this->author,true);
        $criteria->compare('isbn',$this->isbn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}