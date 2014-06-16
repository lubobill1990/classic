<!DOCTYPE html>
<html>

<head>
    <title>{$page_title|default:Yii::app()->name}</title>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="/stylesheets/screen.css">
    {block name=css}{/block}
    <script type="text/javascript" src='/javascripts/require.2.1.5.js'></script>
    <script type="text/javascript" src='/javascripts/main.js'></script>
</head>

<body>

<div class="back-to-top">
    <a href="#">&#8593;回顶部</a>
</div>

<div id="header">

    <div id="header-top">
        <div class="w940 bc">
            <a href="/" id="header-top-logo" class="fl"></a>
            <ul id="header-top-nav" class="fl">
                <li>
                    <div id="header-top-nav-hover" class="none"></div>
                    <a>课程分类<span class="arrow"></span></a>
                    <ul id="header-top-nav-subnav" class="none">
                        {foreach $categories as $category}
                            <li>
                                {$category->name}
                                <ul class="none">
                                    {foreach $category->courses as $courseT}
                                        <li><a href="/course/{$courseT->id}/">{$courseT->name|truncate:16}</a></li>
                                    {/foreach}
                                    <div class="header-top-nav-subsubnav-footer"></div>
                                </ul>
                            </li>
                        {/foreach}
                        <div id="header-top-nav-subnav-footer"></div>
                    </ul>
                </li>
                <li><a target="_blank" href="http://wiki.lilystudio.org/pages/viewpage.action?pageId=6783179">我的意见</a>
                </li>
                {*<li><a href="#">二手市场</a></li>*}
                {*<li><a href="#">捐赠我们</a></li>*}
            </ul>
            <div id="header-top-info" class="fr">
                {if $login_user}
                    你好，{$login_user->username}
                    <a href="/logout">退出</a>
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
            <form id="header-normal-search" class="bc" action="/course/search" method='get'>
                <input type="text" placeholder="发现你的课程" name="keyword" id="header-normal-search-input"
                       {if $search_keyword|default:false}value="{$search_keyword}"{/if}/>
                <input type="submit" value="" id="header-normal-search-button"/>

                <div>
                    上课时间
                    <span>周一</span>
                    <span>周二</span>
                    <span>周三</span>
                    <span>周四</span>
                    <span>周五</span>
                    <span>周六</span>
                    <span>周日</span>
                    <input type="text" name="time"/>
                </div>
                <div>
                    上课地点
                    <div>仙林
                        <span>仙Ⅰ</span>
                        <span>仙Ⅱ</span>
                        <span>逸夫楼</span>
                        <span>基础实验楼</span>
                    </div>
                    <div>鼓楼
                        <span>教学楼</span>
                        <span>逸夫馆</span>
                    </div>
                    <input type="text" name="site"/>
                </div>
            </form>
        </div>
    {/block}

</div>

<div id="content" class="w940 bc clearfix">
    <div class="w600 bc">{block name=middle}{/block}</div>
    <div id="content-left" class="fl">{block name=left}{/block}</div>
    <div id="content-right" class="fr">{block name=right}{/block}</div>
</div>

<div id="footer" class="w960 bc">
    <div class="w940 bc">

        <p id="footer-left" class="fl">© 2000-2013 &nbsp;&nbsp; LilyStudio.org &nbsp;&nbsp;&nbsp; all rights
            reserved </p>

        <ul id="footer-right" class="fr">
            <li><a target="_blank" href="http://micourse.net/">邻居&nbsp;Micourse</a></li>
            <li><a target="_blank" href="http://wiki.lilystudio.org/">关于我们</a></li>
        </ul>

    </div>
</div>

<script type="text/javascript">
    require(['jquery', 'components', 'classic-ui'], function ($) {
        $('#header-normal-search').submit(function () {
            if($('#search-catalog')){
                $('#header-normal-search').append($('#search-catalog').clone().hide())
            }
        });

        $('#header-top-nav li').eq(0).mouseover(function () {
            $(this).find('#header-top-nav-hover').removeClass('none');
            $(this).find('#header-top-nav-subnav').removeClass('none');
        }).mouseout(function () {
                    $(this).find('#header-top-nav-hover').addClass('none');
                    $(this).find('#header-top-nav-subnav').addClass('none');
                });

        $('#header-top-nav-subnav li').mouseover(function () {
            $(this).find('ul').removeClass('none');
        }).mouseout(function () {
                    $(this).find('ul').addClass('none');
                });

        {literal}

        {/literal}
    });
</script>
{block name=js}{/block}

</body>
</html>
