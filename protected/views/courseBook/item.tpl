<li>
    <a href="{$book->url}" target="_blank"><img src="{$book->thumbnail_url}"/></a>

    <div class="slide-popup none">
        <div class="slide-popup-left"></div>
        <h6>{$book->name}</h6>

        <p>推荐人： <a href="{$book->user->url}">{$book->user->username}</a></p>

        <p>推荐理由：{$book->comment}</p>
    </div>
</li>