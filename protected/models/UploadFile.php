<?php

/**
 * This is the model class for table "upload_file".
 *
 * The followings are the available columns in table 'upload_file':
 * @property string $id
 * @property string $user_id
 * @property string $path
 * @property integer $size
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $create_time
 *
 * The followings are the available model relations:
 * @property User $user
 */
class UploadFile extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UploadFile the static model class
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
        return 'upload_file';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
//			array('path, name', 'required'),
            array('size', 'numerical', 'integerOnly' => true),
            array('user_id', 'length', 'max' => 10),
            array('path, name, description', 'length', 'max' => 255),
            array('title', 'length', 'max' => 100),
            array('create_time', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, path, size, name, title, description, create_time', 'safe', 'on' => 'search'),
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
            'path' => 'Path',
            'size' => 'Size',
            'name' => 'Name',
            'title' => 'Title',
            'description' => 'Description',
            'create_time' => 'Create Time',
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
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('path', $this->path, true);
        $criteria->compare('size', $this->size);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('create_time', $this->create_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function beforeSave()
    {
        unset($this->create_time);
        return true;
    }

    public function beforeDelete()
    {
        if (unlink(Yii::app()->fileUpload->upload_dir . $this->path)) {
            return true;
        }
        return false;
    }

    public function getUrl()
    {
        return "/upload/" . $this->path;
    }

    public function getFormattedSize()
    {
        if ($this->size < 1000) {
            return $this->size . 'B';
        } elseif ($this->size < 1000000) {
            return round($this->size / 1000, 2) . 'KB';
        } elseif ($this->size < 1000000000) {
            return round($this->size / 1000000, 2) . 'MB';
        } else {
            return round($this->size / 1000000000, 2) . 'GB';
        }

    }

    public function getIconUrl()
    {
        return Common::getFileIconUrl(strtolower(substr(strrchr($this->name, '.'), 1)));
    }
}