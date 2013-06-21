<div class="W_main_c" id="Box_center" ucardconf="type=1">
    <!--Mfeedlist pl-->
    <div id="pl_content_messageDetail">

        <!--我的私信标题-->
        <div class="group_read">
            <div class="title">我和 {$with_user->username} 的对话</div>
        </div>
        <!--/我的私信标题-->
        <div class="message_wrap">
            <div class="search_title clearfix" node-type="msg_operation">
                <div class="bread_crumbs"><i><a href="/message">返回所有私信</a></i><span class="CH">&gt;</span><em
                        node-type="msg_num">共 <span class="message-count">{$count}</span> 条私信</em></div>
            </div>
        {include file="file:[0]message/history/_send_box.tpl"}
            <div id="message-list-content" data-with-user-id="{$with_user->id}" class="private_dialogue"
                 node-type="messageList" pagenumber="1" name='message-content'>
            {include file="file:[0]message/history/dialog_list.tpl"}
            </div>
            <div id="message-list-pagination" action-type="">

            </div>

        </div>
    </div>
    <!--Mfeedlist pl-->
    <form id="this-user-info" style="display: none;">
        <input type="hidden" name='id' value="{$this_user->id}">
        <input type="hidden" name='username' value="{$this_user->username}">
        <input type="hidden" name="avatar_url" value="{$this_user->getAvatarUrl(50)}">
    </form>
    <form id="with-user-info" style="display: none;">
        <input type="hidden" name='id' value="{$with_user->id}">
        <input type="hidden" name='username' value="{$with_user->username}">
        <input type="hidden" name="avatar_url" value="{$with_user->getAvatarUrl(50)}">
    </form>
</div>
{include file="file:[0]message/history/jsmart_templates.tpl"}
<script type="text/javascript">
    require(['wenji'], function () {
        $this_user = {
            id:{$this_user->id},
            username:"{$this_user->username}",
            avatar_url:"{$this_user->getAvatarUrl(50)}"
        }
        $with_user = {
            id:{$with_user->id},
            username:"{$with_user->username}",
            avatar_url:"{$with_user->getAvatarUrl(50)}"
        }
        $('#message-list-pagination').WJ('pagination',{$count},{$items_per_page}, function (index, jq) {
            $.post('/message/history/' + $('#message-list-content').attr('data-with-user-id'), {
                page_no:index
            }, function (data) {
                $('#message-list-content').html(data)
                $.WJ('jumpToAnchor', '#');
            })
        })
        $('#send-message-button').click(function () {
            var content = $('#send-message-content').val();
            if (content.length == 0) {
                $.WJ('notty', {
                    title:'发送失败',
                    content:'消息不能为空',
                    timeout:3000
                })
                return;
            }
            $.post('/message/send', {
                to_user_id:$('#message-list-content').attr('data-with-user-id'),
                content:$('#send-message-content').val()
            }, function (data) {
                if (data.success) {
                    var message = {
                        content:$('#send-message-content').val(),
                        create_time:new Date((new Date).valueOf(data.data)).format("mm月dd日 HH:MM")
                    }
                    if ($('#message-list-content dl:first-child').hasClass('private_SRLr')) {
                        $('#dialog_right_item_tmpl').WJ('jSmartFetchAsync', {
                            message:message,
                            with_bottom_line:true
                        }, function (data) {
                            $('#message-list-content dl:first-child .W_border').prepend(data)
                        })
                    } else {
                        $('#message_dialog_right_tmpl').WJ('jSmartFetchAsync', {
                            message:message,
                            this_user:$this_user
                        }, function (data) {
                            $('#message-list-content').prepend(data)
                        })
                    }
                } else {

                }
                $('#send-message-content').val('')

            }, 'json')
        })
    })
</script>
