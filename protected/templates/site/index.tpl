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


{block name=left}这儿放什么{/block}
{block name=right}
<form id="index-login" class="clearfix">
    <div class="form-item">
        <label for="index-login-username">用户名</label><input type="text" name="username" id="index-login-username" />
        <div class="form-item-clear none"></div>
    </div>
    <div class="form-item">
        <label for="index-login-password">密码</label><input type="password" name="password" id="index-login-password" />
        <div class="form-item-clear none"></div>
    </div>
    <input type="submit" value="登录" id="index-login-submit" class="btn fr" />
</form>
{/block}