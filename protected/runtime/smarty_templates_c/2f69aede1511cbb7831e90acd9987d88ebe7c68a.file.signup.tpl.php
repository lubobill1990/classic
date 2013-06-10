<?php /* Smarty version Smarty-3.1.11, created on 2013-05-31 12:55:28
         compiled from "/home/lubo2/public_html/protected/templates/user/signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1655594451a82d40bb33d5-74643778%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f69aede1511cbb7831e90acd9987d88ebe7c68a' => 
    array (
      0 => '/home/lubo2/public_html/protected/templates/user/signup.tpl',
      1 => 1368964771,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1655594451a82d40bb33d5-74643778',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51a82d40bf2365_25483705',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a82d40bf2365_25483705')) {function content_51a82d40bf2365_25483705($_smarty_tpl) {?><form action="" method="post" id='signup_form'>
    <div>
        <label for="user_email">电子邮箱</label>
        <input type="text" name='User[email]' id='user_email' value="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
">
        <span class="validate-error"  <?php if ((($tmp = @$_smarty_tpl->tpl_vars['error']->value['email'])===null||$tmp==='' ? false : $tmp)){?>style="display: inline;"<?php }?>>该电子邮箱已被注册</span>

    </div>
    <div>
        <label for="user_name">用户名</label>
        <input type="text" name="User[username]" id='user_name' value="<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
">
        <span class="validate-error"  <?php if ((($tmp = @$_smarty_tpl->tpl_vars['error']->value['username'])===null||$tmp==='' ? false : $tmp)){?> style="display: inline;"<?php }?>>该用户名已被注册</span>

    </div>

    <div>
        <label for="user_password">密码</label>
        <input type="password" name='User[password]' id='user_password' value="<?php echo $_smarty_tpl->tpl_vars['user']->value->password;?>
">
    </div>
    <div>
        <label>验证码</label>
        <img src="/captcha" alt="">
    </div>
    <div><label for="captcha_text">输入上图单词</label>
        <input type="text" name="captcha" id='captcha_text'>
        <span class="validate-error" id="frm_error" <?php if ((($tmp = @$_smarty_tpl->tpl_vars['error']->value['captcha'])===null||$tmp==='' ? false : $tmp)){?>style="display: inline;"<?php }?>>请输入正确的验证码</span>
    </div>
    <div><input type="submit" value="注册"><a href="/login" class="link-login">已有账号?</a></div>
</form><?php }} ?>