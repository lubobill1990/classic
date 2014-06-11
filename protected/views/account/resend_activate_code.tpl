{block name=left}
<form action="/account/resend_activate_code" method="POST">
    <div>
        <label for="resend_email">电子邮箱</label>
        <input type="text" name="email" id='resend_email' value="{$email|default:''}">
        <span class="validate-error" {if $error['user']|default:false}style="display: inline;"{/if}>请输入未激活账户的电子邮箱</span>
    </div>

    <div>
        <label>验证码</label>
        <img class="captcha captcha-img" src="/captcha" alt="" title="点击更换验证码">
    </div>
    <div>
        <label for="captcha_input">请输入上图单词</label>
        <input type="text" name="captcha" id="captcha_input">
        <span class="validate-error" id="frm_error" {if $error['captcha']|default:false}style="display: inline;"{/if}>请输入正确的验证码</span>
    </div>
    <input type="submit" value="确认" id='resend_submit'>
</form>
{/block}