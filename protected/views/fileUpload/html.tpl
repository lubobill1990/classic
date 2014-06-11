<div class="modal-container">

    <div id="file_upload_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" data-backdrop="false">
        <div class="modal-header">
            <h3 id="myModalLabel">上传资源</h3>
        </div>
        <div class="modal-body">

            <form class="fileupload" action="./create" method="POST" enctype="multipart/form-data">
                <div class="row fileupload-buttonbar">
                    <div class="span2">
                <span class="btn btn-success fileinput-button">
                    <i class="icon-plus icon-white"></i>
                    <span>添加文件...</span>
                    <input type="file" name="files[]" multiple="">
                </span>
                        <span class="fileupload-loading"></span>
                    </div>
                    <div class="span4 fileupload-progress fade">
                        <div class="progress progress-success progress-striped active" role="progressbar"
                             aria-valuemin="0" aria-valuemax="100">
                            <div class="bar" style="width:0%;"></div>
                        </div>
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                </div>
                <table role="presentation" class="table table-striped">
                    <tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody>
                </table>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn cancel-all cancel-all-uploads" data-dismiss="modal" aria-hidden="true">取消</button>
            <button class="btn btn-primary finish">完成</button>
        </div>
    </div>
</div>

{literal}
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade" file_id="{%=file.id%}">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            {% if (file.error) { %}
            <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <p class="size">{%=o.formatFileSize(file.size)%}</p>
            {% if (!o.files.error) { %}
            <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0"
                 aria-valuemax="100" aria-valuenow="0">
                <div class="bar" style="width:0%;"></div>
            </div>
            {% } %}
        </td>
        <td>
            {% if (!o.files.error && !i && !o.options.autoUpload) { %}
            <button class="btn btn-primary start">
                <i class="icon-upload icon-white"></i>
                <span>开始</span>
            </button>
            {% } %}
            {% if (!i) { %}
            <button class="btn btn-warning cancel">
                <i class="icon-ban-circle icon-white"></i>
                <span>取消</span>
            </button>
            {% } %}
        </td>
    </tr>
    {% } %}
</script>

<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade" file_id="{%=file.id%}">
        <td>
            <span class="preview">
                {% if (file.thumbnail_url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="gallery" download="{%=file.name%}"><img
                            src="{%=file.thumbnail_url%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}"
                   download="{%=file.name%}">{%=file.name%}</a>
            </p>
            {% if (file.error) { %}
            <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            <button class="btn btn-danger delete fright" data-type="{%=file.delete_type%}"
                    data-url="{%=file.delete_url%}"
            {% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
            <i class="icon-trash icon-white"></i>
            <span>删除</span>
            </button>
        </td>
    </tr>
    {% } %}
</script>
{/literal}
