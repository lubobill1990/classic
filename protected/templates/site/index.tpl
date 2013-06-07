{extends file='layouts/main.tpl'}

{block name=css}
<link rel="stylesheet" href="/stylesheets/special/site/index.css">
{/block}

{block name=header_alter}
<div id="header-index">
    <div id="header-index-content" class="bc">
        <p id="header-index-content-slogan">ClassIC</p>
        <div id="header-index-content-search-wrapper">
            <form id="header-index-content-search">
                <input type="input" placeholder="发现，探索，学习" name="q" id="header-index-content-search-input"  />
                <input type="submit" value="" id="header-index-content-search-button"/>
            </form>
        </div>
        <p id="header-index-content-detail">正在建设中<a href="#">Register</a></p>
    </div>
</div>
{/block}


{block name=left}
<div id="index-popular">
    <h2>课程推荐</h2>
</div>

<div id="index-courses">
    <h2>发现你的课程</h2>
    <ul>
        <li class="index-courses-subject">
            <h3>数理科学</h3>
            <div class="index-courses-subject-decorator"></div>
            <div class="index-courses-subject-decorator"></div>
            <div class="index-courses-subject-decorator"></div>
            <table>
                <tr>
                    <td><a href="#">数据学</a></td>
                    <td><a href="#">网络</a></td>
                    <td><a href="#">软件工程</a></td>
                    <td><a href="#">硬件</a></td>
                    <td><a href="#">编程语言</a></td>
                </tr>
                <tr>
                    <td><a href="#">Linux</a></td>
                    <td><a href="#">嵌入式</a></td>
                    <td><a href="#">web开发</a></td>
                    <td><a href="#">移动开发</a></td>
                    <td><a href="#">你懂的</a></td>
                </tr>
                <tr>
                    <td><a href="#">Linux</a></td>
                    <td><a href="#">嵌入式</a></td>
                </tr>
            </table>
        </li>
        <li class="index-courses-subject">
            <h3>数理科学</h3>
            <div class="index-courses-subject-decorator"></div>
            <div class="index-courses-subject-decorator"></div>
            <div class="index-courses-subject-decorator"></div>
            <table>
                <tr>
                    <td><a href="#">数据学</a></td>
                    <td><a href="#">网络</a></td>
                    <td><a href="#">软件工程</a></td>
                    <td><a href="#">硬件</a></td>
                    <td><a href="#">编程语言</a></td>
                </tr>
                <tr>
                    <td><a href="#">Linux</a></td>
                    <td><a href="#">嵌入式</a></td>
                    <td><a href="#">web开发</a></td>
                    <td><a href="#">移动开发</a></td>
                    <td><a href="#">你懂的</a></td>
                </tr>
                <tr>
                    <td><a href="#">Linux</a></td>
                    <td><a href="#">嵌入式</a></td>
                </tr>
            </table>
        </li>
        <li class="index-courses-subject">
            <h3>数理科学</h3>
            <div class="index-courses-subject-decorator"></div>
            <div class="index-courses-subject-decorator"></div>
            <div class="index-courses-subject-decorator"></div>
            <table>
                <tr>
                    <td><a href="#">数据学</a></td>
                    <td><a href="#">网络</a></td>
                    <td><a href="#">软件工程</a></td>
                    <td><a href="#">硬件</a></td>
                    <td><a href="#">编程语言</a></td>
                </tr>
                <tr>
                    <td><a href="#">Linux</a></td>
                    <td><a href="#">嵌入式</a></td>
                    <td><a href="#">web开发</a></td>
                    <td><a href="#">移动开发</a></td>
                    <td><a href="#">你懂的</a></td>
                </tr>
                <tr>
                    <td><a href="#">Linux</a></td>
                    <td><a href="#">嵌入式</a></td>
                </tr>
            </table>
        </li>
        <li class="index-courses-subject">
            <h3>数理科学</h3>
            <div class="index-courses-subject-decorator"></div>
            <div class="index-courses-subject-decorator"></div>
            <div class="index-courses-subject-decorator"></div>
            <table>
                <tr>
                    <td><a href="#">数据学</a></td>
                    <td><a href="#">网络</a></td>
                    <td><a href="#">软件工程</a></td>
                    <td><a href="#">硬件</a></td>
                    <td><a href="#">编程语言</a></td>
                </tr>
                <tr>
                    <td><a href="#">Linux</a></td>
                    <td><a href="#">嵌入式</a></td>
                    <td><a href="#">web开发</a></td>
                    <td><a href="#">移动开发</a></td>
                    <td><a href="#">你懂的</a></td>
                </tr>
                <tr>
                    <td><a href="#">Linux</a></td>
                    <td><a href="#">嵌入式</a></td>
                </tr>
            </table>
        </li>
        <li class="index-courses-subject">
            <h3>数理科学</h3>
            <div class="index-courses-subject-decorator"></div>
            <div class="index-courses-subject-decorator"></div>
            <div class="index-courses-subject-decorator"></div>
            <table>
                <tr>
                    <td><a href="#">数据学</a></td>
                    <td><a href="#">网络</a></td>
                    <td><a href="#">软件工程</a></td>
                    <td><a href="#">硬件</a></td>
                    <td><a href="#">编程语言</a></td>
                </tr>
                <tr>
                    <td><a href="#">Linux</a></td>
                    <td><a href="#">嵌入式</a></td>
                    <td><a href="#">web开发</a></td>
                    <td><a href="#">移动开发</a></td>
                    <td><a href="#">你懂的</a></td>
                </tr>
                <tr>
                    <td><a href="#">Linux</a></td>
                    <td><a href="#">嵌入式</a></td>
                </tr>
            </table>
        </li>
    </ul>

</div>
{/block}

{block name=right}
<form id="index-login" class="clearfix">
    <div class="form-item">
        <label for="index-login-username">User</label><input type="text" name="username" id="index-login-username" />
        {*<div class="form-item-clear none"></div>*}
    </div>
    <div class="form-item">
        <label for="index-login-password">Pass</label><input type="password" name="password" id="index-login-password" />
        {*<div class="form-item-clear none"></div>*}
    </div>
    <input type="submit" value="登录" id="index-login-submit" class="btn fr" />
</form>
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
        });
    </script>
{/block}


