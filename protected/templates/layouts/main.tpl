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
        <div class="w960 bc">
            <a href="" id="header-top-logo" class="fl"></a>
            <div id="header-top-nav" class="fl">
                <ul>
                    <li><a href="#">课程分类</a></li>
                    <li><a href="#">二手市场</a></li>
                    <li><a href="#">捐赠我们</a></li>
                </ul>
            </div>
            <div id="header-top-info" class="fr">
                你好，呵呵呵
            </div>
        </div>
    </div>

    {block name=header_alter}
        <div id="header-normal">
            <form id="header-normal-search" class="bc">
                <input type="input" placeholder="发现，探索，学习" id="header-normal-search-input"  />
                <input type="submit" value="" id="header-normal-search-button"/>
            </form>
        </div>
    {/block}

</div>

<div id="content" class="w960 bc clearfix">
    <div id="content-left" class="fl">{block name=left}{/block}</div>
    <div id="content-right" class="fr">{block name=right}{/block}</div>
</div>

<div id="footer">
    <div class="w960 bc">

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

});
</script>
{block name=js}{/block}

</body>
</html>
