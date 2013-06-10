<dl node-type="msgList" class="private_SRLr clearfix">
    <dt class="face"><a href="{$this_user->url}" title="">
        <img width="50" height="50" usercard="id={$this_user->id}"
             src="{$this_user->getAvatarUrl(50)}"></a></dt>
    <dd class="W_border content  ">
    {foreach $dialog as $message}
    {include file="file:[0]message/history/_dialog_right_item.tpl"}
        {if !$message@last}
            <div class="W_linedot"></div>
        {/if}
    {/foreach}
        <div class="arrow"></div>
    </dd>
</dl>