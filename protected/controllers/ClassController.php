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
    public function actionView($id)
    {
        $class = ActualClass::model()->with(array('major', 'course'))->findByPk($id);
        if (empty($class)) {
            throw new CHttpException(404);
        }
        $document_list = CourseDocument::model()->findAllByAttributes(array("class_id" => $id));
        $classes = $class->major->classes(
            array('alias'=>'c52',
                'condition'=>"c52.grade=$class->grade AND c52.term=$class->term AND c52.id<>$class->id",
//                'order'=>'c52.credit DESC'
            ));
        $this->smarty->renderAll('view', array('class' => $class, 'documents' => $document_list, 'other_classes' => $classes));
    }
}
