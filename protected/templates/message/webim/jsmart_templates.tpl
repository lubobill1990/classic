{literal}
<script id="webim_dialog_box_right" type="text/x-jsmart-tmpl">
    <div class="webim_dia_box webim_dia_r">
        <div class="dia_info">
            <span class="message_send_status"></span>
            <span class="info_date">{$message.timestamp}</span>
        </div>
        <div class="webim_dia_bg">
            <div class="dia_con">
                <p class="dia_txt">{$message.content}</p>

                <div class="dia_att"></div>
            </div>
            <div class="msg_arr"></div>
        </div>
    </div>
</script>
<script id="webim_dialog_box_left" type="text/x-jsmart-tmpl">
    <div class="webim_dia_box webim_dia_l">
        <div class="dia_info"><span class="info_date">{$message.timestamp}</span></div>
        <div class="webim_dia_bg">
            <div class="dia_con">
                <p class="dia_txt">{$message.content}</p>

                <div class="dia_att"></div>
            </div>
            <div class="msg_arr"></div>
        </div>
    </div>
</script>
<script id="webim_chating_friend_item" type="text/x-jsmart-tmpl">
    <li title="{$user.username}" data-user-id="{$user.id}" class="chatbox-user" id="chatbox_user_{$user.id}"
        node-type="user_root" action-type="chatTab.onclick" action-data="uid={$user.id}" class="webim_active">
        <div class="list_head_state">
            <span class="W_chat_stat W_chat_stat_offline" node-type="webim_status"></span>
        </div>
        <div class="webim_username" node-type="webim_username">{$user.username}<span class="webim_icon_vf"></span>
        </div>
        <a class="WBIM_icon_wbclose" href="javascript:void(0);" onclick="return false;"
           hidefocus="true" node-type="webim_icon_close_s"></a>
    </li>
</script>

<script id="webim_friend_list_item" type="text/x-jsmart-tmpl">
    <li class="clearfix friend-list-user" data-user-id="{$user.id}" id="friend_list_user_{$user.id}"
        node-type="maxUserItemRoot" action-type="userItem" action-data="uid={$user.id}&amp;from=max">
        <div class="webim_list_head webim_head_30">
            <span class="head_pic">
                <img class="webim_user_item_img" node-type="headPicNode" width="30" height="30"
                     src="{$user.avatar_url}"
                     imgsrc="http://tp4.sinaimg.cn/1056926731/30/22829982571/1"></span>
            <span node-type="maxUserItemState" class="W_chat_stat W_chat_stat_offline" style="display:;"></span>
            <span node-type="maxUserItemResource" class="WBIM_icon_dev WBIM_icon_#"></span>
            <span node-type="maxNewMsgIcon" class="WBIM_icon_new"></span>
        </div>
        <div class="webim_list_name">
            <span class="user_name">{$user.username}</span>&nbsp;
            <a node-type="maxMemberIcon" action-type="maxMemberIcon"
               style="display: none;"
               href="http://vip.weibo.com/personal?from=webim"
               title="会员用户" target="_blank"><span
                    class="webim_ico_member"></span></a></div>
    </li>
</script>
<script id="webim_dia_list" type="text/x-jsmart-tmpl">
    <div data-user-id="{$user_id}" class="webim_dia_list" id="webim_dia_list_{$user_id}"
         style="overflow: hidden; padding: 5px; display: block; visibility: visible;">
        {foreach $messages as $message}
        {if $message.user_id==$user_id}
        {include file='webim_dialog_box_right'}
        {else}
        {include file='webim_dialog_box_left'}
        {/if}
        {/foreach}
        <div class="webim_dia_line"></div>
    </div>
</script>
<script id="webim_chatbox_head_area" type="text/x-jsmart-tmpl">
    <p class="tit2_lf_con" node-type="webim_single_user" style="">
        <a target="_blank" class="webim_list_head webim_head_50"
           node-type="single_user_head" href="/{$user.id}">
            <span class="head_pic">
                <img alt="{$user.username}的头像" node-type="user_pic" src="{$user.avatar_url}"></span>
            <span class="W_chat_stat W_chat_stat_offline" node-type="webim_u_status"></span>
        </a>
        <span class="chat_name">
            <a target="_blank" node-type="webim_tit_lf_name" title="{$user.username}"
               href="/{$user.id}?source=webim">{$user.username}</a>
        </span>
        <span style="display: none;"
              class="input_state state_inputing"
              node-type="webim_tit_lf_count">正在输入</span>
    </p>
</script>

{/literal}
