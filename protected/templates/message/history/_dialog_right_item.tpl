<div class="R_msg" node-type="msgDetail" is-send="1" create-at="{$message->create_time}">
    <div class="private_operate clearfix">
        <div class="close" style=""><a href="javascript:void(0);" title="删除" class="hover W_ico12 icon_close" action-type="delMessage" action-data="mid=3541341365638146&amp;is_send=1&amp;msgList=3541341365638146"></a></div>
        <div class="op_cbox" style="display: none; ">
            <input type="checkbox" class="W_checkbox">
        </div>
        <div class="txt" node-type="messageBox" id="msg_3541341365638146" action-data="mid=3541341365638146&amp;is_send=1">
            <span>我：{$message->content}</span>
        </div>
        <div class="operation" style="">
            <div class="fl"><em class="S_txt2  date" href="">{$message->create_time|date_format:"%m月%d日 %H:%M"}</em>
            </div>
            <div class="fr"><a class="W_linka" suda-data="key=message_all_forward_page&amp;value=message_all_forward_page" href="javascript:void(0);" action-type="forwardMessage" action-data="mid=3541341365638146&amp;touid=1787015991&amp;is_send=1">转发</a><i class="W_vline">|</i><a class="W_linka" action-type="replyMessage" href="javascript:void(0);">回复</a></div>
        </div>
    </div>
    <dl class="private clearfix">
        <dd class="piclist">
            <!-- forward -->
            <!-- /forward -->

        </dd>
    </dl>
</div>