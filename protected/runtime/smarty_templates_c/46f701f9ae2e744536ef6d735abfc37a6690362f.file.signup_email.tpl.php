<?php /* Smarty version Smarty-3.1.11, created on 2013-05-31 12:55:56
         compiled from "/home/lubo2/public_html/protected/templates/user/signup_email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203057913151a82d5cd40d51-79054611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46f701f9ae2e744536ef6d735abfc37a6690362f' => 
    array (
      0 => '/home/lubo2/public_html/protected/templates/user/signup_email.tpl',
      1 => 1368531226,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203057913151a82d5cd40d51-79054611',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'YiiApp' => 0,
    'activate_code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51a82d5cd78174_31969396',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a82d5cd78174_31969396')) {function content_51a82d5cd78174_31969396($_smarty_tpl) {?><div class="title">注册成功</div>
<div class="content">
    <p><span><?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
</span>，你好，</p>

    <p>欢迎您的加入，接下来您还需要激活您的账户</p>

    <p><a href="<?php echo $_smarty_tpl->tpl_vars['YiiApp']->value->getBaseUrl(true);?>
/account/activate?user_id=<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
&code=<?php echo $_smarty_tpl->tpl_vars['activate_code']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['YiiApp']->value->getBaseUrl(true);?>
/account/activate?user_id=<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
&code=<?php echo $_smarty_tpl->tpl_vars['activate_code']->value;?>
</a>
    </p>
    <p>如果上述链接不能点击，请复制到浏览器地址栏访问</p>
</div><?php }} ?>