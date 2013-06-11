{extends file='layouts/main.tpl'}

{block name=css}
<link rel="stylesheet" href="/stylesheets/special/course/course.css">
{/block}

{block name=left}
<ul class="crumb">
    <li>
        <div class="crumb-li-hover none"></div>
        <a>数理科学<span class="arrow"></span></a>
        <ul class="crumb-li-subnav none">
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
            <div class="crumb-li-subnav-footer"></div>
        </ul>
    </li>
</ul>

<div id="course-intro" class="clearfix" course_id="{$course->id}" user_id="{$login_user->id|default:0}">
    <h1 class="fl">{$course->name}</h1>

    <p class="fr" id="course-intro-edit">信息有误?<a>点此编辑</a></p>
    <img src="" id="course-intro-cover" class="fl cl"/>

    <div id="course-intro-detail" class="fl">
        {if $course->classes|count==1}
        {include file="file:[0]class/_head_info.tpl" class=$course->classes[0]}
            {else}
            <p><span class="course-intro-detail-left">开课院系:</span><span class="course-intro-detail-right">详情请查看班级</span>
            </p>

            <p><span class="course-intro-detail-left">年级:</span><span class="course-intro-detail-right">详情请查看班级</span>
            </p>

            <p><span class="course-intro-detail-left">教师:</span><span class="course-intro-detail-right">详情请查看班级</span>
            </p>

            <p><span class="course-intro-detail-left">时间:</span><span class="course-intro-detail-right">详情请查看班级</span>
            </p>

            <p><span class="course-intro-detail-left">地点:</span><span class="course-intro-detail-right">详情请查看班级</span>
            </p>

            <p><span class="course-intro-detail-left">课程类型:</span><span class="course-intro-detail-right">详情请查看班级</span>
            </p>

            <p><span class="course-intro-detail-left">学分:</span><span class="course-intro-detail-right">详情请查看班级</span>
            </p>

            <p><span class="course-intro-detail-left">课程网站:</span><span class="course-intro-detail-right">详情请查看班级</span>
            </p>

            <p><span class="course-intro-detail-left">教材:</span><span
                    class="course-intro-detail-right"><a>详情请查看班级</a></span></p>
        {/if}
    </div>
    {if $login_user and $login_user->hasFollowCourse($course->id)}
        <a class="btn fr cr" id="course-intro-unfollow" course_id="{$course->id}">取消关注</a>
        <a class="btn fr cr" id="course-intro-follow" course_id="{$course->id}" style="display: none">关注此课程</a>
        {else}
        <a class="btn fr cr" id="course-intro-unfollow" course_id="{$course->id}" style="display: none">取消关注</a>
        <a class="btn fr cr" id="course-intro-follow" course_id="{$course->id}">关注此课程</a>
    {/if}
    <p title="评个分吧" class="fr cr" id="course-intro-rating">评分:
        <span class="star">
            <span class="star-off"><span class="star-on"></span></span>
            <span class="star-select">
                <span data-num="1"></span>
                <span data-num="2"></span>
                <span data-num="3"></span>
                <span data-num="4"></span>
                <span data-num="5"></span>
            </span>

        </span>
    </p>
    <a class="btn1 cl fl">给它换个封面</a>
</div>

<div id="course-book">
<div class="clearfix">
    <ul class="fr slide-prompt">
        <li data-number="0" class="current"></li>
        <li data-number="1"></li>
        <li data-number="2"></li>
        <li data-number="3"></li>
    </ul>
    <h2 class="fl">相关书籍</h2>
    <a class="btn2 fl">我来推荐书籍</a>
</div>

<div class="slide clearfix">
<div class="slide-prev off"></div>
<div class="slide-next"></div>
<div class="slide-main">
<div class="slide-ul-wrapper">
<ul>
    <li>
        <img src=""/>

        <div class="slide-popup none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
    <li>
        <img src=""/>

        <div class="slide-popup none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
    <li>
        <img src=""/>

        <div class="slide-popup slide-popup-toLeft none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
    <li>
        <img src=""/>

        <div class="slide-popup slide-popup-toLeft none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
</ul>
<ul>
    <li>
        <img src=""/>

        <div class="slide-popup none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
    <li>
        <img src=""/>

        <div class="slide-popup none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
    <li>
        <img src=""/>

        <div class="slide-popup slide-popup-toLeft none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
    <li>
        <img src=""/>

        <div class="slide-popup slide-popup-toLeft none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
