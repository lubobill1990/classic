<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 勃
 * Date: 13-6-10
 * Time: 下午7:40
 * To change this template use File | Settings | File Templates.
 */
class ClassController extends Controller
{
    public function actionView($id){
        $class=ActualClass::model()->findByPk($id);
        if(empty($class)){
            throw new CHttpException(404);
        }
        $this->smarty->renderAll('view',array('class'=>$class));
    }
}
