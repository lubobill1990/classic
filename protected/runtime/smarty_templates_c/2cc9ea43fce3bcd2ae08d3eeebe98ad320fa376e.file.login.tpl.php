<?php /* Smarty version Smarty-3.1.11, created on 2013-05-31 12:55:22
         compiled from "/home/lubo2/public_html/protected/templates/user/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204925261151a82d3aaac963-37957160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cc9ea43fce3bcd2ae08d3eeebe98ad320fa376e' => 
    array (
      0 => '/home/lubo2/public_html/protected/templates/user/login.tpl',
      1 => 1369534275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204925261151a82d3aaac963-37957160',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'return_url' => 0,
    'model' => 0,
    'errors' => 0,
    'show_captcha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51a82d3aaec119_85638720',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a82d3aaec119_85638720')) {function content_51a82d3aaec119_85638720($_smarty_tpl) {?><form action="" method="post" id='login_form'>
    <input type="hidden" name="return_url" value="<?php echo $_smarty_tpl->tpl_vars['return_url']->value;?>
">
    <div>
        <label for="login_username">邮箱/用户名</label>
        <input type="text" name="LoginForm[username]" id='login_username' value="<?php echo $_smarty_tpl->tpl_vars['model']->value->username;?>
">
        <span class="validate-error" <?php if ((($tmp = @$_smarty_tpl->tpl_vars['errors']->value['username'])===null||$tmp==='' ? false : $tmp)){?>style="display: inline;"<?php }?>>邮箱/用户名或密码错误</span>
    </div>
    <div>
        <label for="login_password">密码</label>
        <input type="password" name="LoginForm[password]" id='login_password' value="<?php echo $_smarty_tpl->tpl_vars['model']->value->password;?>
">
    </div>
<?php if ($_smarty_tpl->tpl_vars['show_captcha']->value){?>
    <div>
        <label>验证码</label>
        <img src="/captcha" alt="">
    </div>
    <div>
        <label for="login_captcha_text">输入上图单词</label>
        <input type="text" id="login_captcha_text" name='captcha'>
        <span class="validate-error" id="frm_error" <?php if ((($tmp = @$_smarty_tpl->tpl_vars['errors']->value['captcha'])===null||$tmp==='' ? false : $tmp)){?>style="display: inline;"<?php }?>>请输入正确的验证码</span>
    </div>
<?php }?>
    <div>
        <label for="remember_me">记住密码？</label>
        <input type="checkbox" name="LoginForm[rememberMe]" <?php if ($_smarty_tpl->tpl_vars['model']->value->rememberMe){?>checked <?php }?> id='remember_me'
               value="1">
        <a href="/signup" class="link-signup">注册账号</a>

        <a href="/account/retrieve_password" class="link-retrieve-password">找回密码</a>
    </div>
    <div>
        <input type="submit" value="登录">
    </div>
</form><?php }} ?>