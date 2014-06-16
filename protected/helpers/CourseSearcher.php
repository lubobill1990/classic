<?php
/**
 * Created by PhpStorm.
 * User: lubo
 * Date: 14-6-13
 * Time: 上午10:02
 */

class CourseSearcher
{
    /**
     * @param $search_keywords
     * 可以为：课程名称 教师名称 用户名
     * 课程名称和教师名称可以搜到对应的课程
     * 用户名可以搜到该用户，进入该用户的个人主页
     * 多个搜索关键词用空格分隔，为'AND'关系，如搜索：
     * 吕晓一 指挥
     * 就不会出现吕晓一的西方音乐鉴赏课程
     * @param $search_count
     * @param int $limit
     * @param int $offset
     * @param string $search_in_departments
     * 格式：
     * all|1,2,4
     * 逗号分隔的
     * @param $search_time
     * 格式：
     * 2-5|2-10
     * [
     * ['weekday'=>2,'from'=>5,'to'=>5],
     * ['weekday'=>2,'from'=>10,'to'=>10],
     * ]
     *
     * 周三第一节到周三第五节 或者 周三第十节
     * 格式：
     * 3-1~5|3-10
     * [
     * ['weekday'=>3,'from'=>1,'to'=>5],
     * ['weekday'=>3,'from'=>10,'to'=>10],
     * ]
     * @param $search_site
     * 格式：
     * 图书馆109|图书馆108|仙Ⅱ120
     * ['图书馆109', '图书馆108', '仙Ⅱ120']
     *
     * 仙Ⅱ 或者 图书馆
     * ['仙Ⅱ', '图书馆']
     *
     * 仙Ⅱ 或者 逸夫楼107
     * ['仙Ⅱ', '逸夫楼107']
     * @return \CActiveRecord[]
     */
    public function search($search_keywords, &$search_count, $limit = 20, $offset = 0, $search_in_departments = 'all', $search_time = null, $search_site = null)
    {
        $time_list = $this->parseTime($search_time);
        $site_list = $this->parseSite($search_site);
        $department_list = $this->parseDepartmentList($search_in_departments);

        $keywords = $this->parseKeyword($search_keywords);

        $course_criteria = new CDbCriteria();
        foreach ($keywords as $keyword) {
            $course_criteria->addSearchCondition('name', $keyword);
        }
        $course_criteria->alias = "crs";
        $course_criteria->join = "LEFT JOIN " . ActualClass::model()->tableName() . " AS cls ON cls.course_id=crs.id";
        $course_criteria->addCondition("cls.term=" . $this->getCurrentTerm());
        if($department_list!=='all'){
            $course_criteria->addInCondition("cls.major_id",$department_list);
        }

        $search_count_cache_key = "count:" . $search_keywords . $search_in_departments . $search_time . $search_site;

        $search_count = Yii::app()->cache->get($search_count_cache_key);
        if ($search_count === false) {
            $search_count = Course::model()->count($course_criteria);
            Yii::app()->cache->set($search_count_cache_key, $search_count);
        }

        $course_criteria->offset = $offset;
        $course_criteria->limit = $limit;


        $courses = Course::model()->findAll($course_criteria);
        return $courses;
    }

    public function getCurrentTerm()
    {
        $year = strftime("%Y");
        $month = strftime("%m");
        if ($month < 8) {
            return ($year - 1) . '2';
        } else {
            return $year . "1";
        }
    }

    public function parseKeyword($keyword)
    {
        return explode(' ', $keyword);
    }

    public function parseDepartmentList($department_list)
    {
        if (strpos($department_list, ',') !== false) {
            $ret_val = explode(',', $department_list);
        } else {
            $ret_val = $department_list;
        }
        return $ret_val;
    }

    public function parseTime($search_time)
    {
        $ret_val = array();
        if (empty($search_time)) {
            return $ret_val;
        }
        foreach (explode('|', $search_time) as $time) {
            list($weekday, $class_period) = explode('-', $time);
            $class_period = explode('~', $class_period);
            $class_time_to = $class_time_from = $class_period[0];
            if (count($class_period) > 1) {
                $class_time_to = $class_period[1];
            }
            $ret_val[] = array('weekday' => $weekday,
                'from' => $class_time_from, 'to' => $class_time_to);
        }
        return $ret_val;
    }

    public function parseSite($site)
    {
        return explode('|', $site);
    }
} 