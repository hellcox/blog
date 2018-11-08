<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">

        <blockquote class="layui-elem-quote">文章编辑</blockquote>

        <form class="layui-form" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">文章标题</label>
                <div class="layui-input-block">
                    <input type="text" name="title" lay-verify="title" placeholder="请输入标题"
                           value="<?= $article['title'] ?>" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文章描述</label>
                <div class="layui-input-block">
                    <input type="text" name="desc" lay-verify="desc" placeholder="请输入描述"
                           value="<?= $article['desc'] ?>" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">关键词</label>
                <div class="layui-input-block">
                    <input type="text" name="key" lay-verify="key" placeholder="请输入关键词"
                           value="<?= $article['key_words'] ?>" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文章封面</label>
                <div class="layui-input-block">
                    <button type="button" class="layui-btn layui-btn-sm" id="upload"><i class="layui-icon"></i>上传文件
                    </button>
                    <button type="button" class="layui-btn layui-btn-danger layui-btn-sm" id="close-cover">删除</button>
                </div>
                <img id="cover" src="<?= $article['cover'] ?>" alt="" height="100">
            </div>
        </form>
        <button class="layui-btn layui-btn-normal" id="confirm">确认修改</button>
        <br><br>
        <div id="editormd">
            <textarea style="display:none;"><?= $article['markdown_content'] ?></textarea>
        </div>
    </div>
</div>
<link rel="stylesheet" href="<?= base_url('assets/ext/editor.md/css/editormd.css') ?>">
<script src="<?= base_url('assets/ext/editor.md/editormd.js') ?>" charset="UTF-8"></script>
<script>
    $(function () {
        // 加载编辑器
        editor = editormd("editormd", {
            width: "100%",
            height: 500,
            saveHTMLToTextarea: true,
            path: "<?= base_url('assets/ext/editor.md/lib/') ?>",
            imageUpload: true,
            imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            imageUploadURL: "<?=site_url('upload/md_image')?>",
        });
        // 上传文件 - 临时
        layui.upload.render({
            elem: '#upload'
            , url: '<?=site_url('upload/file')?>'
            , accept: 'file' //普通文件
            , done: function (res) {
                $("#cover").attr('src', res.data.file_url);
                $("#cover").show();
                $("#close-cover").show();
            }
        });
        // 清空图片
        $("#close-cover").click(function () {
            $("#cover").hide();
            $("#cover").attr('src', "");
            $("#close-cover").hide();
        });
        $("#confirm").click(function () {
            var id = "<?=$article['art_id']?>";
            var title = $("input[name='title']").val();
            var desc = $("input[name='desc']").val();
            var key = $("input[name='key']").val();
            var cover = $("#cover").attr('src');
            var content = editor.getMarkdown();
            var html = editor.getHTML();
            var data = {
                "id": id,
                "title": title,
                "desc": desc,
                "key": key,
                "cover": cover,
                "content": content,
                "html": html
            };
            var url = '<?=site_url('article/edit')?>';
            $.post(url, data, function (res) {
                if (res.code == 0) {
                    layui.layer.msg(res.msg, {time: 1000}, function () {
                        location.reload();
                    });
                } else {
                    layui.layer.msg(res.msg);
                }
                console.log(res);
            });
        });
    });
</script>