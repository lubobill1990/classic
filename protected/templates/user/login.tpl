<form action="" method="post" id='login_form'>
    <input type="hidden" name="return_url" value="{$return_url}">
    <div>
        <label for="login_username">邮箱/用户名</label>
        <input type="text" name="LoginForm[username]" id='login_username' value="{$model->username}">
        <span class="validate-error" {if $errors['username']|default:false}style="display: inline;"{/if}>邮箱/用户名或密码错误</span>
    </div>
    <div>
        <label for="login_password">密码</label>
        <input type="password" name="LoginForm[password]" id='login_password' value="{$model->password}">
    </div>
{if $show_captcha}
    <div>
        <label>验证码</label>
        <img src="/captcha" alt="">
    </div>
    <div>
        <label for="login_captcha_text">输入上图单词</label>
        <input type="text" id="login_captcha_text" name='captcha'>
        <span class="validate-error" id="frm_error" {if $errors['captcha']|default:false}style="display: inline;"{/if}>请输入正确的验证码</span>
    </div>
{/if}
    <div>
        <label for="remember_me">记住密码？</label>
        <input type="checkbox" name="LoginForm[rememberMe]" {if $model->rememberMe }checked {/if} id='remember_me'
               value="1">
        <a href="/signup" class="link-signup">注册账号</a>

        <a href="/account/retrieve_password" class="link-retrieve-password">找回密码</a>
    </div>
    <div>
        <input type="submit" value="登录">
    </div>
</form>