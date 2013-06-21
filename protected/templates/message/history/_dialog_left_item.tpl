<div class="R_msg" node-type="msgDetail" is-send="0" create-at="{$message->create_time}">
    <div class="private_operate clearfix">
        <div class="close" style=""><a href="javascript:void(0);" title="删除" class="hover W_ico12 icon_close" action-type="delMessage" action-data="mid=3541341324080911&amp;is_send=0&amp;msgList=3541341324080911"></a></div>
        <div class="op_cbox" style="display: none; ">
            <input type="checkbox" class="W_checkbox">
        </div>
        <div class="txt" node-type="messageBox" id="msg_3541341324080911" action-data="mid=3541341324080911&amp;is_send=0">
            <span><a nick-name="{$with_user->username}" title="{$with_user->username}" usercard="id={$with_user->id}" href="{$with_user->getUrl()}">{$with_user->username}</a><a target="_blank" href="http://club.weibo.com/intro"><i title="微博达人" class="W_ico16 ico_club" node-type="daren"></i></a>：{$message->content}</span>
        </div>
        <div class="operation" style="">
            <div class="fl"><em class="S_txt2  date" href="">{$message->create_time|date_format:"%m月%d日 %H:%M"}</em>
                <em class="hover">
                    <i class="W_vline">|</i><a class="W_linka" href="javascript:void(0);" onclick="javascript:window.open('http://service.account.weibo.com/reportspam?rid=3541341324080911&amp;type=11&amp;from=10111','newwindow', 'height=700, width=650, toolbar =no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');">举报</a>
                </em>
            </div>
            <div class="fr"><a class="W_linka TODO" suda-data="key=message_all_forward_page&amp;value=message_all_forward_page" href="javascript:void(0);" action-type="forwardMessage" action-data="mid=3541341324080911&amp;touid=1787015991&amp;is_send=0">转发</a><i class="W_vline">|</i><a class="W_linka" action-type="replyMessage" href="javascript:void(0);">回复</a></div>
        </div>
    </div>
    <dl class="private clearfix">
        <dd class="piclist">
            <!-- forward -->
            <!-- /forward -->

        </dd>
    </dl>
</div>