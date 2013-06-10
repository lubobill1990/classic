{extends file='layouts/main.tpl'}

{block name=css}
    <link rel="stylesheet" href="/stylesheets/special/user/activate.css">
{/block}

{block name=middle}
<div class="bc" id="activate-main">
    <h2>激活账号</h2>
    <div id="actiavte-cloud"></div>
    <form id="activate-form">
        <div class="form-item">
            <label for="activate-name">昵称</label>
            <div class="input-wrapper">
                <div class="input-decorator-user"></div>
                <input type="text" name="name" id="activate-name" />
            </div>
        </div>
        <div class="form-item">
            <label for="activate-pwd">密码</label>
            <div class="input-wrapper">
                <div class="input-decorator-lock"></div>
                <input type="password" name="pwd" id="activate-pwd" />
            </div>
        </div>
        <div class="form-item">
            <label for="activate-pwd2">确认密码</label>
            <div class="input-wrapper">
                <div class="input-decorator-lock"></div>
                <input type="password" name="pwd2" id="activate-pwd2" />
            </div>
        </div>
        <input type="submit" value="完成" id="activate-submit" class="btn" />
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