<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 勃
 * Date: 13-6-12
 * Time: 下午8:35
 * To change this template use File | Settings | File Templates.
 */
class CourseBookController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
            'postOnly+recommend,delete',
            'ajaxOnly+recommend,delete'
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('getBookInfo'),
                'users'=>array('*')
            ),
            array(
                'allow',
                'actions' => array('recommend', 'delete'),
                'users' => array("@")
            ),
            array(
                'deny',
                'users' => array("*")
            )
        );
    }

    public function actionGetBookInfo($name)
    {
        require(Yii::getPathOfAlias('ext.simple-html-dom') . '/simple_html_dom.php');
        $url='http://book.douban.com/subject_search?cat=1001&search_text='.$name;
        $html = file_get_html($url);
        $dom=$html->find("#wrapper li.subject-item");
        $i=0;
        $ret_val=array();
        foreach($dom as $element){
            if($i++>=4){
                break;
            }
            $pub_info=$element->find('.info>.pub');
            $pub_info=explode('/',trim($pub_info[0]->plaintext));
            $name=$element->find('.info>h2');
            $url=$element->find('.info>h2>a');
            $thumbnail=$element->find('.pic img');
            $book=array(
                'name'=>trim($name[0]->plaintext),
                'url'=>trim($url[0]->href),
                'thumbnail_url'=>trim($thumbnail[0]->src),
                'author'=>isset($pub_info[0])?$pub_info[0]:''
            );
            $ret_val[]=$book;
        }
        echo CJSON::encode($ret_val);
    }

    /**
     * key/value in $_POST
     * course_id
     * name
     * comment
     * url
     * thumbnail_url
     * type('textbook','reference','expand')
     *
     * optional:
     * class_id
     * isbn
     * author
     */
    public function actionRecommend()
    {
        $course_book = new CourseBook();
        if(isset($_POST['class_id'])&&!empty($_POST['class_id'])){
            $class=ActualClass::model()->with('course')->findByPk($_POST['class_id']);
            if(!empty($class)){
                $_POST['course_id']=$class->course->id;
            }else{
                unset($_POST['class_id']);
            }
        }
        $course_book->attributes = array_merge($_POST, array('user_id' => Yii::app()->user->id));
        if ($course_book->save()) {
            AjaxResponse::success();
        } else {
            AjaxResponse::saveError($course_book->errors);
        }
    }

    /**
     * required key/value in $_POST
     * id
     */
    public function actionDelete()
    {
        if (!$this->requireValues($_POST, "id")) {
            AjaxResponse::missParam("id in post is required");
        }
        if (CourseBook::model()->deleteByPk($_POST['id'], "user_id=:u", array('u' => Yii::app()->user->id))) {
            AjaxResponse::success();
        } else {
            AjaxResponse::resourceNotFound();
        }
    }
}
