    <link rel="stylesheet" href="/stylesheets/special/courseDocument/list.css">


{*<div class="upload-toolbar">*}
    {*<div class="tool_bar_wrap clearfix" style="position: relative; top: 0px; left: auto; z-index: auto;">*}
        {*<button class="btn" id="course_document_upload">上传文件</button>*}
        {*<button class="btn" id="course_document_refresh">刷新</button>*}
    {*</div>*}
    {*<div class="mysearch_wrap clearfix">*}
        {*<div class="mode-option-wrap">*}
        {*button group of list view and grid view*}
        {*</div>*}
        {*<form id="search_form" method="get" action="/courseDocument/search?type={$course_or_class}&id={$course_or_class_id}">*}
            {*<input type="text" name="keyword" maxlength="20" defaultchars="搜索我的文件">*}
            {*<input type="submit" title="搜索我的文件" value="搜索">*}
        {*</form>*}
    {*</div>*}
{*</div>*}
<div class="table-container" id="subject_docs" subject_type="{$course_or_class}" subject_id="{$course_or_class_id}">
    {include file="file:[0]courseDocument/table.tpl"}
</div>
<div class="modal-container">
    <div id="document_title_setting" class="modal hide fade">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>修改资源信息</h3>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
            <a href="javascript:void(0);" class="btn btn-primary save">保存</a>
        </div>
    </div>
</div>
    {literal}
    <script id="document_title_form_tmpl" type="text/x-jsmart-tmpl">
        {foreach $data as $file}
        <form class="set_document_title" action="/courseDocument/create?type={$type}&id={$id}&file_id={$file->id}">
            <label for="file_title">修改文件标题</label>
            <input id="file_title" type="text" value="{$file->name}" name="title">
            <label for="file_description">文件描述</label>
            <textarea name="description" id="file_description" cols="50" rows="3"></textarea>
        </form>
        {/foreach}
    </script>
    <script id="document_title_modify_tmpl" type="text/x-jsmart-tmpl">
        <form class="modify_document_title" action="/courseDocument/modify?doc_id={$doc->id}">
            <label for="file_title_modify">修改文件标题</label>
            <input id="file_title_modify" type="text" value="{$doc->title}" name="title">
            <label for="file_description_modify">文件描述</label>
            <textarea name="description" id="file_description_modify" cols="50" rows="3">{$doc->description}</textarea>
        </form>
    </script>

    {/literal}

    {literal}
    <script type="text/javascript">
    require(['jquery', 'jsmart','bootstrap/modal'], function () {

        $(document).ready(function () {
            $("form.set_document_title").bind("keypress", function (e) {
                if (e.keyCode == 13) {
                    return false;
                }
            });
        });
        $("#course_document_refresh").click(function(){
            $('#subject_docs').html('');
            $.get('/courseDocument/table?type='+$('#subject_docs').attr('subject_type')+"&id="+$('#subject_docs').attr('subject_id'),function(data){
                $('#subject_docs').html(data)
            })
        });
        require(['form'],function(){
            $('#search_form').ajaxForm({
                success:function(data){
                    $('#subject_docs').html(data)
                }
            })
        });
        $('#course_document_upload').click(function () {
            if ($("#course-intro").attr('user_id') == 0) {
                $.WJ('notify', {
                    title:"请先登录",
                    content:"此操作需要登录，是不是还没有<a href='/login'>登录</a>？"
                })
                return false;
            }
            $.WJ('fileupload', function (data) {
                $('#document_title_form_tmpl').WJ('jSmartFetch', {
                    data:data,
                    type:$('#subject_docs').attr('subject_type'),
                    id:$('#subject_docs').attr('subject_id')
                }, function (data) {
                    $('#document_title_setting .modal-body').html(data);
                    $('#document_title_setting').modal()
                    require(['form'], function () {
                        $('form.set_document_title').ajaxForm({
                            dataType:'json',
                            success:function (data) {
                                if (data['code'] == 200) {
                                    $('#subject_docs tbody').append(data['data']);
                                } else {
                                    $.WJ('notty', {
                                        content:data['data'],
                                        title:'创建失败'
                                    })
                                }
                            },
                            beforeSubmit:function () {
                                $('#document_title_setting').modal('hide')
                            }
                        })
                    })
                })
            })
        });
        $(document).on('click', '#document_title_setting .save',function () {
            $('#document_title_setting form').submit();
        }).on('click', '.doc-item .delete-doc',function () {
                    var this_doc_item = $(this).parents('.doc-item');
                    var doc_id = this_doc_item.attr('doc_id');
                    $.post('/courseDocument/delete?doc_id=' + doc_id, function (data) {
                        if (data.code == 200) {
                            this_doc_item.remove();
                        } else {
                            $.WJ('notify', {
                                content:data.data
                            })
                        }
                    }, 'json')
                }).on('click', '.doc-item .modify-doc', function () {
                    var this_doc_item = $(this).parents('.doc-item')
                    $('#document_title_modify_tmpl').WJ('jSmartFetch', {
                        doc:{
                            id:this_doc_item.attr('doc_id'),
                            title:$.trim(this_doc_item.find('.file-intro .title').text()),
                            description:$.trim(this_doc_item.find('.file-intro .title').attr('title'))
                        }
                    }, function (data) {
                        $('#document_title_setting .modal-body').html(data);
                        $('#document_title_setting').modal()
                        require(['form'],function(){
                            $('form.modify_document_title').ajaxForm({
                                dataType:'json',
                                success:function (data) {
                                    if (data['code'] == 200) {
                                        this_doc_item.replaceWith(data.data);
                                    } else {
                                        $.WJ('notty', {
                                            content:data['data'],
                                            title:'创建失败'
                                        })
                                    }
                                },
                                beforeSubmit:function () {
                                    $('#document_title_setting').modal('hide')
                                }
                            })
                        })
                    })
                })


    });
    {/literal}
</script>

