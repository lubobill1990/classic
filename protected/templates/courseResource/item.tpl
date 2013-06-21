{if $resource|default:false}
<div class="item">
    <p><span class="item-1">{if $resource->category=='video'}[ 视频 ]{else}[ 链接 ]{/if}</span><a target="_blank" href="{$resource->url}">{$resource->title}</a><span class="item-2">顶+10</span><span
            class="item-2">踩-3</span></p>

    <p>推荐人：<a href="{$resource->user->url}">{$resource->user->username}</a>{if $resource->description}推荐理由：{$resource->description}{/if}</p>
</div>
{/if}
