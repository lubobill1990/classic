<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 勃
 * Date: 13-5-16
 * Time: 上午12:01
 * To change this template use File | Settings | File Templates.
 */
/**
 *
 * */
function calc_day_of_week($day_of_week)
{
    if ($day_of_week == '周一') {
        return 1;
    } else if ($day_of_week == '周二') {
        return 2;
    } else if ($day_of_week == '周三') {
        return 3;
    } else if ($day_of_week == '周四') {
        return 4;
    } else if ($day_of_week == '周五') {
        return 5;
    } else if ($day_of_week == '周六') {
        return 6;
    } else if ($day_of_week == '周七') {
        return 7;
    }
    return 0;
}

function calc_begin_end_of_day($time_of_day)
{
    preg_match("/(\\d*)-(\\d*)/", $time_of_day, $matches);
    return array($matches[1], $matches[2]);
}

function calc_begin_end_week($week_info)
{
    if (preg_match("/(\\d*)-(\\d*)/", $week_info, $matches)) {
        return array($matches[1], $matches[2]);
    }
    return array(1, 16);
}

//the function
//Param 1 has to be an Array
//Param 2 has to be a String
function multiexplode($delimiters, $string)
{
    $ary = explode($delimiters[0], $string);
    array_shift($delimiters);
    if ($delimiters != NULL) {
        foreach ($ary as $key => $val) {
            $ary[$key] = multiexplode($delimiters, $val);
        }
    }
    return trans_tree_to_array($ary);
}

function trans_tree_to_array($tree)
{
    if (!is_array($tree)) {
        $tree = trim($tree, " ");
        if ($tree == "") {
            return array();
        } else {
            return array($tree);
        }
    }
    $arr = array();
    foreach ($tree as $node) {
        $arr = array_merge($arr, trans_tree_to_array($node));
    }
    return $arr;
}

/**
 * 从上课时间地点的字符串中分析出时间地点的数组
 * */
function analyse_site($site)
{
    $site_arr = explode("<br/>", $site);
    foreach ($site_arr as $key => $con) {
        $site_arr[$key] = array();

        $class_info = explode("&nbsp", $con);
        $site_arr[$key]['week_info'] = isset($class_info[1]) ? calc_begin_end_week($class_info[1]) : array('1', '16');
        if (preg_match('/双周/', $con)) {
            $site_arr[$key]['week_frequency'] = 'even';
        } elseif (preg_match('/单周/', $con)) {
            $site_arr[$key]['week_frequency'] = 'odd';
        } else {
            $site_arr[$key]['week_frequency'] = 'every';
        }

        $class_info = explode(" ", $class_info[0]);
        $site_arr[$key]['day_of_week'] = isset($class_info[0]) ? calc_day_of_week($class_info[0]) : array('0', '0');
        $site_arr[$key]['time_of_day'] = isset($class_info[1]) ? calc_begin_end_of_day($class_info[1]) : array('0', '0');
        $site_arr[$key]['classroom'] = isset($class_info[2]) ? $class_info[2] : '';

    }
    return $site_arr;
}

class FetchCourseDataCommand extends CConsoleCommand
{
    public $jw_url = 'http://desktop.nju.edu.cn:8080/jiaowu';
    public $jw_host = 'desktop.nju.edu.cn:8080';
    public $jw_login_url = 'http://desktop.nju.edu.cn:8080/jiaowu/login.do';

    /**
     * @auther Carrot
     * @version 1.1 2010.9.17
     * */