</ul>
<ul>
    <li>
        <img src=""/>

        <div class="slide-popup none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
    <li>
        <img src=""/>

        <div class="slide-popup none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
    <li>
        <img src=""/>

        <div class="slide-popup slide-popup-toLeft none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
    <li>
        <img src=""/>

        <div class="slide-popup slide-popup-toLeft none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
</ul>
<ul>
    <li>
        <img src=""/>

        <div class="slide-popup none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
    <li>
        <img src=""/>

        <div class="slide-popup none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
    <li>
        <img src=""/>

        <div class="slide-popup slide-popup-toLeft none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
    <li>
        <img src=""/>

        <div class="slide-popup slide-popup-toLeft none">
            <div class="slide-popup-left"></div>
            <h6>电动力学（第二版）</h6>

            <p>推荐人：释小龙</p>

            <p>推荐理由：This is f**king awesome</p>
        </div>
    </li>
</ul>
</div>
</div>
</div>
</div>
<div id="course-resource">
    <div class="clearfix">
        <h2 class="fl">相关资源</h2>
        <a class="btn2 fl" id="course_document_upload">我来推荐资源</a>
    </div>
{include file='file:[0]courseDocument/_list.tpl' documents=$documents course_or_class='course' course_or_class_id=$course->id}
</div>
<div id="course-link">
    <div class="clearfix">
        <h2 class="fl">相关链接</h2>
        <a class="btn2 fl">我来推荐链接</a>
    </div>
    <div class="item">
        <p><span class="item-1">[ 视频 ]</span><a>微积分课件</a><span class="item-2">顶+10</span><span class="item-2">踩-3</span>
        </p>

        <p>推荐人：<a>释小龙</a>推荐理由：无</p>
    </div>
    <div class="item">
        <p><span class="item-1">[ 视频 ]</span><a>Coursra微积分教程</a><span class="item-2">顶+10</span><span
                class="item-2">踩-3</span></p>

        <p>推荐人：<a>释小龙</a>推荐理由：呵呵，呵呵，和呵呵呵呵呵呵~</p>
    </div>
</div>
{/block}

{block name=right}
<div id="course-class">
    <h2>本学期开课班级</h2>
    <ul>
        {foreach $course->classes as $class}
            <li class="course-class-item"><a href="/class/{$class->id}">{$class->major->dep->name} - {$class->major->name} </a>
                {foreach $class->timeSites as $time_site}
                    <ul>
                        <li>{$time_site->getTimeString()} {$time_site->classroom}</li>
                    </ul>
                {/foreach}
            </li>
        {/foreach}
    </ul>
</div>
{/block}

{block name=js}
<script type="text/javascript">
    require(['jquery'], function ($) {
        var star_num = 3.5;

        function init_star() {
            $('.star-on').css('width',star_num*20+"%");
        }

        $('.star-select span').mouseover(function () {
            $('.star-on').css('width',$(this).data('num')*20+"%");
            return true;
        }).mouseout(function () {
            init_star();
            return true;
        }).click(function(){
            $.post('/course/setScore?course_id='+$('#course-intro').attr('course_id')+'&score='+$(this).data('num'), function (data) {
                if (data.code == 200) {

                } else {

                }
            }, 'json');
        });

        $(document).ready(function () {
            init_star();
        });

        $('#course-intro-follow').click(function () {
            if ($("#course-intro").attr('user_id') == 0) {
                $.WJ('notify', {
                    title:"请先登录",
                    content:"要关注该课程，您需要先点此<a href='/login'>登录</a>"
                })
                return false;
            }
            $.post('/course/follow?id=' + $('#course-intro').attr('course_id'), function (data) {
                if (data.code == 200) {
                    $('#course-intro-follow').hide();
                    $('#course-intro-unfollow').show();
                } else {
                    $.WJ('notify', {
                        content:data.data
                    })
                }
            }, 'json')
        });
        $('#course-intro-unfollow').click(function () {
            $.post('/course/unfollow?id=' + $('#course-intro').attr('course_id'), function (data) {
                if (data.code == 200) {
                    $('#course-intro-unfollow').hide();
                    $('#course-intro-follow').show();
                } else {
                    $.WJ('notify', {
                        content:data.data
                    })
                }
            }, 'json')

        });
        $('#recommend-resource').click(function () {

        });
    });
</script>
{/block}


