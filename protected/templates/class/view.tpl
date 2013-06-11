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
    <div class="crumb-next">&gt;</div>
    <li>
        <a href="/course/{$class->course->id}">{$class->course->name}</a>
    </li>
    <div class="crumb-next">&gt;</div>
</ul>

<div id="course-intro" class="clearfix">
    <h1 class="fl">{$class->course->name}</h1>
    <p class="fr" id="course-intro-edit">信息有误?<a>点此编辑</a></p>
    <img src="" id="course-intro-cover" class="fl cl"/>
    <div id="course-intro-detail" class="fl">
        {include file="file:[0]class/_head_info.tpl"}
    </div>
    <a class="btn fr cr" id="course-intro-follow">关注此课程</a>
    <p title="评个分吧" class="fr cr" id="course-intro-rating">当前平均分:
        <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
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
                        <img src="" />
                        <div class="slide-popup none">
                            <div class="slide-popup-left"></div>
                            <h6>电动力学（第二版）</h6>
                            <p>推荐人：释小龙</p>
                            <p>推荐理由：This is f**king awesome</p>
                        </div>
                    </li>
                    <li>
                        <img src="" />
                        <div class="slide-popup none">
                            <div class="slide-popup-left"></div>
                            <h6>电动力学（第二版）</h6>
                            <p>推荐人：释小龙</p>
                            <p>推荐理由：This is f**king awesome</p>
                        </div>
                    </li>
                    <li>
                        <img src="" />
                        <div class="slide-popup slide-popup-toLeft none">
                            <div class="slide-popup-left"></div>
                            <h6>电动力学（第二版）</h6>
                            <p>推荐人：释小龙</p>
                            <p>推荐理由：This is f**king awesome</p>
                        </div>
                    </li>
                    <li>
                        <img src="" />
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
                        <img src="" />
                        <div class="slide-popup none">
                            <div class="slide-popup-left"></div>
                            <h6>电动力学（第二版）</h6>
                            <p>推荐人：释小龙</p>
                            <p>推荐理由：This is f**king awesome</p>
                        </div>
                    </li>
                    <li>
                        <img src="" />
                        <div class="slide-popup none">
                            <div class="slide-popup-left"></div>
                            <h6>电动力学（第二版）</h6>
                            <p>推荐人：释小龙</p>
                            <p>推荐理由：This is f**king awesome</p>
                        </div>
                    </li>
                    <li>
                        <img src="" />
                        <div class="slide-popup slide-popup-toLeft none">
                            <div class="slide-popup-left"></div>
                            <h6>电动力学（第二版）</h6>
                            <p>推荐人：释小龙</p>
                            <p>推荐理由：This is f**king awesome</p>
                        </div>
                    </li>
                    <li>
                        <img src="" />
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
                        <img src="" />
                        <div class="slide-popup none">
                            <div class="slide-popup-left"></div>
                            <h6>电动力学（第二版）</h6>
                            <p>推荐人：释小龙</p>
                            <p>推荐理由：This is f**king awesome</p>
                        </div>
                    </li>
                    <li>
                        <img src="" />
                        <div class="slide-popup none">
                            <div class="slide-popup-left"></div>
                            <h6>电动力学（第二版）</h6>
                            <p>推荐人：释小龙</p>
                            <p>推荐理由：This is f**king awesome</p>
                        </div>
                    </li>
                    <li>
                        <img src="" />
                        <div class="slide-popup slide-popup-toLeft none">
                            <div class="slide-popup-left"></div>
                            <h6>电动力学（第二版）</h6>
                            <p>推荐人：释小龙</p>
                            <p>推荐理由：This is f**king awesome</p>
                        </div>
                    </li>
                    <li>
                        <img src="" />
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
                        <img src="" />
                        <div class="slide-popup none">
                            <div class="slide-popup-left"></div>
                            <h6>电动力学（第二版）</h6>
                            <p>推荐人：释小龙</p>
                            <p>推荐理由：This is f**king awesome</p>
                        </div>
                    </li>
                    <li>
                        <img src="" />
                        <div class="slide-popup none">
                            <div class="slide-popup-left"></div>
                            <h6>电动力学（第二版）</h6>
                            <p>推荐人：释小龙</p>
                            <p>推荐理由：This is f**king awesome</p>
                        </div>
                    </li>
                    <li>
                        <img src="" />
                        <div class="slide-popup slide-popup-toLeft none">
                            <div class="slide-popup-left"></div>
                            <h6>电动力学（第二版）</h6>
                            <p>推荐人：释小龙</p>
                            <p>推荐理由：This is f**king awesome</p>
                        </div>
                    </li>
                    <li>
                        <img src="" />
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
    {include file='file:[0]courseDocument/_list.tpl' documents=$documents course_or_class='class' course_or_class_id=$class->id}
</div>

<div id="course-link">
    <div class="clearfix">
        <h2 class="fl">相关链接</h2>
        <a class="btn2 fl">我来推荐链接</a>
    </div>
    <div class="item">
        <p><span class="item-1">[ 视频 ]</span><a>微积分课件</a><span class="item-2">顶+10</span><span class="item-2">踩-3</span></p>
        <p>推荐人：<a>释小龙</a>推荐理由：无</p>
    </div>
    <div class="item">
        <p><span class="item-1">[ 视频 ]</span><a>Coursra微积分教程</a><span class="item-2">顶+10</span><span class="item-2">踩-3</span></p>
        <p>推荐人：<a>释小龙</a>推荐理由：呵呵，呵呵，和呵呵呵呵呵呵~</p>
    </div>
</div>
{/block}

{block name=right}
<div id="course-class">
    <h2>本专业其他班级</h2>
    <ul>
        {foreach $other_classes as $other_class}
        {if $other_class->id != $class->id}
        <li><a href="/class/{$other_class->id}">进入</a> {$other_class->course->name}</li>
            {foreach $other_class->timeSites as $time_site}
                <ul>
                    <li>{$time_site->getTimeString()} {$time_site->classroom}</li>
                </ul>
            {/foreach}
        {/if}
        {/foreach}
    </ul>
</div>
{/block}

{block name=js}
    <script type="text/javascript">
        require(['jquery'], function ($){
            var star_num = 3;

            function init_star(){
                for(var i=0;i<star_num;i++){
                    $('.star').eq(i).addClass('star-on');
                }
                for(var i=star_num;i<5;i++){
                    $('.star').eq(i).removeClass('star-on');
                }
            }

            $('.star').mouseover(function(){
                $(this).prevAll('.star').add($(this)).addClass('star-on');
                $(this).nextAll('.star').removeClass('star-on');
                return true;
            }).mouseout(function(){
                init_star();
                return true;
            });

            $(document).ready(function(){
                init_star();
            });

        });
    </script>
{/block}