    /**
     * 登陆教务系统，保存会话
     */
    private function loginJWSite($username, $password)
    {
        global $cookie_jar;
        // TODO
        //教务网在此可能会改变

        $postData = "userName=" . $username . "&password=" . $password;
        $url = $this->jw_login_url;
        $header = array("Accept: text/html, application/xhtml+xml, */*",
            "Referer: " . $this->jw_url,
            "Accept-Language: zh-CN",
            "User-Agent: Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0)",
            "Content-Type: application/x-www-form-urlencoded",
            "Accept-Encoding: gzip, deflate",
            "Host: " . $this->jw_host,
            "Content-Length: " . strlen($postData),
            "Connection: Keep-Alive",
            "Pragma: no-cache");
        $cookie_jar = tempnam('./tmp', 'cookie');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar); // 把返回来的cookie信息保存在$cookie_jar文件中
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_exec($ch);
        curl_close($ch);
    }

    /**
     * 在登陆之后，获取某url指向教务网站的内容
     * @param $url
     * @return mixed
     */
    private function fetchJWData($url, $username, $password)
    {
        global $cookie_jar;
        static $ch2 = 0;
        static $has_login = false;
        if ($has_login == false) {
            echo "Login...";
            $this->loginJWSite($username, $password);
            $has_login = true;
        }
        if ($ch2 == 0) {
            $ch2 = curl_init();
        }
        curl_setopt($ch2, CURLOPT_URL, $url);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_COOKIEFILE, $cookie_jar);
        $output = curl_exec($ch2);
        return $output;
    }

    public function actionGetDepartmentAndMajorInfo($username, $password)
    {
        $url = $this->jw_url . "/student/teachinginfo/allCourseList.do?method=getTermAcademy";
        $output = $this->fetchJWData($url, $username, $password);
        //根据网页的特殊格式，获取有用的信息：$content
        preg_match("/(?<=var academys = \").*?(?=\")/", $output, $content);
        //在后面添上||，以便下面更方便地使用正则查找
        $content[0] .= "||";
        //以数字开头，并且后面是||的所有区块，每个匹配的区块相当于一个院系
        preg_match_all("/\d.+?(?=\|\|)/", $content[0], $matches);
        $dep_inserted = array();
        $maj_inserted = array();
        $dep_updated = array();
        $maj_updated = array();

        $transaction = Yii::app()->db->beginTransaction();
        try {
            foreach ($matches[0] as $department) {
                preg_match("/(\d+)_(.+?)\{\{(.*)/", $department, $match);
                $dep_id = $match[1];
                $dep_name = $match[2];
                $dep_more = $match[3];
                $dep = Department::model()->findByAttributes(array('raw_id' => $dep_id));
                if (empty($dep)) {
                    $dep = new Department();
                    $dep->attributes = array(
                        'raw_id' => $dep_id,
                        'name' => $dep_name
                    );
                    if (!$dep->save()) {
                        throw new Exception("save department {$dep->id},{$dep->raw_id},{$dep->name} fail");
                    } else {
                        $dep_inserted[] = $dep;
                    }
                } elseif ($dep->name != $dep_name) {
                    $dep->name = $dep_name;
                    if (!$dep->save()) {
                        throw new Exception("update department {$dep->id},{$dep->raw_id},{$dep->name} fail");
                    } else {
                        $dep_updated[] = dep;
                    }
                }
                preg_match_all("/([^*(]+)%(.+?)(?=\(\()/", $dep_more, $majors);

                for ($i = 0; $i < count($majors[0]); ++$i) {
                    $major_id = $majors[1][$i];
                    $major_name = $majors[2][$i];
                    $maj = Major::model()->findByAttributes(array('raw_id' => $major_id));
                    if (empty($maj)) {
                        $maj = new Major();
                        $maj->attributes = array(
                            'raw_id' => $major_id,
                            'name' => $major_name,
                            'dep_id' => $dep->id
                        );
                        if (!$maj->save()) {
                            throw new Exception("insert major {$maj->id},{$maj->raw_id},{$maj->name} fail");
                        } else {
                            $maj_inserted[] = $maj;
                        }
                    } elseif ($major_name != $maj->name || $maj->dep_id != $dep->id) {
                        $maj->name = $major_name;
                        $maj->dep_id = $dep->id;
                        if (!$maj->save()) {
                            throw new Exception("insert major {$maj->id},{$maj->raw_id},{$maj->name} fail");
                        } else {
                            $maj_updated[] = $maj;
                        }
                    }
                }
            }
            $transaction->commit();

            echo "\nDepartment inserted: " . count($dep_inserted);
            echo "\nDepartment updated: " . count($dep_updated);
            echo "\nMajor inserted: " . count($maj_inserted);
            echo "\nMajor updated: " . count($maj_updated);
        } catch (Exception $e) {
            echo "\n" . $e->getMessage();
            $transaction->rollback();
            echo "\nroll back";
        }
    }

    public function actionGetCourseRawData($username, $password, $terms, $grades)
    {
        $grades = explode(',', $grades);
        $terms = explode(',', $terms);
        $majors = Major::model()->findAll();
        $transaction = Yii::app()->db->beginTransaction();
        try {
            TmpJwData::model()->deleteAll();
            foreach ($grades as $grade) {
                $grade = trim($grade);
                echo "\n===========Grade: {$grade}======================";

                foreach ($terms as $term) {
                    $term = trim($term);
                    $a = $term / 10;
                    $b = $grade;
                    //如果学期和学生入学年份相差4以上或者小于，就表示这些学期是不可能有那些年份学生的课程的，就不要查了
                    $grade_diff = floor($a) - $b;
                    if ($grade_diff > 4 || $grade_diff < 0) {
                        continue;
                    }
                    echo "\n..........Term: {$term}......................................";
                    foreach ($majors as $major) {
                        $major_id = $major->raw_id;
                        //扒网页
                        $url = $this->jw_url . "/student/teachinginfo/allCourseList.do?method=getCourseList&curTerm=$term&curSpeciality=$major_id&curGrade=$grade";
                        $output = $this->fetchJWData($url, $username, $password);
                        echo "\n--------Major: {$major->name}-----------\n";
                        //匹配教务往特殊的html
                        $output = preg_replace("/<head>(.|\\s)*?<\\/head>/", " ", $output);
                        $output = preg_replace("/<head>(.|\\s)*?<\\/head>/", " ", $output);
                        preg_match("/<table.*?<\\/table>/s", $output, $table);
                        preg_match_all("/<tr.*?<\/tr>/s", $table[0], $table_row);

                        if (count($table_row[0]) > 2) {
                            for ($i = 1; $i < count($table_row[0]); $i++) {
                                preg_match_all("/<td.*?>(.*?)<\\/td>/", $table_row[0][$i], $course);
                                $tmpJwData = new TmpJwData();
                                $tmpJwData->attributes = array(
                                    'grade' => $grade,
                                    'term' => $term,
                                    'institute_id' => $major_id,
                                    'course_id' => $course[1][0],
                                    'course_name' => $course[1][1],
                                    'course_type' => $course[1][2],
                                    'dep_name' => $course[1][3],
                                    'credit' => $course[1][4],
                                    'period' => $course[1][5],
                                    'campus' => $course[1][6],
                                    'teacher' => $course[1][7],
                                    'site' => $course[1][8]
                                );
                                if (!$tmpJwData->save()) {
                                    throw new Exception("course {$tmpJwData->id},{$tmpJwData->course_name} save fail");
                                } else {
                                    echo '+';
                                }
                            }
                        }
                    }
                }
            }
//            TmpJwData::model()->findAllByAttributes(array(''));
            $transaction->commit();
            echo 'Operation Finished';
        } catch (Exception $e) {
            echo "\nException: " . $e->getMessage();
            $transaction->rollback();
            echo "\nRoll Back";
        }
    }

    /**
     * 1. 从tmp_jw_data表中获取所有独立的course
     * 2. 到course表中查找，确认需要update或者insert的course
     * 3. 对tmp_jw_data中的每一个课程，如果class表中不存在，则插入
     *  3.1 插入class
     *  3.2 插入time_site
     *  3.3 插入teacher
     *  3.4 插入teaching
     */
    public function actionExtractCourseRawData()
    {
        $command = Yii::app()->db->createCommand("SELECT course_id,course_name FROM jw_data GROUP BY course_id");
        $courses = $command->query();
        $transaction = Yii::app()->db->beginTransaction();
        try {
            echo "\n-------sync courses---(find if courses have any change)--";

            foreach ($courses as $course) {
                $cour = Course::model()->findByAttributes(array('raw_id' => $course['course_id']));
                if (empty($cour)) {
                    $cour = new Course();
                    $cour->attributes = array(
                        'raw_id' => $course['course_id'],
                        "name" => $course['course_name']
                    );
                    if (!$cour->save()) {
                        throw new Exception("course {$cour->id},{$cour->name} insert fail");
                    }
                } elseif ($cour->name != $course['course_name']) {
                    $cour->name = $course['course_name'];
                    if (!$cour->save()) {
                        throw new Exception("{$cour->id},{$course['course_name']}=>{$cour->name} update fail");
                    }
                }
            }
            echo "\n-------courses insert complete----";
            $tmp_jw_data_chunk = TmpJwData::model()->findAll();
            foreach ($tmp_jw_data_chunk as $tmp_jw_data) {
                $tmp_major = Major::model()->findByAttributes(array('raw_id' => $tmp_jw_data->institute_id));
                $course = Course::model()->findByAttributes(array('raw_id' => $tmp_jw_data->course_id));
                $actual_class = ActualClass::model()->findByAttributes(array(
                    'course_id' => $course->id,
                    'term' => $tmp_jw_data->term,
                    'grade' => $tmp_jw_data->grade,
                    'major_id' => $tmp_major->id
                ));
                if (empty($actual_class)) {
                    $actual_class = new ActualClass();
                    $actual_class->attributes = array(
                        'course_id' => $course->id,
                        'term' => $tmp_jw_data->term,
                        'grade' => $tmp_jw_data->grade,
                        'major_id' => $tmp_major->id,
                        'credit' => $tmp_jw_data->credit,
                        'period' => $tmp_jw_data->period,
                        'course_type' => $tmp_jw_data->course_type,
                        'site_raw' => $tmp_jw_data->site
                    );
                    if (!$actual_class->save()) {
                        throw new Exception("class insert fail");
                    }
                    echo "+";
                    $actual_class->site_raw = trim($actual_class->site_raw);
                    if (!empty($actual_class->site_raw)) {
                        $site_arr = analyse_site($actual_class->site_raw);
                        foreach ($site_arr as $site_con) {
                            $class_time_site = new TimeSite();
                            $class_time_site->attributes = array(
                                'class_id' => $actual_class->id,
                                'classroom' => $site_con['classroom'],
                                'campus' => $tmp_jw_data->campus,
                                'day_of_week' => $site_con['day_of_week'],
                                'begin_time' => $site_con['time_of_day'][0],
                                'end_time' => $site_con['time_of_day'][1],
                                'begin_week' => $site_con['week_info'][0],
                                'end_week' => $site_con['week_info'][1],
                                'week_info' => $site_con['week_info'][0] . "-" . $site_con['week_info'][1],
                                'week_frequency' => $site_con['week_frequency'],
                            );
                            if (!$class_time_site->save()) {
                                var_dump($class_time_site->errors);
                                throw new Exception("class time site insert fail");
                            }
                        }
                    }
                    if (!empty($tmp_jw_data->teacher)) {
                        $teacher_name_arr = explode(",", $tmp_jw_data->teacher);
                        foreach ($teacher_name_arr as $teacher_name) {
                            $teacher = Teacher::model()->findByAttributes(array('name' => $teacher_name));
                            if (empty($teacher)) {
                                $teacher = new Teacher();
                                $teacher->attributes = array(
                                    'name' => $teacher_name
                                );
                                if (!$teacher->save()) {
                                    throw new Exception("teacher insert fail");
                                }
                            }
                            $teaching = new Teaching();
                            $teaching->attributes = array(
                                'teacher_id' => $teacher->id,
                                'class_id' => $actual_class->id);
                            if (!$teaching->save()) {
                                throw new Exception("teaching info insert fail");
                            }
                        }
                    }
                }
            }
            $transaction->commit();
        } catch (Exception $e) {
            echo "\nException: " . $e->getMessage();
            $transaction->rollback();
            echo "\nRoll back";
        }

    }
}
