<?php /* Smarty version Smarty-3.1.11, created on 2013-05-31 12:53:39
         compiled from "/home/lubo2/public_html/protected/templates/layouts/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125054486651a82cd3291a50-57613812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7061770a94c5c42688a363a1f85e696011b89d6f' => 
    array (
      0 => '/home/lubo2/public_html/protected/templates/layouts/main.tpl',
      1 => 1369717360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125054486651a82cd3291a50-57613812',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_title' => 0,
    'script_tpl' => 0,
    'content_tpl' => 0,
    'login_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51a82cd32b76b7_75128115',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a82cd32b76b7_75128115')) {function content_51a82cd32b76b7_75128115($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <script type="text/javascript" src='/javascripts/require.2.1.5.js'></script>
    <script type="text/javascript" src='/javascripts/main.js'></script>
<?php if ((($tmp = @$_smarty_tpl->tpl_vars['script_tpl']->value)===null||$tmp==='' ? '' : $tmp)){?>
    <?php echo $_smarty_tpl->tpl_vars['script_tpl']->value;?>

<?php }?>
    <link rel="stylesheet" href="/stylesheets/screen.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/stylesheets/font-awesome-ie7.min.css">
    <![endif]-->
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('layouts/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page_wrapper">
    <div class="container">
    <?php if ((($tmp = @$_smarty_tpl->tpl_vars['content_tpl']->value)===null||$tmp==='' ? '' : $tmp)){?>
        <?php echo $_smarty_tpl->tpl_vars['content_tpl']->value;?>

    <?php }?>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('layouts/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ((($tmp = @$_smarty_tpl->tpl_vars['login_user']->value)===null||$tmp==='' ? false : $tmp)&&$_smarty_tpl->tpl_vars['login_user']->value->id){?>
<script type="text/javascript">
//    require(['jquery'], function ($) {
//        $(function () {
//            $.get('/message/webIM', function (data) {
//                if (data.success) {
//                    $('body').append(data.data)
//                }
//            }, 'json')
//        })
//    })
//    require(['cssrefresh'],function(){
//
//    })
</script>

<?php }?>
</html>
<?php }} ?>