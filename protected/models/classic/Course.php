<?php

Yii::import('application.models.classic._base.BaseCourse');

class Course extends BaseCourse
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
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