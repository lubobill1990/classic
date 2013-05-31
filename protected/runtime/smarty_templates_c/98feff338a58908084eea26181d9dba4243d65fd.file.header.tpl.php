<?php /* Smarty version Smarty-3.1.11, created on 2013-05-31 12:53:39
         compiled from "/home/lubo2/public_html/protected/templates/layouts/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44788819151a82cd32b8dd4-63341677%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98feff338a58908084eea26181d9dba4243d65fd' => 
    array (
      0 => '/home/lubo2/public_html/protected/templates/layouts/header.tpl',
      1 => 1368938319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44788819151a82cd32b8dd4-63341677',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'login_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51a82cd32bee80_31847773',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a82cd32bee80_31847773')) {function content_51a82cd32bee80_31847773($_smarty_tpl) {?><div class="header" id='page_header'>
<?php if ($_smarty_tpl->tpl_vars['login_user']->value){?>

    <?php }else{ ?>
    <div class="top-nav-info">
        <a href="/signup">注册</a>
        <a href="/login">登录</a>
    </div>
<?php }?>
    <div class="global-nav-items">
        <ul>
            <li><a href="/">rts</a></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div><?php }} ?>