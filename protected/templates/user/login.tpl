{block name=css}
    <link rel="stylesheet" href="/stylesheets/special/user/user.css">
{/block}

{block name=middle}
    <div class="bc" id="user-main">
        <h2>登陆Classic</h2>
        <div id="user-cloud"></div>
        <form class="user-form" action="" method="post" id='login_form'>
            <input type="hidden" name="return_url" value="{$return_url}">
            <div class="form-item">
                <label for="login_username">邮箱/用户名</label>
                <div class="input-wrapper">
                    <div class="input-decorator-user"></div>
                    <input type="text" name="LoginForm[username]" id='login_username' value="{$model->username}">
                </div>
                <span class="validate-error" {if $errors['username']|default:false}style="display: inline;"{/if}>邮箱/用户名或密码错误，或者用户未激活 <a
                        href="/account/resend_activate_code" title="发送新的激活码到您的邮箱">点击</a></span>
            </div>
            <div class="form-item">
                <label for="login_password">密码</label>
                <div class="input-wrapper">
                    <div class="input-decorator-lock"></div>
                    <input type="password" name="LoginForm[password]" id='login_password' value="{$model->password}">
                </div>
            </div>
            {if $show_captcha}
            <div class="form-item">
                <div class="captcha">
                    <label for="login_captcha_text">输入上图单词</label>
                    <img class="captcha captcha-img" src="/captcha" alt="">
                </div>
                <div>
                    <div class="input-wrapper">
                        <div class="input-decorator-lock"></div>
                        <input type="text" id="login_captcha_text" name='captcha'>
                    </div>
                    <span class="validate-error" id="frm_error" {if $errors['captcha']|default:false}style="display: inline;"{/if}>请输入正确的验证码</span>
                </div>
            </div>
            {/if}
            <div class="pwd-more">
                <input type="checkbox" name="LoginForm[rememberMe]" {if $model->rememberMe }checked {/if} id='remember_me'
                       value="1">
                <label for="remember_me">记住密码？</label>|
                <a href="/account/retrieve_password" class="link-retrieve-password">忘记密码了</a>
            </div>
            <input type="submit" value="登录" id="user-submit" class="btn" />
        </form>
    </div>
{/block}

{block name=js}
    <script type="text/javascript">
        require(['jquery'], function ($){
            $('.input-wrapper input').focusin(function(){
                $(this).parent().addClass('input-wrapper-hover');
            }).focusout(function(){
                $(this).parent().removeClass('input-wrapper-hover');
            })
        });
    </script>
{/block}