<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 勃
 * Date: 13-6-8
 * Time: 下午10:54
 * To change this template use File | Settings | File Templates.
 */
class CourseResourceController extends Controller
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
            array(
                'allow',
                'actions' => array('list'),
                'users' => array("*")
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

    /**
     * page_no should be in the $_REQUEST, or it will be regarded as 0
     * @param $id
     * @param string $category
     */
    public function actionList($id,$type='course', $category = 'all')
    {
        if(!in_array($type,array('course','class'))){
            return;
        }
        $pagination_param=Pagination::getParamsFromRequest('courseResource',$_REQUEST);
        $resources=CourseResource::model()->findAll(array(
            'limit' => $pagination_param['items_per_page'],
            'offset' => $pagination_param['start'],
            'condition'=>"{$type}_id=:cid",
            'params'=>array(':cid'=>$id),
            'order'=>"create_time ASC"
        ));
        $this->smarty->render('list',array('resources'=>$resources));
    }

    /**
     * required key/value in post
     * course_id
     * title
     * description
     * url
     * category(video,link)
     */
    public function actionRecommend()
    {
        $course_resource = new CourseResource();
        $course_resource->attributes = array_merge($_POST, array(
            'user_id' => Yii::app()->user->id,
        ));
        if ($course_resource->save()) {
            AjaxResponse::success($this->smarty->fetchString('item', array('resource' => $course_resource)));
        } else {
            AjaxResponse::success($course_resource->errors);
        }
    }

    /**
     * required key/value in post
     * id
     */
    public function actionDelete()
    {
        if (!$this->requireValues($_POST, "id")) {
            AjaxResponse::missParam("id in post is required");
        }
        if (CourseResource::model()->deleteByPk($_POST['id'], "user_id=:u", array('u' => Yii::app()->user->id))) {
            AjaxResponse::success();
        } else {
            AjaxResponse::resourceNotFound();
        }
    }
}
