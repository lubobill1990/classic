<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();


    public function init()
    {
        $this->smarty->assign('controller', Yii::app()->controller->id);
        $this->smarty->assign('page_title', Yii::app()->params['page_title']['default']);
        Yii::import('application.components.common');

        $this->smarty->assign('login_user', Yii::app()->user->user);
        $this->smarty->assign('YiiApp', Yii::app());
    }

    private $_smarty = null;

    public function getSmarty()
    {
        return empty($this->_smarty) ? $this->_smarty = Yii::app()->smarty : $this->_smarty;
    }
}