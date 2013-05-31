<?php /* Smarty version Smarty-3.1.11, created on 2013-05-31 12:56:23
         compiled from "/home/lubo2/public_html/protected/templates/user/activate_success_email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116931526651a82d77294f49-48780910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '259828eb5e036359fd37eca971b2e04efc103ff1' => 
    array (
      0 => '/home/lubo2/public_html/protected/templates/user/activate_success_email.tpl',
      1 => 1368965559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116931526651a82d77294f49-48780910',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51a82d772b6ce7_05192519',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a82d772b6ce7_05192519')) {function content_51a82d772b6ce7_05192519($_smarty_tpl) {?>账户<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
已被激活<?php }} ?>