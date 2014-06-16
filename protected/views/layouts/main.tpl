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

<header id="header">
    <div class="w940 bc">

        <a href="/" class="logo"></a>

        <nav class="main-nav">
            <div class="menu">
                <a href="/" class="menu-title">课程分类</a>
                <ul class="menu-content">
                    <li class="sub-menu">
                        <a class="sub-menu-title" href="#">文史哲</a>
                        <ul class="sub-menu-content">
                            <li>
                                <a href="#">文学系</a>
                            </li>
                            <li>
                                <a href="#">历史学系</a>
                            </li>
                            <li>
                                <a href="#">哲学系</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a class="sub-menu-title" href="#">法学、军事学</a>
                        <ul class="sub-menu-content">
                            <li>
                                <a href="#">文学系</a>
                            </li>
                            <li>
                                <a href="#">历史学系</a>
                            </li>
                            <li>
                                <a href="#">哲学系</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a class="sub-menu-title" href="#">理学、工学</a>
                        <ul class="sub-menu-content">
                            <li>
                                <a href="#">软件学院</a>
                            </li>
                            <li>
                                <a href="#">计算机科学与技术系</a>
                            </li>
                            <li>
                                <a href="#">数学系</a>
                            </li>
                            <li>
                                <a href="#">物理学系</a>
                            </li>
                            <li>
                                <a href="#">化学系</a>
                            </li>
                            <li>
                                <a href="#">生物科学</a>
                            </li>
                            <li>
                                <a href="#">我是名字超长的课课课课课课课课课课课课课课课</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <a target="_blank" href="http://wiki.lilystudio.org/pages/viewpage.action?pageId=6783179">我的意见</a>
        </nav>

        <div class="user-operation fr">
            {if $login_user}
            <div class="menu">
                <span class="menu-title">{$login_user->username}的账号</span>
                <ul class="menu-content">
                    <li>
                        <a href="/people/{$login_user->id}">我的ClassIC</a>
                    </li>
                    <li>
                        <a href="/">我的账号</a>
                    </li>
                    <li>
                        <a href="/logout">退出</a>
                    </li>
                </ul>
            </div>
            {else}
            <span class="notlogin">
                <a href="/login">登录</a>
                <a href="/signup">注册</a>
            </span>
            {/if}
        </div>
    </div>
</header>

{block header_search}
    <div id="search-wrapper">
        <form class="form-yosimite bc" action="" method="get">
            <input type="text" placeholder="发现你的课程" name="keyword" required>
            <button type="submit" class="submit"></button>
            <a href="" class="advanced-search">高级搜索</a>
        </form>
    </div>
{/block}


<div id="content" class="w940 bc clearfix">
    <div class="w600 bc">{block name=middle}{/block}</div>
    <div id="content-left" class="fl">{block name=left}{/block}</div>
    <div id="content-right" class="fr">{block name=right}{/block}</div>
</div>

<footer id="footer" class="w960 bc">
    <div class="w940 bc">

        <p id="footer-left" class="fl">© 2000-2013 &nbsp;&nbsp; LilyStudio.org &nbsp;&nbsp;&nbsp; all rights
            reserved </p>

        <ul id="footer-right" class="fr">
            <li><a target="_blank" href="http://micourse.net/">邻居&nbsp;Micourse</a></li>
            <li><a target="_blank" href="http://wiki.lilystudio.org/">关于我们</a></li>
        </ul>

    </div>
</footer>



<script type="text/javascript">
    require(['jquery', 'components', 'classic-ui'], function ($) {

    });
</script>
{block name=js}{/block}

</body>
</html>
