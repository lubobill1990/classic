<dl node-type="msgList" class="private_SRLl clearfix">
    <dt class="face"><a href="{$with_user->url}" title="">
        <img width="50" height="50" usercard="id={$with_user->id}" src="{$with_user->getAvatarUrl(50)}"></a></dt>
    <dd class="W_border content">
        {foreach $dialog as $message}
        {include file="file:[0]message/history/_dialog_left_item.tpl"}
        {if !$message@last}
            <div class="W_linedot"></div>
        {/if}
        {/foreach}
        <div class="arrow"></div>
    </dd>
</dl>