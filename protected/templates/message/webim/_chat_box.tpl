<div class="webim_chat_box" id="webim_chat_box"
     style="position: absolute; right: 200px; bottom: 0px; z-index: 9500; display: none;"
     node-type="webim_chat_box">
    <div class="webim_chat_con" node-type="webim_chat_con">
        <div class="webim_tit2" node-type="webim_tit">
            <div class="webim_titin" node-type="webim_titin">
                <div class="webim_tit2_lf" id="webim-chatbox-head">

                    <p class="tit2_lf_con" node-type="webim_group" style="display: none;"><a target="_blank"
                                                                                             class="webim_list_head webim_head_50"
                                                                                             node-type="group_head"
                                                                                             suda-uatrack="key=tblog_webim_behavior5&amp;value=iconver"><span
                            class="head_pic"><img node-type="group_pic" alt=""></span><span class="WBIM_icon_group"
                                                                                            node-type="webim_g_status"></span></a><span
                            class="txt" suda-uatrack="key=tblog_webim_behavior5&amp;value=nick"><a target="_blank"
                                                                                                   node-type="webim_tit_lf_gname"></a><em
                            class="txtg">在线成员(<a title="查看在线成员" node-type="group_num"
                                                 target="_blank"></a>)</em></span></p></div>
                <div class="webim_tit2_rt"><a href="javascript:void(0);" onclick="return false;"
                                              class="rt_icon WBIM_icon_settingY" hidefocus="true" title="设置"
                                              node-type="WBIM_icon_setting"></a><a href="javascript:void(0);"
                                                                                   onclick="return false;"
                                                                                   class="rt_icon WBIM_icon_minY"
                                                                                   hidefocus="true" title="最小化"
                                                                                   node-type="WBIM_icon_mini"></a><a
                        href="javascript:void(0);" onclick="return false;" class="rt_icon WBIM_icon_closeY"
                        hidefocus="true" title="关闭" node-type="WBIM_icon_close"></a></div>
            </div>
        </div>
        <div class="layer_setting" style=" right:-25px; top:-31px;display:none;" node-type="layer_setting">
            <ul class="setting_list">
                <li class="clearfix" node-type="autoHide"><input type="radio" class="WJ_radio"
                                                                 id="WJ_radio_autoHideSetting_01"
                                                                 node-type="autoHideLi"
                                                                 name="WJ_radio_autoHideSetting"><label
                        for="WJ_radio_autoHideSetting_01">自动收起</label></li>
                <li class="clearfix" node-type="fixChatWindow"><input type="radio" class="WJ_radio"
                                                                      id="WJ_radio_autoHideSetting_02"
                                                                      node-type="fixChatWindowLi"
                                                                      name="WJ_radio_autoHideSetting"><label
                        for="WJ_radio_autoHideSetting_02">保持展开</label></li>
            </ul>
        </div>
        <div class="webim_chat_wrap">
            <div class="webim_win_mutiperson" node-type="webim_win_mutiperson" style="visibility: visible;">
                <div class="webim_chat_lf" node-type="webim_chat_lf">
                    <a href="javascript:void(0);" onclick="return false;" hidefocus="true" class="webim_scrolltop"
                       node-type="webim_scrolltop"></a>

                    <div class="webim_chat_friend_box">
                        <ul class="webim_chat_friend_list" id="webim_chat_friend_list"
                            node-type="webim_chat_friend_list">
                        {* chating friend item *}
                        </ul>
                    </div>
                    <a href="javascript:void(0);" onclick="return false;" hidefocus="true" class="webim_scrollbtm"
                       node-type="webim_scrollbtm"></a>
                </div>
            </div>
            <div class="webim_chat_rt" style="position: relative;">
                <div class="webim_chat_up" style="height: 249px; overflow: hidden;">
                    <div class="webim_chat_tips webim_tips01" node-type="webim_chat_tips"
                         style="width: 300px; display: block; visibility: visible;">
                        <a hidefocus="true"
                           href="javascript:void(0);"
                           onclick="return false;"
                           node-type="webim_icon_close_s"
                           class="WBIM_icon_tipsclose"></a>
                <span
                        class="tips_icon icon_warnS"></span><span
                            node-type="webim_chat_tips_content">对方当前不在线或隐身，可能无法立即回复。</span>
                    </div>
                    <div class="webim_chat_list">
                        <div id="webim-chatbox-scrollbar" style="height: 224px;" class="scrollbar-container">
                            <div class="scrollbar">
                                <div class="track">
                                    <div class="thumb">
                                        <div class="end"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="viewport">
                                <div class="overview webim_chat_dialogue" id="webim_chat_dialogue">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="webim_chat_sendbox">
                    <div class="sendbox_bar clearfix" node-type="webim_chat_toolbar"
                         style="position:relative;z-index:109;">
                        <div class="sendbox_ac">
                            <span class="sendbox_kind" node-type="webim_chat_toolbarin"> <a
                                    href="javascript:void(0);" onclick="return false;"
                                    class="WBIM_icon_com WBIM_iconsend_face" node-type="webim_msgToolBar_face"
                                    suda-uatrack="key=tblog_webim_behavior5&amp;value=expression_button">表情</a>
            {*<div*}
                    {*style="position: absolute; z-index: 1500; left: 43px; margin-top: -20px; overflow: hidden; width: 44px;">*}
                {*<embed width="44" height="16" id="webim_tips_char"*}
                       {*src="http://service.weibo.com/staticjs/tools/upload.swf?v=c9a068c862bc342e"*}
                       {*type="application/x-shockwave-flash" menu="false" scale="noScale"*}
                       {*allowfullscreen="true" allowscriptaccess="always" bgcolor="" wmode="transparent"*}
                       {*data="upload.swf"*}
                       {*flashvars="swfid=1751638320&amp;maxSumSize=50&amp;maxFileSize=50&amp;maxFileNum=1&amp;multiSelect=0&amp;uploadAPI=http%3A%2F%2Fupload.api.weibo.com%2F2%2Fmss%2Fupload.json%3Fsource%3D209678993%26tuid%3D1887188824&amp;initFun=STK.webim.ui.chatWindow.msgToolBar.upload.initFun&amp;sucFun=STK.webim.ui.chatWindow.msgToolBar.upload.sucFun&amp;errFun=STK.webim.ui.chatWindow.msgToolBar.upload.errFun&amp;beginFun=STK.webim.ui.chatWindow.msgToolBar.upload.beginFun&amp;showTipFun=STK.webim.ui.chatWindow.msgToolBar.upload.showTipFun&amp;hiddenTipFun=STK.webim.ui.chatWindow.msgToolBar.upload.hiddenTipFun&amp;areaInfo=0-16|12-16&amp;fExt=*.jpg;*.gif;*.jpeg;*.png|*&amp;fExtDec=选择图片|选择文件">*}
            {*</div>*}
                        </span>
                        </div>
                        <div class="sendbox_show "><span class="sendbox_oth"><a
                                href="/message/history?source=webim&amp;uid=1277885685"
                                target="_blank" class="sendbox_his" node-type="historyMsgBtn" title="查看私信记录"><em
                                class="WBIM_icon_com WBIM_iconsend_his"></em>聊天记录</a></span></div>
                        <div class="layer_title" node-type="webim_tips_title"
                             style="display:none;z-index:109;"></div>
                    </div>
                    <div class="sendbox_box clearfix" node-type="webim_chat_input">
                        <div class="webim_chat_input_tips" node-type="root" style="display: none;">
                            <div class="webim_tips_pos_n" node-type="webim_tips_pic" style="display: none;">
                                <div class="webim_tips_pic_n"><a href="javascript:void(0);"
                                                                 onclick="return false;"><img node-type="img_preview"
                                                                                              alt=""
                                                                                              action-type="webim_img_preview"
                                                                                              style="cursor:pointer"></a>
                                </div>
                                <span class="webim_p_arr"></span></div>
                            <div class="fl" node-type="fl"></div>
                            <div class="fr" node-type="fr"></div>
                        </div>
                        <textarea style="overflow-y: auto; height: 58px;" class="sendbox_area"
                                  node-type="webim_chat_input_ta"></textarea></div>
                    <div class="sendbox_btn clearfix" node-type="webim_chat_btm" style="position:relative">

                        <div class="sendbox_btn_r">
                            <p class="webim_tips_char">
                                <span node-type="webim_tips_char" id="char_limit_counter">255</span>
                                <span class="spetxt" node-type="spetxt"></span>
                            </p>

                            <a href="javascript:;" id='chatbox_send_message' class="W_btn_a"
                               hidefocus="true"
                               node-type="webim_btn_publish"><span>发送</span></a>


                        </div>
                    </div>
                </div>
                <div style="position: absolute; left: 0px; top: 0px; background-color: rgb(119, 119, 119); opacity: 0.6; z-index: 1001; display: none; visibility: hidden; background-position: initial initial; background-repeat: initial initial;"></div>
                <div class="webim_confirm_box" node-type="webim_confirm_box"
                     style="z-index: 1002; display: none; visibility: hidden;">
                    <div class="webim_confirm_con">
                        <div class="webim_confirm_info"><p class="webim_confirm_p"><span node-type="webim_confirm_icon"
                                                                                         class="webim_cfmicon_stat icon_askS"></span><span
                                class="txt" node-type="webim_confirm_txt"></span></p>

                            <p class="webim_confirm_btn"><a href="javascript:void(0);" onclick="return false;"
                                                            class="W_btn_a"
                                                            node-type="webim_confirm_confirm"><span>确认</span></a><a
                                    href="javascript:void(0);" onclick="return false;" class="W_btn_b"
                                    node-type="webim_confirm_cancel" style="display:none;"><span>取消</span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>