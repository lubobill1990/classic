<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 勃
 * Date: 13-5-28
 * Time: 下午3:14
 * To change this template use File | Settings | File Templates.
 */
class ImageController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl'
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('test', 'list','html')
            ),
            array('allow',
                'actions' => array('index', 'delete', 'create'),
                'users' => array('@')
            ),
            array(
                'deny',
                'users' => array('*')
            )
        );
    }

    public function actionCreate()
    {
        try {
            $ret_val = array();
            $files = Yii::app()->fileUpload->post();
            foreach ($files as $file) {
                if(empty($file->object)){
                    continue;
                }
                $upload_file = $file->object;
                ImageUtil::orient_image(Yii::app()->fileUpload->upload_dir.$upload_file->path);
                try{
                    $image = Image::createFromUploadFile($upload_file);
                }catch(Exception $e){
                    $upload_file->delete();
                    continue;
                }
                if (!$image->save()) {
                    var_dump($image->errors);
                }
                $ret_val[] = array(
                    'name' => $file->name,
                    'url' => Yii::app()->fileUpload->upload_url . $upload_file->path,
                    'thumbnail_url' => Yii::app()->fileUpload->upload_url . $image->thumbnail_uri,
                    'delete_url' => "/image/delete?id={$image->id}",
                    'delete_type'=>"post",
                    'size' => $upload_file->size
                );
            }
            Yii::app()->fileUpload->generate_response(
                array("files" => $ret_val));
        } catch (Exception $e) {

        }

    }

    public function actionDelete($id)
    {
        $image=Image::model()->findByPk($id);
        if(empty($image)){
            AjaxResponse::resourceNotFound();
        }
        if($image->user_id!=Yii::app()->user->id){
            AjaxResponse::forbidden();
        }
        if($image->delete()){
            AjaxResponse::success();
        }
        AjaxResponse::nothingChanged();
    }

    public function actionList()
    {

    }
    public function actionTest(){
        $this->smarty->renderAll();
    }
    public function actionHtml()
    {
        $this->smarty->render('html');
    }
}
