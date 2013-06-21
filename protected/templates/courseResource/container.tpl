<div class="clearfix">
    <h2 class="fl">相关链接</h2>
    <a class="btn2 fl" id="recommend-link">我来推荐链接</a>
</div>
{if $resources|count==0}
<p>还没有资料，来上传第一份资料吧~</p>
    {else}
{include file="file:[0]courseResource/list.tpl" resources=$resources}
<div id="course_resource_pagination" data-type="{$type}" data-id="{$id}" data-resource-count="{$count}"
     data-perpage-num="{$items_per_page}">
</div>
<div class="modal-container">
    <div id="recommend-link-form" class="modal hide fade">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>推荐链接</h3>
        </div>
        <div class="modal-body">
            <form action="/courseResource/recommend" method="post">
                <label for="recommend-link-name">链接名称</label>
                <input type="text" id="recommend-link-name" name="title"/>
                <label for="recommend-link-url">链接地址</label>
                <input type="text" id="recommend-link-url" name="url"/>
                <label for="recommend-link-reason">推荐理由</label>
                <textarea id="recommend-link-reason" name="description"></textarea>
                <br/><br/>
                这是一个？<input type="radio" checked="checked" name="category" value="video"/>视频
                <input type="radio" name="category" value="link"/>其他
                <input type="hidden" name="course_id" value="{$course->id}"/>
            </form>
        </div>
        <div class="modal-footer">
            <a class="btn btn-primary save">保存</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    require(['jquery', 'bootstrap/modal'], function () {
        var pagi_ele = $('#course_resource_pagination')
        $('#course_resource_pagination').WJ('pagination', pagi_ele.attr('data-resource-count'), pagi_ele.attr('data-perpage-num'), function (index) {
            $.post('/courseResource/list?id=' + pagi_ele.attr('data-id') + "&type=" + pagi_ele.attr('data-type'), {
                page_no:index
            }, function (data) {
                $('#course_resource_list').html(data)
            })
        })
        $('#recommend-link').click(function () {
            $('#recommend-link-form').modal();
        });
        $('#recommend-book').click(function () {
            $('#recommend-book-form').modal();
        });
        require(['form'], function () {
            $('#recommend-link-form form').ajaxForm({
                dataType:'json',
                success:function (data) {
                    if (data['code'] == 200) {
                        $('#course_resource_list').append(data['data']);
                        $('#recommend-link-form form').reset();
                    } else {
                        $.WJ('notty', {
                            content:data['data'],
                            title:'推荐失败'
                        })
                    }
                },
                beforeSubmit:function () {
                    $('#recommend-link-form').modal('hide')
                }
            });

            $('#recommend-link-form .save').click(function () {
                $('#recommend-link-form form').submit();
            });

        })
    })
</script>
{/if}