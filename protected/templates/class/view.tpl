{block name=css}
    <link rel="stylesheet" href="/stylesheets/special/course/course.css">
{/block}

{block name=left}
<ul class="crumb">
    <li>
        <div class="crumb-li-hover none"></div>
        <a>{$categoryT->name}
            <span class="arrow"></span>
        </a>
        <ul class="crumb-li-subnav none">
            {foreach $categoryT->courses as $courseT}
                <li><a href="/course/{$courseT->id}">{$courseT->name|truncate:12}<a/></li>
            {/foreach}
            <div class="crumb-li-subnav-footer"></div>
        </ul>
    </li>
    <div class="crumb-next">&gt;</div>
    <li>
        <a href="/course/{$class->course->id}">{$class->course->name}</a>
    </li>
</ul>

<div id="course-intro" class="clearfix"  course_id="{$class->course->id}" user_id="{$login_user->id|default:0}">
    <h1 class="fl">{$class->course->name}</h1>
    {*<p class="fr" id="course-intro-edit">信息有误?<a>点此编辑</a></p>*}
    <img src="{$textbooks[0]->thumbnail_url|default:'/images/common/default.png'}" id="course-intro-cover" class="fl cl"/>
    <div id="course-intro-detail" class="fl">
        {include file="file:[0]class/_head_info.tpl"}
    </div>

    {if $login_user and $login_user->hasFollowCourse($class->course->id)}
        <a class="btn fr cr" id="course-intro-unfollow" course_id="{$class->course->id}" >取消关注</a>
        <a class="btn fr cr" id="course-intro-follow" course_id="{$class->course->id}" style="display: none">关注此课程</a>
        {else}
        <a class="btn fr cr" id="course-intro-unfollow" course_id="{$class->course->id}" style="display: none">取消关注</a>
        <a class="btn fr cr" id="course-intro-follow" course_id="{$class->course->id}">关注此课程</a>
    {/if}

    <p title="评个分吧" class="fr cr" id="course-intro-rating" data-rating="{$class->course->score}">评分:
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
    {*<a class="btn1 cl fl">给它换个封面</a>*}
</div>

    <div id="course-book">
        <div class="clearfix">
            {if $books|count}
            <ul class="fr slide-prompt">
                {$book_pages=$books|count}
                <li data-number="0" class="current"></li>
                {section name=foo start=1 loop=$book_pages/4+1}
                    <li data-number="{$smarty.section.foo.index}"></li>
                {/section}
            </ul>
            {/if}
            <h2 class="fl">相关书籍</h2>
            <a class="btn2 fl" id="recommend-book">我来推荐书籍</a>
        </div>

        {if $books|count}
            {include file="file:[0]courseBook/list.tpl" books=$books}
        {else}
            还没有推荐的书籍，来推荐第一本书吧~
        {/if}
    </div>

<div id="course-resource">
    <div class="clearfix">
        <h2 class="fl">相关资源</h2>
        <a class="btn2 fl" id="course_document_upload">我来推荐资源</a>
    </div>
    {include file='file:[0]courseDocument/_list.tpl' documents=$documents course_or_class='class' course_or_class_id=$class->id}
</div>

<div id="course-link">
{include file="file:[0]courseResource/container.tpl" resources=$class->courseResources id=$class->id type="class" count=$class->courseResourceCount items_per_page=$resource_items_per_page}
</div>
    <div class="modal-container">
        <div id="recommend-link-form" class="modal hide fade">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>推荐链接</h3>
            </div>
            <div class="modal-body">
                <form action="/courseResource/recommend" method="post">
                    <label for="recommend-link-name">链接名称</label>
                    <input type="text" id="recommend-link-name" name="title"/>
                    <label for="recommend-link-url">链接地址</label>
                    <input type="text" id="recommend-link-url" name="url"/>
                    <label for="recommend-link-reason">推荐理由</label>
                    <textarea id="recommend-link-reason" name="description"></textarea>
                    <br/><br/>
                    这是一个？<input type="radio" checked="checked" name="category" value="video"/>视频
                    <input type="radio" name="category" value="link"/>其他
                    <input type="hidden" name="class_id" value="{$class->id}"/>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary save">保存</a>
            </div>
        </div>
    </div>
    <div class="modal-container">
        <div id="recommend-book-form" class="modal hide fade">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>推荐书籍</h3>
            </div>
            <div class="modal-body">
                <form action="/courseBook/recommend"  method="post" class="fl">
                    <label for="recommend-book-name">书名</label>
                    <input type="text" id="recommend-book-name" name="name"/>
                    <label for="recommend-book-author">作者</label>

                    <input type="text" id="recommend-book-author" name="author" />
                    {*<label for="recommend-book-isbn">isbn</label>*}
                    {*<input type="text" id="recommend-book-isbn" name="isbn" />*}
                    <label for="recommend-book-url">豆瓣链接</label>
                    <input type="text" id="recommend-book-url" name="url"/>
                    <label for="recommend-book-reason">推荐理由</label>

                    <textarea id="recommend-book-reason" name="comment"></textarea><br/>
                    这是一本？<input type="radio" checked="checked" name="type" value="textbook" />教材
                    <input type="radio" name="type" value="reference" />参考书
                    <input type="radio" name="type" value="expand" />拓展阅读
                    <input type="hidden" name="thumbnail_url" />
                    <input type="hidden" name="class_id" value="{$class->id}" />
                </form>
                <div id="book-recommend-douban" class="fl">
                    <img src="" class="fl none" />
                </div>

            </div>
            <div class="modal-footer">
                <a class="btn btn-primary save">保存</a>
            </div>
        </div>
    </div>
{/block}

