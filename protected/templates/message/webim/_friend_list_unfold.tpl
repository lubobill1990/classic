<div class="webim_list WBIM_unfold" node-type="maxRoot"
     style="right: 0px; bottom: 0px; z-index: 1000; visibility: visible; display: none">
    <div class="webim_list_wrap " node-type="listWrap" style="position:relative;">
        <div class="webim_list_header clearfix" node-type="maxTabContainer" style="position:relative;z-index:5;">
            <div class="webim_tab" node-type="webim_max_tab_root">
                <ul class="tab_list clearfix">
                    <li class="cur clearfix" node-type="maxContactsTab" title="互相关注"
                        suda-uatrack="key=tblog_webim_behavior5&amp;value=mutual_concern_tab"><a
                            href="javascript:void(0);" onclick="return false;"><span
                            class=" webim_icon_tab WBIM_icontab_link"></span></a></li>
                    <li class="clearfix " node-type="maxGroupsTab" title="群聊"
                        suda-uatrack="key=tblog_webim_behavior5&amp;value=group_chat_tab"><a
                            href="javascript:void(0);" onclick="return false;"><span
                            class=" webim_icon_tab WBIM_icontab_group "></span></a></li>
                    <li class="clearfix" node-type="maxRecentsTab" title="最近联系人"
                        suda-uatrack="key=tblog_webim_behavior5&amp;value=recent_contact_tab"><a
                            href="javascript:void(0);" onclick="return false;"><span
                            class=" webim_icon_tab WBIM_icontab_last"></span></a></li>
                </ul>
            </div>
        </div>
        <div class="webim_list_main clearfix" node-type="maxMain">
            <div node-type="maxRecentsScroll" id="friend-list-scroll-container" class="scrollbar-container">
                <div class="scrollbar">
                    <div class="track">
                        <div class="thumb">
                            <div class="end"></div>
                        </div>
                    </div>
                </div>
                <div class="viewport" style="width: 170px;">
                    <div class="overview">
                        <div class="webim_chat_tips webim_tips01">删除<a target="_blank" href="/message">私信</a>后可移除最近联系人
                        </div>
                        <div class="list_box clearfix" node-type="maxListRoot">
                            <div class="list_content">
                                <ul class="list_content_li" id='friend_list_item_container'
                                    node-type="maxListContainer">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="webim_list_setting webim_setting_narrow" node-type="maxBottomContainer" style="z-index: 9999;">
            <div class="list_setting_box" node-type="maxSettingBox">
                <div class="setting_r">
                    <div class="layer_menu_list" node-type="maxSettingMenu"
                         style="position: absolute; display: none; right: 0px; bottom: 28px; z-index: 9999; visibility: hidden;">
                        <div class="menu_setting">
                            <ul class="list_oth list_border">
                                <li><a node-type="helloSetting" href="javascript:void(0);"
                                       onclick="return false;">取消打招呼提醒</a>
                                </li>
                                <li><a node-type="onlineTipsSetting" href="javascript:void(0);"
                                       onclick="return false;">取消上线提醒</a></li>
                                <li><a node-type="newMsgSoundSetting" style="visibility: visible;"
                                       href="javascript:void(0);" onclick="return false;">关闭声音提醒</a></li>
                            </ul>
                            <ul class="list_oth list_border">
                                <li><a href="#" target="_blank"
                                       suda-uatrack="key=tblog_webim_behavior5&amp;value=feedback">意见反馈</a></li>
                                <li><a href="http://account.weibo.com/set/notice#webim" target="_blank"
                                       suda-uatrack="key=tblog_webim_behavior5&amp;value=chat_site">聊天设置</a></li>
                            </ul>
                            <div class="select_state">
                                <ul node-type="maxFloatModelRadioContainer" class="state_list"
                                    style="display: none;">
                                    <li node-type="bottomFloatRadioLi" class="clearfix" style="cursor: pointer">
                                        <input node-type="bottomFloatRadio" type="radio" name="setting_position"
                                               class="WJ_radio" style="cursor: pointer"><label
                                            style="cursor: pointer">最小化时到底部</label></li>
                                    <li node-type="broadsideFloatRadioLi" class="clearfix" style="cursor: pointer">
                                        <input node-type="broadsideFloatRadio" type="radio" name="setting_position"
                                               class="WJ_radio" style="cursor: pointer"><label
                                            style="cursor: pointer">最小化时到右侧</label></li>
                                </ul>
                            </div>
                            <ul class="list_oth">
                                <li><a href="javascript:void(0);" onclick="return false;"
                                       node-type="changeStatusNode">切换为隐身状态</a></li>
                            </ul>
                        </div>
                    </div>
                    <a title="查看我的私信" href="/message" target="_blank" class="setting_btn">
                        <span class="WBIM_icon_msg"></span></a>
                    <a title="私信聊天设置" class="setting_btn"
                       href="javascript:void(0);" onclick="return false;"
                       node-type="maxSettingBtn"><span
                            class="WBIM_icon_setting"></span></a>
                    <a title="收起私信聊天" class="setting_btn"
                       href="javascript:void(0);" onclick="return false;"
                       node-type="rightFoldBtn" action-type="foldButton"
                       action-data="from=max" style="display: none;"><span
                            class="WBIM_icon_rightfold"></span></a>
                    <a title="收起私信聊天" class="setting_btn"
                       href="javascript:void(0);" onclick="return false;"
                       node-type="maxDownfoldBtn"
                       action-type="downFoldButton" style="">
                        <span class="WBIM_icon_downfold"></span></a>
                </div>
                <div node-type="unfocusSearchBox" class="setting_ser" style="visibility: visible;">
                    <div class="ser_tit"><span class="WBIM_icon_search"></span><span class="tit_txt">查找好友</span>
                    </div>
                </div>
                <div node-type="searcherBox" class="search_box" style="display: none; visibility: hidden;">
                    <span><input node-type="maxSearchInput" type="text" class="tit_input"></span><a
                        style="display: none; visibility: hidden;" title="清除" node-type="clearInputNode"
                        href="javascript:void(0);" onclick="return false;" class="WBIM_icon_wbclose"></a></div>
            </div>
        </div>
        <div class="webim_chat_tips webim_tips02"
             style="display:none;width:164px;position:absolute;bottom:0;right:0; z-index: 6000;"
             node-type="webim_list_relink"><span style="display:none;" node-type="connecting_wait"><span
                node-type="wait_seconds">10</span>秒后尝试连接，<a title="立即连接" href="javascript:void(0);"
                                                            onclick="return false;" action-type="click"
                                                            node-type="wait_connect_imm">立即连接</a></span><span
                style="display:none" node-type="connecting"><span class="webim_loading">正在连接，</span><a title="取消连接"
                                                                                                       href="javascript:void(0);"
                                                                                                       onclick="return false;"
                                                                                                       node-type="cancel_connect"
                                                                                                       action-type="click">取消</a></span><span
                style="display:none;" node-type="connecting_fail">登录失败，<a title="重新连接" href="javascript:void(0);"
                                                                          onclick="return false;"
                                                                          node-type="reconnect_imm"
                                                                          action-type="click">重新连接</a></span></div>
    </div>
    <a class="webim_fold_btn" node-type="leftFoldBtn" action-type="foldButton" action-data="from=max"
       href="javascript: void(0);" style="display: none;">
    <span class="btn_click">
    <em class="WJ_webim_arrow"></em></span>
    </a>
</div>
