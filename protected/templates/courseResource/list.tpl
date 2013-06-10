
<table class="table table-hover file-list">
{foreach $files as $file}
    <tr>
        <td>
            <div class="clearfix">
                <div class="file-icon">
                    <img src="{$file->getIconUrl()}" alt="">
                </div>
                <div class="file-intro">
                    <div class="title">
                        {$file->title}
                    </div>
                    <div class="file-tool">
                        <a target="_blank" href="{$file->url}">下载</a>
                        <a name="" onclick="">分享</a>
                    </div>
                </div>
            </div>
        </td>
        <td class="file-size">{$file->getFormattedSize()}</td>
        <td class="file-timpstamp">{$file->create_time|date_format:"%Y-%m-%d %H:%M"}</td>
        <td></td>
    </tr>
{/foreach}

</table>