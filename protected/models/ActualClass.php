<?php

/**
 * This is the model class for table "class".
 *
 * The followings are the available columns in table 'class':
 * @property string $id
 * @property string $course_id
 * @property string $major_id
 * @property string $term
 * @property string $grade
 * @property double $credit
 * @property integer $period
 * @property string $course_type
 * @property string $site_raw
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Major $major
 * @property CourseDocument[] $courseDocuments
 * @property CourseResource[] $courseResources
 * @property CourseBook[] $courseBooks
 * @property Teacher[] $teachers
 * @property TimeSite[] $timeSites
 */
class ActualClass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ActualClass the static model class
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
		return 'class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id, major_id, term, grade', 'required'),
			array('period', 'numerical', 'integerOnly'=>true),
			array('credit', 'numerical'),
			array('course_id, major_id, term, grade', 'length', 'max'=>10),
			array('course_type', 'length', 'max'=>45),
			array('site_raw', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, course_id, major_id, term, grade, credit, period, course_type, site_raw', 'safe', 'on'=>'search'),
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
			'major' => array(self::BELONGS_TO, 'Major', 'major_id'),
			'courseDocuments' => array(self::HAS_MANY, 'CourseDocument', 'class_id'),
			'courseResources' => array(self::HAS_MANY, 'CourseResource', 'class_id'),
            'courseBooks' => array(self::HAS_MANY, 'CourseBook', 'class_id'),
			'teachers' => array(self::MANY_MANY, 'Teacher', 'teaching(class_id, teacher_id)'),
			'timeSites' => array(self::HAS_MANY, 'TimeSite', 'class_id'),
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
			'major_id' => 'Major',
			'term' => 'Term',
			'grade' => 'Grade',
			'credit' => 'Credit',
			'period' => 'Period',
			'course_type' => 'Course Type',
			'site_raw' => 'Site Raw',
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
		$criteria->compare('major_id',$this->major_id,true);
		$criteria->compare('term',$this->term,true);
		$criteria->compare('grade',$this->grade,true);
		$criteria->compare('credit',$this->credit);
		$criteria->compare('period',$this->period);
		$criteria->compare('course_type',$this->course_type,true);
		$criteria->compare('site_raw',$this->site_raw,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getCampus(){
        $time_sites=$this->timeSites;
        if(!empty($time_sites)){
            return $time_sites[0]['campus'];
        }
        return '';
    }
}