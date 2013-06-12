<div class="item">
    <p><span class="item-1">{if $resourse->category=='video'}[ 视频 ]{else}[ 链接 ]{/if}</span><a target="_blank" href="{$resourse->url}">{$resourse->title}</a><span class="item-2">顶+10</span><span
            class="item-2">踩-3</span></p>

    <p>推荐人：<a href="{$resource->user->url}">{$resourse->user->username}</a>推荐理由：{$resourse->description}</p>
</div>