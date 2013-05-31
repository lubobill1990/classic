{literal}
<script id="dialog_right_item_tmpl" type="text/x-jsmart-tmpl">
    <div class="R_msg" node-type="msgDetail" is-send="1" create-at="{$message.create_time}">
        <div class="private_operate clearfix">
            <div class="close" style=""><a href="javascript:void(0);" title="删除" class="hover W_ico12 icon_close"
                                           action-type="delMessage"
                                           action-data="mid=3541341365638146&amp;is_send=1&amp;msgList=3541341365638146"></a>
            </div>
            <div class="op_cbox" style="display: none; ">
                <input type="checkbox" class="W_checkbox">
            </div>
            <div class="txt" node-type="messageBox" id="msg_3541341365638146"
                 action-data="mid=3541341365638146&amp;is_send=1">
                <span>我：{$message.content}</span>
            </div>
            <div class="operation" style="">
                <div class="fl"><em class="S_txt2  date" href="">{$message.create_time}</em>
                </div>
                <div class="fr"><a class="W_linka"
                                   suda-data="key=message_all_forward_page&amp;value=message_all_forward_page"
                                   href="javascript:void(0);" action-type="forwardMessage"
                                   action-data="mid=3541341365638146&amp;touid=1787015991&amp;is_send=1">转发</a><i
                        class="W_vline">|</i><a class="W_linka" action-type="replyMessage"
                                                href="javascript:void(0);">回复</a></div>
            </div>
        </div>
        <dl class="private clearfix">
            <dd class="piclist">
                <!-- forward -->
                <!-- /forward -->

            </dd>
        </dl>
    </div>
    {if $with_bottom_line|default:false}
    <div class="W_linedot"></div>
    {/if}
</script>
<script id="message_dialog_right_tmpl" type="text/x-jsmart-tmpl">
    <dl node-type="msgList" class="private_SRLr clearfix">
        <dt class="face"><a href="{$this_user.url}" title="">
            <img width="50" height="50" usercard="id={$this_user.id}"
                 src="{$this_user.avatar_url}"></a></dt>
        <dd class="W_border content">
            {include file="dialog_right_item_tmpl"}
            <div class="arrow"></div>
        </dd>
    </dl>
</script>
{/literal}
