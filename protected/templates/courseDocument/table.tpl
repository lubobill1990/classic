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