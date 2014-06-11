<script type="text/javascript">
    require(['main', 'jquery'], function () {
        $('#button').click(function () {
            {
                $.WJ('imageupload', function (uploaded_files) {

                })
            }
        })
        $('#file_button').click(function () {
            {
                $.WJ('fileupload', function (uploaded_files) {
                    for(var i in uploaded_files){
                        $('body').append("<a target='_blank' href='"+uploaded_files[i].delete_url+"'>"+uploaded_files[i].name+"</a><br/>")
                    }
                })
            }
        })
    })
</script>
<div id="button">点击图片上传</div>
<div id="file_button">点击文件上传</div>