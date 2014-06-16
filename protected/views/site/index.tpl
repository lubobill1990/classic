{extends file='layouts/main.tpl'}

{block name=css}
<link rel="stylesheet" href="/stylesheets/special/site/index.css">
{/block}

{block name=header_search}
<div id="banner-wrapper">
    <div id="banner" class="bc">
        <div class="w500 bc pr">
            <p id="slogan">ClassIC</p>
            <form class="form-mavericks" action="" method="get">
                <div class="form-mavericks-wrapper">
                    <input type="text" placeholder="发现你的课程" name="keyword" required>
                    <button type="submit" class="submit"></button>
                    <a href="" class="advanced-search">高级搜索</a>
                </div>
            </form>
        </div>
    </div>
</div>
{/block}


{block name=middle}
{*<div id="index-popular">*}
    {*<ul class="fr slide-prompt">*}
        {*<li data-number="0" class="current"></li>*}
        {*<li data-number="1"></li>*}
        {*<li data-number="2"></li>*}
        {*<li data-number="3"></li>*}
    {*</ul>*}
    {*<h2>课程推荐</h2>*}
    {*<div class="slide clearfix">*}
        {*<div class="slide-prev off"></div>*}
        {*<div class="slide-next"></div>*}
        {*<div class="slide-main">*}
            {*<div class="slide-ul-wrapper">*}
                {*<ul>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup slide-popup-toLeft none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup slide-popup-toLeft none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                {*</ul>*}
                {*<ul>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup slide-popup-toLeft none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup slide-popup-toLeft none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                {*</ul>*}
                {*<ul>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup slide-popup-toLeft none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup slide-popup-toLeft none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                {*</ul>*}
                {*<ul>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup slide-popup-toLeft none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                    {*<li>*}
                        {*<img src="" />*}
                        {*<div class="slide-popup slide-popup-toLeft none">*}
                            {*<div class="slide-popup-left"></div>*}
                            {*<h6>微积分</h6>*}
                            {*<p>微积分是大家都要上的一门让学霸痴狂学*}
                                {*渣抓狂的公共课程，有好多老师，好多班*}
                                {*级，好多习题和好多红灯，你能像学霸一*}
                                {*样享受这门课。</p>*}
                        {*</div>*}
                    {*</li>*}
                {*</ul>*}
            {*</div>*}
        {*</div>*}
    {*</div>*}
{*</div>*}

<div id="index-courses">
    <h2>热门课程</h2>
    <ul>
        {foreach $categories as $category}
        <li class="index-courses-subject">
            <h3>{$category->name}</h3>
            <div class="index-courses-subject-decorator"></div>
            <div class="index-courses-subject-decorator"></div>
            <div class="index-courses-subject-decorator"></div>
            <table>
                {$i=0}
                <tr>
                    {foreach $category.courses as $course}
                    {if $i!=0&&$i%4==0}
                </tr>
                <tr>
                    {/if}
                    <td><a href="/course/{$course->id}/">{$course->name|truncate:11}</a></td>
                    {$i=$i+1}
                    {/foreach}
                </tr>
            </table>
        </li>
        {/foreach}
    </ul>
</div>
{/block}

{block name=js}
    <script type="text/javascript">
        require(['jquery'], function ($){
            $('.form-item').focusin(function(){
//                console.log("parent in");
//                $(this).find('.form-item-clear').removeClass('none');
                $(this).find('label').addClass('label-focus');
                return true;
            }).focusout(function(){
//                console.log("parent out");
//                $(this).find('.form-item-clear').addClass('none');
                $(this).find('label').removeClass('label-focus');
                return true;
            })/*on('click','.form-item-clear',function(){
                console.log("click");
                $(this).prev().val('');
                return true;
            })*/;

            $('#header-index-content-search').submit(function(){
                if($(this).find('input[type=text]').val().length==0){
                    return false;
                }
            });

        });
    </script>
{/block}


