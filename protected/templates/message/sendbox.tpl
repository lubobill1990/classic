<div class="row">
    <article>
        <form action="/message/send" method="POST" id='chat_form'>
            <input type="hidden" name="to_user_id" value="3">
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
            <input type="submit" value="提交" id='submit'>
        </form>
    </article>
</div>
{literal}
<script type="text/javascript">
    require(['jquery.form'],function(){
        $(function(){
            $("#chat_form").ajaxForm();
            var json='[{"id":"71","from_user_id":"3","user_id":"10","create_time":"2013-01-19 15:10:45","has_read":"no","content":"sdds"},{"id":"68","from_user_id":"3","user_id":"10","create_time":"2013-01-19 15:10:41","has_read":"no","content":"sdds"},{"id":"67","from_user_id":"3","user_id":"10","create_time":"2013-01-19 15:10:07","has_read":"no","content":"sdds"},{"id":"66","from_user_id":"3","user_id":"10","create_time":"2013-01-19 15:10:03","has_read":"no","content":"sdds"},{"id":"26","from_user_id":"10","user_id":"3","create_time":"2013-01-19 14:56:28","has_read":"no","content":"sadfdsafdsafsadsaas"},{"id":"25","from_user_id":"10","user_id":"3","create_time":"2013-01-19 14:55:15","has_read":"no","content":"sadfdsafdsafsadsaas"},{"id":"24","from_user_id":"10","user_id":"3","create_time":"2013-01-19 14:55:11","has_read":"no","content":"sadfdsafdsafsad"},{"id":"23","from_user_id":"10","user_id":"3","create_time":"2013-01-19 14:55:04","has_read":"no","content":"sadfdsafdsafsad"},{"id":"22","from_user_id":"10","user_id":"3","create_time":"2013-01-19 14:53:31","has_read":"no","content":"sadfdsafdsafsad"}]';
            console.dir(json);
        })
    })
</script>
{/literal}
