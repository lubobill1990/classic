<?php

class CourseController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
            'postOnly + recommendBook'
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('search', 'view', 'test')
            ),
            array('allow',
                'actions' => array('follow', 'unfollow', 'setScore', 'recommendBook'),
                'users' => array('@')
            ),
            array(
                'deny',
                'users' => array('*')
            )
        );
    }

    public function actionView($id)
    {
        $course = Course::model()->findByPk($id);
        if (empty($course)) {
            throw new CHttpException(404);
        }
        $this->setPageTitle($course->name, '课程');
        $document_list = $course->courseDocuments(array('with' => array('user')));
        $resources = $course->courseResources(array('with' => array('user'), 'limit' => Pagination::$items_per_page_map['courseResource']));
        $books = $course->courseBooks(array('with' => 'user'));
        $category = $course->cat();
        $category->courses = array_slice($category->courses(), 0, 8);
//        var_dump($id);
        $this->render('view', array(
            'categoryT' => $category,
            'course' => $course,
            'documents' => $document_list,
            'resources' => $resources,
            'books' => $books,
            'textbooks' => $course->textBooks,
            'resource_items_per_page' => Pagination::$items_per_page_map['courseResource']
        ));
//        var_dump($course->name);
    }

    public function actionSearch()
    {
        $this->setPageTitle('搜索课程');
        $page_number = empty($_REQUEST['page']) ? 0 : intval($_REQUEST['page']);
        $offset = $page_number * 20;
        $limit = 20;
        $departments = Department::model()->findAll();

        $array = array('departments' => $departments);
        if (isset($_REQUEST['keyword'])) {
            $course_searcher = new CourseSearcher();
            $courses = $course_searcher->search($_REQUEST['keyword'], $search_count, $limit, $offset);
            $array = array_merge($array, array(
                'search_keyword' => $_REQUEST['keyword'],
                'courses' => $courses,
                'search_count' => $search_count
            ));
        }
        $this->render('search', $array);

    }

    public function actionFollow($id)
    {
        $follow_course = new FollowCourse();
        $follow_course->attributes = array(
            'user_id' => Yii::app()->user->id,
            'course_id' => $id
        );
        try {
            if ($follow_course->save()) {
                AjaxResponse::success();
            } else {
                AjaxResponse::saveError($follow_course->errors);
            }
        } catch (CDbException $e) {
            AjaxResponse::saveError($e->getMessage());
        }
    }

    public function actionUnfollow($id)
    {
        $follow_course = FollowCourse::model()->findByAttributes(array('course_id' => $id, 'user_id' => Yii::app()->user->id));
        if (empty($follow_course)) {
            AjaxResponse::resourceNotFound();
        }
        if ($follow_course->delete()) {
            AjaxResponse::success();
        } else {
            AjaxResponse::saveError($follow_course->errors);
        }
    }

    public function actionSetScore($course_id, $score)
    {
        $course = Course::model()->findByPk($course_id);
        if (empty($course)) {
            AjaxResponse::resourceNotFound("课程未找到");
        }
        if ($score > 5) {
            $score = 5;
        } elseif ($score < 0) {
            $score = 0;
        }
        $course_score = CourseScore::model()->findByAttributes(array('course_id' => $course_id, 'user_id' => Yii::app()->user->id));
        if (!empty($course_score)) {
            $course_score->delete();
        }
        $course_score = new CourseScore();
        $course_score->attributes = array(
            'course_id' => $course_id,
            'user_id' => Yii::app()->user->id,
            'score' => $score
        );
        if ($course_score->save()) {
            $course->score = $course->averageScore;
            if ($course->save()) {
                AjaxResponse::success($course->score);
            } else {
                AjaxResponse::saveError($course->errors);
            }
        }
        AjaxResponse::saveError($course_score->errors);

    }

    public function actionRecommendBook()
    {
        $course_book = new CourseBook();
        $course_book->attributes = $_POST;
        $course_book->user_id = Yii::app()->user->id;
        if ($course_book->save()) {
            AjaxResponse::success();
        } else {
            AjaxResponse::saveError($course_book->errors);
        }
    }

    public function actionTest()
    {
    }
}