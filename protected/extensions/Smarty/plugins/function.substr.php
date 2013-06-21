<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bolu
 * Date: 12-9-8
 * Time: 上午2:09
 * To change this template use File | Settings | File Templates.
 */
function smarty_function_substr($params, $template)
{
    $source = $params['source'];
    $start = (int)$params['from'];
    $length = (int)$params['length'];
    $encode=isset($params['encode'])?$params['encode']:'';

    if($encode=='utf8'){
        return mb_substr($source,$start,$length);
    }else{
        return substr($source,$start,$length);
    }
}
