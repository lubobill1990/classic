<div class="clearfix">
    <h2 class="fl">相关链接</h2>
    <a class="btn2 fl" id="recommend-link">我来推荐链接</a>
</div>
<div id="course_resource_list">
{if $resources|count==0}
<p id="course_resource_list_dd">还没有资料，来上传第一份资料吧~</p>
    {else}
{include file="file:[0]courseResource/list.tpl" resources=$resources}
{/if}
</div>
<div id="course_resource_pagination" data-type="{$type}" data-id="{$id}" data-resource-count="{$count}"
     data-perpage-num="{$items_per_page}">
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
//        $('#recommend-link').click(function () {
//            $('#recommend-link-form').modal();
//        });
//        $('#recommend-book').click(function () {
//            $('#recommend-book-form').modal();
//        });
//        require(['form'], function () {
//            $('#recommend-link-form form').ajaxForm({
//                dataType:'json',
//                success:function (data) {
//                    if (data['code'] == 200) {
//                        $('#course_resource_list').append(data['data']);
//                        $('#recommend-link-form form').reset();
//                    } else {
//                        $.WJ('notty', {
//                            content:data['data'],
//                            title:'推荐失败'
//                        })
//                    }
//                },
//                beforeSubmit:function () {
//                    $('#recommend-link-form').modal('hide')
//                }
//            });
//
//            $('#recommend-link-form .save').click(function () {
//                $('#recommend-link-form form').submit();
//            });
//
//        })
    })
</script>
