{$file=$doc->file}
<tr class="doc-item" id="course_doc_{$doc->id}" doc_id="{$doc->id}" file_id="{$doc->file->id}">
    <td>
        <div class="clearfix">
            <div class="file-icon">
                <img src="{$file->getIconUrl()}" alt="">
            </div>
            <div class="file-intro">
                <div class="title" title="{$doc->description}">
                {$doc->title}
                </div>
            </div>
        </div>
    </td>
    <td class="file-size">{$file->getFormattedSize()}</td>
    <td class="file-timpstamp">{$file->create_time|date_format:"%Y-%m-%d %H:%M"}</td>
    <td class="file-operation">
        <div class="file-tool">
            <a target="_blank" href="{$file->url}">下载</a>
            {*<a name="" onclick="">分享</a>*}
        </div>
    {if $login_user and $doc->user_id==$login_user->id}
        <a class="delete-doc">删除</a>
        <a class="modify-doc">更改</a>
    {/if}
    </td>
</tr>