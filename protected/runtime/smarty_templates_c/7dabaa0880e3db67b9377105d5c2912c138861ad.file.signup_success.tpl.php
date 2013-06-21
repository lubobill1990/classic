<?php /* Smarty version Smarty-3.1.11, created on 2013-05-31 12:56:02
         compiled from "/home/lubo2/public_html/protected/templates/user/signup_success.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134834188551a82d620cf2c9-99306486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7dabaa0880e3db67b9377105d5c2912c138861ad' => 
    array (
      0 => '/home/lubo2/public_html/protected/templates/user/signup_success.tpl',
      1 => 1368534946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134834188551a82d620cf2c9-99306486',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51a82d620d4812_59341369',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a82d620d4812_59341369')) {function content_51a82d620d4812_59341369($_smarty_tpl) {?><div>
    <p>账户 <?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
 注册成功</p>

    <p>点击登录 <a href="/login">登录</a></p>
</div>
<script type="text/javascript">

</script><?php }} ?>