<!DOCTYPE html>
<html>

<head>
    <title>{$page_title}</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>

    <link rel="stylesheet" href="/stylesheets/screen.css">
    {block name=css}{/block}
</head>

<body>

<div id="header">

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
                {if $login_user}
                    你好，{$login_user->username}
                {else}
                    <ul>
                        <li><a href="/login">登录</a></li>
                        <li><a href="/signup">注册</a></li>
                    </ul>
                {/if}
            </div>
        </div>
    </div>

    {block name=header_alter}
        <div id="header-normal">
            <form id="header-normal-search" class="bc" action="/course/search" method='POST'>
                <input type="input" placeholder="发现，探索，学习" name="keyword" id="header-normal-search-input"/>
                <input type="submit" value="" id="header-normal-search-button"/>
            </form>
        </div>
    {/block}

</div>

<div id="content" class="w940 bc clearfix">
    {block name=middle}{/block}
    <div id="content-left" class="fl">{block name=left}{/block}</div>
    <div id="content-right" class="fr">{block name=right}{/block}</div>
</div>

<div id="footer" class="w960 bc">
    <div class="w940 bc">

        <p id="footer-left" class="fl">版权信息</p>

        <ul id="footer-right" class="fr">
            <li><a href="#">FAQ</a></li>
            <li><a href="#">关于我们</a></li>
            <li><a href="#">捐赠ClassIC</a></li>
        </ul>

    </div>
</div>

<script type="text/javascript" src='/javascripts/require.2.1.5.js'></script>
<script type="text/javascript" src='/javascripts/main.js'></script>
<script type="text/javascript">
require(['jquery','components'], function ($){
    $('#header-top-nav li').eq(0).mouseover(function(){
        $(this).find('#header-top-nav-hover').removeClass('none');
        $(this).find('#header-top-nav-subnav').removeClass('none');
    }).mouseout(function(){
        $(this).find('#header-top-nav-hover').addClass('none');
        $(this).find('#header-top-nav-subnav').addClass('none');
    });

    $('#header-top-nav-subnav li').mouseover(function(){
        $(this).find('ul').removeClass('none');
    }).mouseout(function(){
        $(this).find('ul').addClass('none');
    });
});
</script>
{block name=js}{/block}

</body>
</html>
