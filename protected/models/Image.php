<?php

/**
 * This is the model class for table "image".
 *
 * The followings are the available columns in table 'image':
 * @property string $id
 * @property string $file_id
 * @property string $user_id
 * @property integer $width
 * @property integer $height
 * @property string $thumbnail_uri
 * @property string $medium_uri
 * @property string $large_uri
 * @property string $is_uri_absolute
 *
 * The followings are the available model relations:
 * @property UploadFile $file
 * @property User $user
 */
class Image extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Image the static model class
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
        return 'image';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('file_id, width, height', 'required'),
            array('width, height', 'numerical', 'integerOnly' => true),
            array('file_id, user_id', 'length', 'max' => 10),
            array('thumbnail_uri, medium_uri, large_uri', 'length', 'max' => 255),
            array('is_uri_absolute', 'length', 'max' => 3),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, file_id, user_id, width, height, thumbnail_uri, medium_uri, large_uri, is_uri_absolute', 'safe', 'on' => 'search'),
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
            'file' => array(self::BELONGS_TO, 'UploadFile', 'file_id'),
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
            'file_id' => 'File',
            'user_id' => 'User',
            'width' => 'Width',
            'height' => 'Height',
            'thumbnail_uri' => 'Thumbnail Uri',
            'medium_uri' => 'Midium Uri',
            'large_uri' => 'Large Uri',
            'is_uri_absolute' => 'Is Uri Absolute',
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
        $criteria->compare('file_id', $this->file_id, true);
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('width', $this->width);
        $criteria->compare('height', $this->height);
        $criteria->compare('thumbnail_uri', $this->thumbnail_uri, true);
        $criteria->compare('medium_uri', $this->medium_uri, true);
        $criteria->compare('large_uri', $this->large_uri, true);
        $criteria->compare('is_uri_absolute', $this->is_uri_absolute, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public function afterDelete(){
        $upload_dir=Yii::app()->fileUpload->upload_dir;
        @unlink($upload_dir.$this->large_uri);
        @unlink($upload_dir.$this->medium_uri);
        @unlink($upload_dir.$this->thumbnail_uri);
        if(!empty($this->file)){
            $this->file->delete();
        }
    }

    public static function createFromUploadFile($upload_file)
    {
        $upload_dir = Yii::app()->fileUpload->upload_dir;
        $image = new Image();
        $absolute_path = $upload_dir . $upload_file->path;
        list($img_width, $img_height) = @getimagesize($absolute_path);
        $image->attributes = array(
            'file_id' => $upload_file->id,
            'user_id' => $upload_file->user_id,
            'width' => $img_width,
            'height' => $img_height,
            'is_uri_absolute' => 'no'
        );
        foreach (Yii::app()->params['image_versions'] as $version => $options) {
            $image->{$version . '_uri'} = ImageUtil::create_scaled_image($upload_dir . $upload_file->path, $upload_file->name, $version, $options);
        }
        return $image;
    }
}