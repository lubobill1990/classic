<div class="process-step">
    <div class="progress success round">
        {$steps=$labels|count}
        {$percent=100/($steps+1)*$current}
        <span class="meter" style="width: {$percent}%"></span>
    </div>
    {$count=1}
    {foreach $labels as $label}
        {$active=''}
        {if $count<$current}
            {$active="active"}
        {elseif $count==$current}
            {$active="current"}
        {else}
            {$active=""}
        {/if}
        {$left=100/($steps+1)*$count}
        <div class="step step-icon step-{$count} {$active}" style="left:{$left-1}%">{$count} <span>{$label}</span></div>
        {$count=$count+1}
    {/foreach}
</div>