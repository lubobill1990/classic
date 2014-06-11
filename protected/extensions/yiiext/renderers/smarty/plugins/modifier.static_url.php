<?php
function smarty_modifier_static_url($route)
{
    return CHtml::normalizeUrl(array($route));
}