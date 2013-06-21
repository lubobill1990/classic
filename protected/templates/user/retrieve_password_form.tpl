{block name=left}

<form action="" method="post">
    <div>
        <label for="retrieve_email">电子邮箱</label>
        <input type="text" name="email" id='retrieve_email' value="{$email}">
        <span class="validate-error" {if $error['user']|default:false}style="display: inline;"{/if}>请输入正确的电子邮箱</span>
    </div>

    <div>
        <label>验证码</label>
        <img src="/captcha" alt="">
    </div>
    <div>
        <label for="captcha_input">请输入上图单词</label>
        <input type="text" name="captcha" id="captcha_input">
        <span class="validate-error" id="frm_error" {if $error['captcha']|default:false}style="display: inline;"{/if}>请输入正确的验证码</span>
    </div>
    <input type="submit" value="确认" id='retrieve_submit'>

</form>
{/block}