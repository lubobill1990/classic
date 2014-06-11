<?php
/**
 * publish assets and return the relative path in assets
 * User: lubo
 * Date: 13-11-14
 * Time: 下午12:26
 */
function smarty_modifier_yii_assets($route)
{
    static $cache = array();
    $module = Yii::app()->controller->module;
    $path = '';
    if ($module) {
        if (isset($cache[$route])) {
            return $cache[$route];
        }
        $path = $module->getBasePath() . DIRECTORY_SEPARATOR . 'assets';
        $cache[$route] = Yii::app()->getAssetManager()->publish($path) ."/".$route;
        return $cache[$route];
    }
    throw new Exception("yii assets should be used in modules");
}