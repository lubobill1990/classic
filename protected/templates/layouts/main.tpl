<!DOCTYPE html>
<html>

<head>
    <title>{$page_title}</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>

    <link rel="stylesheet" href="/stylesheets/screen.css">
    {block name=css}{/block}
</head>

<body>

{include file="file:[0]layouts/header.tpl"}

<div id="content" class="w940 bc clearfix">
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
