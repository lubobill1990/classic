{foreach $dialog_list as $dialog}
    {if $dialog[0]->from_user_id == $this_user->id}
    {include file="file:[0]message/history/_dialog_right.tpl"}
        {else}
    {include file="file:[0]message/history/_dialog_left.tpl"}
    {/if}

{/foreach}
