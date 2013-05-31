<?php /* Smarty version Smarty-3.1.11, created on 2013-05-31 13:17:08
         compiled from "/home/lubo2/public_html/protected/modules/feedback/templates/default/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:163212422151a83254dd43f1-26653115%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6e84c4d5d5ed91182949b43fce8aece06b94a0d' => 
    array (
      0 => '/home/lubo2/public_html/protected/modules/feedback/templates/default/index.tpl',
      1 => 1369548132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163212422151a83254dd43f1-26653115',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51a83254df27e1_78422312',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a83254df27e1_78422312')) {function content_51a83254df27e1_78422312($_smarty_tpl) {?>
<script type="text/javascript">

    require(['jquery','feedback/comment.client'], function (jQuery) {
        getCommentList({
            url:"http://npeasy.com:3001/feedback/comment/listIFrame?subject_type=article&subject_id=1",
            element:$('#comment_frame').get(0)
        })
    })
</script>
<div id="comment_frame">

</div><?php }} ?>