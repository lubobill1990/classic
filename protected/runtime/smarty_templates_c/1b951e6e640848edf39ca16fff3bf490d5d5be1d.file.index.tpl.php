<?php /* Smarty version Smarty-3.1.11, created on 2013-05-31 12:53:39
         compiled from "/home/lubo2/public_html/protected/templates/site/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26834692251a82cd32661f5-69476686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b951e6e640848edf39ca16fff3bf490d5d5be1d' => 
    array (
      0 => '/home/lubo2/public_html/protected/templates/site/index.tpl',
      1 => 1369419959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26834692251a82cd32661f5-69476686',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'login_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51a82cd328f3a3_35639554',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a82cd328f3a3_35639554')) {function content_51a82cd328f3a3_35639554($_smarty_tpl) {?>
<div>
<?php if ($_smarty_tpl->tpl_vars['login_user']->value){?>
    <?php echo $_smarty_tpl->tpl_vars['login_user']->value->email;?>


    <?php }?>
</div>
<?php }} ?>