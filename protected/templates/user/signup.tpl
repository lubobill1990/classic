{block name=css}
    <link rel="stylesheet" href="/stylesheets/special/user/user.css">
{/block}


{block name=middle}
    <div class="bc" id="user-main">
        <h2>欢迎加入Classic</h2>
        <div id="user-cloud"></div>
        <form class="user-form" action="" method="post" id='signup_form''>
            <div class="form-item">
                <label for="user_email">电子邮箱</label>
                <div class="input-wrapper">
                    <div class="input-decorator-user"></div>
                    <input type="text" name='User[email]' id='user_email' value="{$user->email}">
                </div>
                <span class="validate-error"  {if $error['email']|default:false}style="display: inline;"{/if}>该电子邮箱已被注册</span>
            </div>
            <div class="form-item">
                <label for="user_name">用户名</label>
                <div class="input-wrapper">
                    <div class="input-decorator-user"></div>
                    <input type="text" name="User[username]" id='user_name' value="{$user->username}">
                </div>
                <span class="validate-error"  {if $error['username']|default:false} style="display: inline;"{/if}>该用户名已被注册</span>
            </div>
            <div class="form-item">
                <label for="user_password">密码</label>
                <div class="input-wrapper">
                    <div class="input-decorator-lock"></div>
                    <input type="password" name='User[password]' id='user_password' value="{$user->password}">
                </div>
            </div>
            <div class="form-item">
                <div class="captcha">
                    <label for="captcha_text">输入上图单词</label>
                    <img class="captcha" src="/captcha" alt="">
                </div>
                <div class="input-wrapper">
                    <div class="input-decorator-lock"></div>
                    <input type="text" id="captcha_text" name='captcha'>
                </div>
                <span class="validate-error" id="frm_error" {if $error['captcha']|default:false}style="display: inline;"{/if}>请输入正确的验证码</span>
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