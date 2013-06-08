<?php

/**
 * This is the model class for table "jw_data".
 *
 * The followings are the available columns in table 'jw_data':
 * @property string $course_id
 * @property integer $grade
 * @property integer $term
 * @property string $institute_id
 * @property string $dep_name
 * @property string $course_name
 * @property string $course_type
 * @property double $credit
 * @property integer $period
 * @property string $campus
 * @property string $teacher
 * @property string $site
 * @property string $id
 */
class TmpJwData extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TmpJwData the static model class
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
		return 'jw_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('grade', 'required'),
			array('grade, term, period', 'numerical', 'integerOnly'=>true),
			array('credit', 'numerical'),
			array('course_id, institute_id', 'length', 'max'=>10),
			array('dep_name, course_name, teacher', 'length', 'max'=>255),
			array('course_type, campus', 'length', 'max'=>45),
			array('site', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('course_id, grade, term, institute_id, dep_name, course_name, course_type, credit, period, campus, teacher, site, id', 'safe', 'on'=>'search'),
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
			'course_id' => 'Course',
			'grade' => 'Grade',
			'term' => 'Term',
			'institute_id' => 'Institute',
			'dep_name' => 'Dep Name',
			'course_name' => 'Course Name',
			'course_type' => 'Course Type',
			'credit' => 'Credit',
			'period' => 'Period',
			'campus' => 'Campus',
			'teacher' => 'Teacher',
			'site' => 'Site',
			'id' => 'ID',
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

		$criteria->compare('course_id',$this->course_id,true);
		$criteria->compare('grade',$this->grade);
		$criteria->compare('term',$this->term);
		$criteria->compare('institute_id',$this->institute_id,true);
		$criteria->compare('dep_name',$this->dep_name,true);
		$criteria->compare('course_name',$this->course_name,true);
		$criteria->compare('course_type',$this->course_type,true);
		$criteria->compare('credit',$this->credit);
		$criteria->compare('period',$this->period);
		$criteria->compare('campus',$this->campus,true);
		$criteria->compare('teacher',$this->teacher,true);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('id',$this->id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}