{block name=right}
<div id="course-class">
    <h2>{$class->major->dep->name}-{$class->major->name}-{$class->grade}其他班级</h2>
    <ul>
        {foreach $other_classes as $other_class}
        <li class="course-class-item"><a href="/class/{$other_class->id}">{$other_class->course->name}</a> ({$other_class->campus})
            {foreach $other_class->timeSites as $time_site}
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
        require(['jquery'], function ($){
            function init_star() {
                $('.star-on').css('width',$('#course-intro-rating').data('rating')*20+"%");
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
                                $('#course-intro-rating').data('rating',parseInt(data.data)) ;
                            } else {
                                alert(data);
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
            })
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
            })
        });

        require(['jquery','bootstrap/modal'], function () {
            $('#recommend-link').click(function () {
                if ($("#course-intro").attr('user_id') == 0) {
                    $.WJ('notify', {
                        title:"请先登录",
                        content:"此操作需要登录，是不是还没有<a href='/login'>登录</a>？"
                    })
                    return false;
                }
                $('#recommend-link-form').modal();
            });
            $('#recommend-book').click(function () {
                if ($("#course-intro").attr('user_id') == 0) {
                    $.WJ('notify', {
                        title:"请先登录",
                        content:"此操作需要登录，是不是还没有<a href='/login'>登录</a>？"
                    })
                    return false;
                }
                $('#recommend-book-form').modal();
            });
            require(['form'], function () {
                $('#recommend-link-form form').ajaxForm({
                    dataType:'json',
                    success:function (data) {
                        if (data['code'] == 200) {
                            $('#course_resource_list').append($(data['data']));
                        } else {
                            alert('推荐失败');
                            $.WJ('notty', {
                                content:data['data'],
                                title:'推荐失败'
                            })
                        }
                    },
                    beforeSubmit:function () {
                        $('#recommend-link-form').modal('hide')
                    }
                });

                $('#recommend-link-form .save').click(function(){
                    url = $('#recommend-link-form input[name="url"]').val();
                    {literal}
                    var strRegex = "^((https|http|ftp|rtsp|mms)://)[a-z0-9A-Z]{3}\.[a-z0-9A-Z][a-z0-9A-Z]{0,61}?[a-z0-9A-Z]\.com|net|cn|cc (:s[0-9]{1-4})?/$";
                    {/literal}
                    var re = new RegExp(strRegex);
                    if(!re.test(url)){
                        $.WJ('notify', {
                            title:"链接弄错了？",
                            content:"链接要求填写完整的有效路径"
                        })
                        return false;
                    }
                    $('#recommend-link-form form').submit();
                });

                $('#recommend-book-form form').ajaxForm({
                    dataType:'json',
                    success:function (data) {
                        if (data['code'] == 200) {
                            parent.location.reload();
                        } else {
                            $.WJ('notty', {
                                content:data['data'],
                                title:'推荐失败'
                            })
                        }
                    },
                    beforeSubmit:function () {
                        $('#recommend-book-form').modal('hide')
                    }
                });

                $('#recommend-book-form .save').click(function(){
                    $('#recommend-book-form form').submit();
                });

                $('#recommend-book-form input[name="name"]').focusout(function(){
                    var val = $(this).val();
                    if(val.length!=0){
                        $.post('/courseBook/getBookInfo?name=' + val, function (data) {
                            $('#book-recommend-douban').children().not('.none').remove();
                            for (var i in data){
                                if(i==0){
                                    $('#recommend-book-form input[name="url"]').val(data[i].url);
                                    $('#recommend-book-form input[name="author"]').val(data[i].author);
                                    $('#recommend-book-form input[name="thumbnail_url"]').val(data[i].thumbnail_url);
                                }
                                var newNode = $('#book-recommend-douban').find('.none').clone().removeClass('none')
                                newNode.attr('src',data[i].thumbnail_url).data('name',data[i].name).data('url',data[i].url).data('thumbnail_url',data[i].thumbnail_url).data('author',data[i].author);
                                $('#book-recommend-douban').append(newNode);
                            }
                        }, 'json')
                    }
                });

                $('#book-recommend-douban').on('click','img',function(){
                    $('#recommend-book-form input[name="url"]').val($(this).data('url'));
                    $('#recommend-book-form input[name="author"]').val($(this).data('author'));
                    $('#recommend-book-form input[name="thumbnail_url"]').val($(this).data('thumbnail_url'));
                });
            });
        });
    </script>
{/block}


