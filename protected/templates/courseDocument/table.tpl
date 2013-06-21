<table class="table table-hover file-list">
    <thead>
    <tr>
        <th class="name">文件名</th>
        <th class="size">大小</th>
        <th class="time">时间</th>
        <th class="operation">操作</th>
    </tr>
    </thead>
    <tbody>
    {foreach $documents as $doc}
        {include file="./item.tpl" doc=$doc}
        {/foreach}
    </tbody>
</table>

{if $documents|count==0}
<div>还没有分享的文件，来分享第一份文件吧~</div>
{/if}