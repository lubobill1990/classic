<?php

/**
 * This is the model class for table "course".
 *
 * The followings are the available columns in table 'course':
 * @property string $id
 * @property string $raw_id
 * @property string $name
 * @property string $category
 * @property double $score
 *
 * The followings are the available model relations:
 * @property Class[] $classes
 * @property CourseCategory $cat
 * @property CourseDocument[] $courseDocuments
 * @property CourseResource[] $courseResources
 * @property CourseTag[] $courseTags
 * @property User[] $users
 */
class Course extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Course the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'course';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('raw_id, name', 'required'),
            array('raw_id, category', 'length', 'max' => 10),
            array('score', 'numerical'),
            array('name', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, raw_id, name, category', 'safe', 'on' => 'search'),
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
            'classes' => array(self::HAS_MANY, 'ActualClass', 'course_id'),
            'cat' => array(self::BELONGS_TO, 'CourseCategory', 'category'),
            'courseDocuments' => array(self::HAS_MANY, 'CourseDocument', 'course_id'),
            'courseResources' => array(self::HAS_MANY, 'CourseResource', 'course_id'),
            'courseTags' => array(self::MANY_MANY, 'CourseTag', 'course_tag_map(course_id, tag_id)'),
            'users' => array(self::MANY_MANY, 'User', 'follow_course(course_id, user_id)'),
            'averageScore' => array(self::STAT, 'CourseScore', 'course_id', 'select' => 'AVG(score)',),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'raw_id' => 'Raw',
            'name' => 'Name',
            'category' => "Category",
            'score' => "Score"
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('raw_id', $this->raw_id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('category', $this->category, true);
        $criteria->compare('score', $this->score, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getClassDepartmentAndMajorInfo()
    {
        $ret_val = "";
        $result_set = array();
        foreach ($this->classes as $class) {
            isset($result_set[$class->major->dep->name]) ? : $result_set[$class->major->dep->name] = array();
            $result_set[$class->major->dep->name][$class->major->name] = true;
        }
        $dep_name_split = '';
        foreach ($result_set as $dep_name => $majors) {
            if (count($majors) == 1) {
                $ret_val .= "$dep_name_split$dep_name - " . array_shift(array_keys($majors));
            } else {
                $ret_val .= "$dep_name_split$dep_name -【";
                $major_name_split = "";
                foreach ($majors as $major_name => $val) {
                    $ret_val .= $major_name_split . $major_name;
                    $major_name_split = '， ';
                }
                $ret_val .= '】';
            }
            $dep_name_split = '， ';
        }
        return $ret_val;
    }
}