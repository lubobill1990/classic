<?php /* Smarty version Smarty-3.1.11, created on 2013-06-09 15:12:59
         compiled from "/home/lubo2/public_html/protected/templates/layouts/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44788819151a82cd32b8dd4-63341677%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98feff338a58908084eea26181d9dba4243d65fd' => 
    array (
      0 => '/home/lubo2/public_html/protected/templates/layouts/header.tpl',
      1 => 1370761957,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44788819151a82cd32b8dd4-63341677',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51a82cd32bee80_31847773',
  'variables' => 
  array (
    'login_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a82cd32bee80_31847773')) {function content_51a82cd32bee80_31847773($_smarty_tpl) {?><div id="header">

    <div id="header-top">
        <div class="w940 bc">
            <a href="" id="header-top-logo" class="fl"></a>
            <ul id="header-top-nav" class="fl">
                <li>
                    <div id="header-top-nav-hover" class="none"></div>
                    <a>课程分类<span class="arrow"></span></a>
                    <ul id="header-top-nav-subnav" class="none">
                        <li>数理科学
                            <ul class="none">
                                <li><a href="#">数据学</a></li>
                                <li><a href="#">编程语言</a></li>
                                <li><a href="#">网络</a></li>
                                <li><a href="#">软件工程</a></li>
                                <li><a href="#">Linux</a></li>
                                <li><a href="#">嵌入式</a></li>
                                <li><a href="#">web开发</a></li>
                                <li><a href="#">移动开发</a></li>
                                <li><a href="#">硬件</a></li>
                                <li><a href="#">你懂的</a></li>
                                <div class="header-top-nav-subsubnav-footer"></div>
                            </ul>
                        </li>
                        <li>生命、医学
                            <ul class="none">
                                <li><a href="#">数据学</a></li>
                                <li><a href="#">编程语言</a></li>
                                <li><a href="#">网络</a></li>
                                <li><a href="#">软件工程</a></li>
                                <li><a href="#">Linux</a></li>
                                <li><a href="#">嵌入式</a></li>
                                <li><a href="#">web开发</a></li>
                                <li><a href="#">移动开发</a></li>
                                <li><a href="#">硬件</a></li>
                                <li><a href="#">你懂的</a></li>
                                <div class="header-top-nav-subsubnav-footer"></div>
                            </ul>
                        </li>
                        <li>计算机
                            <ul class="none">
                                <li><a href="#">数据学</a></li>
                                <li><a href="#">编程语言</a></li>
                                <li><a href="#">网络</a></li>
                                <li><a href="#">软件工程</a></li>
                                <li><a href="#">Linux</a></li>
                                <li><a href="#">嵌入式</a></li>
                                <li><a href="#">web开发</a></li>
                                <li><a href="#">移动开发</a></li>
                                <li><a href="#">硬件</a></li>
                                <li><a href="#">你懂的</a></li>
                                <div class="header-top-nav-subsubnav-footer"></div>
                            </ul>
                        </li>
                        <li>经济、管理
                            <ul class="none">
                                <li><a href="#">数据学</a></li>
                                <li><a href="#">编程语言</a></li>
                                <li><a href="#">网络</a></li>
                                <li><a href="#">软件工程</a></li>
                                <li><a href="#">Linux</a></li>
                                <li><a href="#">嵌入式</a></li>
                                <li><a href="#">web开发</a></li>
                                <li><a href="#">移动开发</a></li>
                                <li><a href="#">硬件</a></li>
                                <li><a href="#">你懂的</a></li>
                                <div class="header-top-nav-subsubnav-footer"></div>
                            </ul>
                        </li>
                        <li>工程、材料
                            <ul class="none">
                                <li><a href="#">数据学</a></li>
                                <li><a href="#">编程语言</a></li>
                                <li><a href="#">网络</a></li>
                                <li><a href="#">软件工程</a></li>
                                <li><a href="#">Linux</a></li>
                                <li><a href="#">嵌入式</a></li>
                                <li><a href="#">web开发</a></li>
                                <li><a href="#">移动开发</a></li>
                                <li><a href="#">硬件</a></li>
                                <li><a href="#">你懂的</a></li>
                                <div class="header-top-nav-subsubnav-footer"></div>
                            </ul>
                        </li>
                        <li>文史哲学
                            <ul class="none">
                                <li><a href="#">数据学</a></li>
                                <li><a href="#">编程语言</a></li>
                                <li><a href="#">网络</a></li>
                                <li><a href="#">软件工程</a></li>
                                <li><a href="#">Linux</a></li>
                                <li><a href="#">嵌入式</a></li>
                                <li><a href="#">web开发</a></li>
                                <li><a href="#">移动开发</a></li>
                                <li><a href="#">硬件</a></li>
                                <li><a href="#">你懂的</a></li>
                                <div class="header-top-nav-subsubnav-footer"></div>
                            </ul>
                        </li>
                        <div id="header-top-nav-subnav-footer"></div>
                    </ul>
                </li>
                <li><a href="#">二手市场</a></li>
                <li><a href="#">捐赠我们</a></li>
            </ul>
            <div id="header-top-info" class="fr">
            <?php if ($_smarty_tpl->tpl_vars['login_user']->value){?>
                你好，<?php echo $_smarty_tpl->tpl_vars['login_user']->value->username;?>

                <?php }else{ ?>
                <ul>
                    <li><a href="/login">登录</a></li>
                    <li><a href="/signup">注册</a></li>
                </ul>
            <?php }?>
            </div>
        </div>
    </div>


    <div id="header-normal">
        <form id="header-normal-search" class="bc">
            <input type="input" placeholder="发现，探索，学习" id="header-normal-search-input"/>
            <input type="submit" value="" id="header-normal-search-button"/>
        </form>
    </div>


</div>
<?php }} ?>