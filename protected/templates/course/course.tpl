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
    <div class="crumb-next">&gt;</div>
    <li>
        <a>微积分1</a>
    </li>
</ul>

<div id="course-intro">
    <h1 class="fl">微积分1（第一层次）</h1>
    <p class="fr" id="course-intro-edit">信息有误?<a>点此编辑</a></p>
    <img src="" id="course-intro-cover" class="fl cl"/>
    <div id="course-intro-detail" class="fl">
        <p><span class="course-intro-detail-left">开课院系:</span><span class="course-intro-detail-right">商学院</span></p>
        <p><span class="course-intro-detail-left">年级:</span><span class="course-intro-detail-right">大一</span></p>
        <p><span class="course-intro-detail-left">教师:</span><span class="course-intro-detail-right">李四</span></p>
        <p><span class="course-intro-detail-left">时间:</span><span class="course-intro-detail-right">周二 1-2节</span></p>
        <p><span class="course-intro-detail-left">地点:</span><span class="course-intro-detail-right">宿舍</span></p>
        <p><span class="course-intro-detail-left">课程类型:</span><span class="course-intro-detail-right">通修</span></p>
        <p><span class="course-intro-detail-left">学分:</span><span class="course-intro-detail-right">5</span></p>
        <p><span class="course-intro-detail-left">课程网站:</span><span class="course-intro-detail-right">暂无</span></p>
        <p><span class="course-intro-detail-left">教材:</span><span class="course-intro-detail-right"><a>微积分 - 南京大学出版社</a></span></p>
    </div>
    <a class="btn fr cr" id="course-intro-follow">关注此课程</a>
    <p class="fr cr" id="course-intro-rating">评分:
        <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
    </p>
    <a class="btn1 cl fl">给它换个封面</a>

</div>
{/block}

{block name=right}
<div id="course-class">
    <h2>本学期开课班级</h2>
    <ul>
        <li><a>微积分1</a>商学院 - 李一 - 图书馆222 - 周二1-2节</li>
        <li><a>微积分1</a>商学院 - 李二 - 图书馆222 - 周二3-4节</li>
        <li><a>微积分1</a>商学院 - 李三 - 图书馆222 - 周二5-6节</li>
        <li><a>微积分1</a>商学院 - 李四 - 图书馆222 - 周二7-8节</li>
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
            }

            $('.star').mouseover(function(){
                $(this).prevAll('.star').add($(this)).addClass('star-on');
                return true;
            }).mouseout(function(){
                $(this).prevAll('.star').add($(this)).removeClass('star-on');
                return true;
            });

            $('#course-intro-rating').mouseout(function(e){
                if(!$(e.target).hasClass('star')){
                    init_star();
                }
                return true;
            });

            $(document).ready(function(){
                init_star();
            });

        });
    </script>
{/block}


