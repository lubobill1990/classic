<div id="WJ_webim" class="WJ_webim" style="position: fixed; bottom: 0px; right: 0px;">
    <div node-type="onlineBarFriend" action-type="onlineBar"
         class="webim_win_minD wbim_min_friend"
         style="cursor: pointer; position: absolute; right: 0px; bottom: 0px; visibility: visible;"><p
            class="statusbox"><i class="WBIM_icon_stat WBIM_icon_online" node-type="onlineStatus"></i></p>私信聊天[<span
            class="online_num">8</span>]</div>


{include file="file:[0]message/webim/_chat_box.tpl"}

{*{include file="file:[0]message/webim/_friend_list_fold.tpl"}*}
{include file="file:[0]message/webim/_friend_list_unfold.tpl"}
    <div id="webim-chatbox-mini-bar" node-type="chatMiniRoot" action-type="chatmini" action-data="from=chatmini"
         class="webim_win_minD webim_min_chat"
         style="cursor: pointer; position: absolute; bottom: 0px; right: 200px; display: none;">
        lightory
    </div>
</div>
<script type="text/javascript">
    require(['tinyscrollbar','smart','webim'],function(){
        $(function () {
            $('#friend-list-scroll-container').tinyscrollbar();
        })
    })
</script>