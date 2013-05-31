<form action="" method="post" id='signup_form'>
    <div>
        <label for="user_email">电子邮箱</label>
        <input type="text" name='User[email]' id='user_email' value="{$user->email}">
        <span class="validate-error"  {if $error['email']|default:false}style="display: inline;"{/if}>该电子邮箱已被注册</span>

    </div>
    <div>
        <label for="user_name">用户名</label>
        <input type="text" name="User[username]" id='user_name' value="{$user->username}">
        <span class="validate-error"  {if $error['username']|default:false} style="display: inline;"{/if}>该用户名已被注册</span>

    </div>

    <div>
        <label for="user_password">密码</label>
        <input type="password" name='User[password]' id='user_password' value="{$user->password}">
    </div>
    <div>
        <label>验证码</label>
        <img src="/captcha" alt="">
    </div>
    <div><label for="captcha_text">输入上图单词</label>
        <input type="text" name="captcha" id='captcha_text'>
        <span class="validate-error" id="frm_error" {if $error['captcha']|default:false}style="display: inline;"{/if}>请输入正确的验证码</span>
    </div>
    <div><input type="submit" value="注册"><a href="/login" class="link-login">已有账号?</a></div>
</form>