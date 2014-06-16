<?php

/**
 * This is the model base class for the table "classic_course".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Course".
 *
 * Columns in table "classic_course" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id
 * @property string $raw_id
 * @property string $name
 * @property string $category
 * @property double $score
 *
 * The followings are the available model relations:
 * @property ActualClass[] $classes
 * @property CourseCategory $cat
 * @property CourseDocument[] $courseDocuments
 * @property CourseResource[] $courseResources
 * @property int $courseResourceCount
 * @property CourseTag[] $courseTags
 * @property User[] $users
 * @property CourseBook[] $courseBooks
 * @property CourseBook $textBooks
 */
abstract class BaseCourse extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'classic_course';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Course|Courses', $n);
	}

	public static function representingColumn() {
		return 'raw_id';
	}

	public function rules() {
		return array(
            array('name', 'filter', 'filter' => array(Common::getHtmlPurifier(), 'purify')),
            array('raw_id, name', 'required'),
			array('score', 'numerical'),
			array('raw_id, category', 'length', 'max'=>10),
			array('name', 'length', 'max'=>255),
			array('category, score', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, raw_id, name, category, score', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
        return array(
            'classes' => array(self::HAS_MANY, 'ActualClass', 'course_id'),
            'cat' => array(self::BELONGS_TO, 'CourseCategory', 'category'),
            'courseDocuments' => array(self::HAS_MANY, 'CourseDocument', 'course_id','order'=>'courseDocuments.create_at ASC'),
            'courseResources' => array(self::HAS_MANY, 'CourseResource', 'course_id','order'=>'courseResources.create_at ASC'),
            'courseResourceCount'=>array(self::STAT,'CourseResource','course_id','select'=>"COUNT(*)"),
            'courseBooks' => array(self::HAS_MANY, 'CourseBook', 'course_id'),
            'textBooks' => array(self::HAS_MANY, 'CourseBook', 'course_id','condition'=>"type='textbook'"),
            'courseTags' => array(self::MANY_MANY, 'CourseTag', 'course_tag_map(course_id, tag_id)'),
            'users' => array(self::MANY_MANY, 'User', 'follow_course(course_id, user_id)'),
            'averageScore' => array(self::STAT, 'CourseScore', 'course_id', 'select' => 'AVG(score)',),
        );
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'raw_id' => Yii::t('app', 'Raw'),
			'name' => Yii::t('app', 'Name'),
			'category' => null,
			'score' => Yii::t('app', 'Score'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('raw_id', $this->raw_id, true);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('category', $this->category);
		$criteria->compare('score', $this->score);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}