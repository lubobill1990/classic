<?php
/**
 * @param $params name, label, checkboxes[[name, label, checked]]
 * @param $smarty
 * @return mixed
 * @throws CException
 */
function smarty_function_process_step($params, &$smarty)
{
    return $smarty->fetch('pluginViews.process_step.main', $params);
}