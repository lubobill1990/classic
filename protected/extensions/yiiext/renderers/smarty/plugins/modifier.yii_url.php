<?php
function smarty_modifier_yii_url($route)
{
    return CHtml::normalizeUrl(array($route));
}