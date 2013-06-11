<?php

/**
 * This is the model class for table "time_site".
 *
 * The followings are the available columns in table 'time_site':
 * @property string $id
 * @property string $class_id
 * @property string $classroom
 * @property string $campus
 * @property integer $day_of_week
 * @property integer $begin_time
 * @property integer $end_time
 * @property integer $begin_week
 * @property integer $end_week
 * @property string $week_info
 * @property string $week_frequency
 * @property string $campus_id
 *
 * The followings are the available model relations:
 * @property Class $class
 */
class TimeSite extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TimeSite the static model class
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
		return 'time_site';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_id', 'required'),
			array('day_of_week, begin_time, end_time, begin_week, end_week', 'numerical', 'integerOnly'=>true),
			array('class_id', 'length', 'max'=>10),
            array('campus, week_info', 'length', 'max'=>45),
            array('classroom', 'length', 'max'=>255),
			array('week_frequency, campus_id', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, class_id, classroom, campus, day_of_week, begin_time, end_time, begin_week, end_week, week_info, campus_id', 'safe', 'on'=>'search'),
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
			'class' => array(self::BELONGS_TO, 'Class', 'class_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'class_id' => 'Class',
			'classroom' => 'Classroom',
			'campus' => 'Campus',
			'day_of_week' => 'Day Of Week',
			'begin_time' => 'Begin Time',
			'end_time' => 'End Time',
			'begin_week' => 'Begin Week',
			'end_week' => 'End Week',
			'week_info' => 'Week Info',
            'week_frequency' => 'Week Frequency',
			'campus_id' => 'Campus',
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
		$criteria->compare('class_id',$this->class_id,true);
		$criteria->compare('classroom',$this->classroom,true);
		$criteria->compare('campus',$this->campus,true);
		$criteria->compare('day_of_week',$this->day_of_week);
		$criteria->compare('begin_time',$this->begin_time);
		$criteria->compare('end_time',$this->end_time);
		$criteria->compare('begin_week',$this->begin_week);
		$criteria->compare('end_week',$this->end_week);
		$criteria->compare('week_info',$this->week_info,true);
        $criteria->compare('week_frequency',$this->week_frequency,true);
		$criteria->compare('campus_id',$this->campus_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getTimeString(){

        return Common::dayOfWeek($this->day_of_week)." {$this->begin_time}-{$this->end_time}节";
    }
}