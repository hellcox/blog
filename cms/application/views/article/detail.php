<link rel="stylesheet" href="<?= base_url('assets/ext/editor.md/css/editormd.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/ext/editor.md/css/editormd.preview.min.css') ?>">
<style>
    .content{
        max-width: 800px;
        padding: 0; !important;
    }
    .content img{
        max-width: 100%;
    }
</style>


<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">

        <blockquote class="layui-elem-quote">
            <p>文章详情 > 标题：<span style="color: #00a8c6"><?=$article['title']?></span></p>
        </blockquote>

        <div class="content" id="content" style="padding: 0">
            <?=$article['content']?>
        </div>

    </div>
</div>
<script src="<?= base_url('assets/ext/editor.md/lib/marked.min.js') ?>" charset="UTF-8"></script>
<script src="<?= base_url('assets/ext/editor.md/lib/prettify.min.js') ?>" charset="UTF-8"></script>
<script src="<?= base_url('assets/ext/editor.md/editormd.js') ?>" charset="UTF-8"></script>
<script type="text/javascript">
    editormd.markdownToHTML("content");
</script>
