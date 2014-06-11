<?php
function smarty_modifier_t($text, $category, $params = array(), $source_language = null, $language = null)
{
    return Yii::t($category, $text, $params, $source_language, $language);
}