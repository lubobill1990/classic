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
        $this->setPageTitle($class->course->name,'课程');

        $document_list = $class->courseDocuments(array('with'=>'user'));
        $classes = $class->major->classes(
            array('alias'=>'c52',
                'condition'=>"c52.grade=$class->grade AND c52.term=$class->term AND c52.id<>$class->id",
//                'order'=>'c52.credit DESC'
            ));
        $resources = $class->courseResources(array('with' => 'user', 'limit' => Pagination::$items_per_page_map['courseResource']));
        $books=$class->courseBooks(array('with'=>'user'));
        $books2=$class->course->courseBooks(array('with'=>'user','condition'=>'class_id is NULL'));
        $books=array_merge($books,$books2);
        $this->smarty->renderAll('view', array(
            'class' => $class,
            'documents' => $document_list,
            'other_classes' => $classes,
            'resources'=>$resources,
            'books'=>$books,
            'textbooks'=>$class->textBooks,
            'resource_items_per_page'=>Pagination::$items_per_page_map['courseResource'],
        ));
    }
}
