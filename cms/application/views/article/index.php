<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">

        <blockquote class="layui-elem-quote">
            <p>文章列表</p>
        </blockquote>

        <table class="layui-table" lay-skin="line">
            <colgroup>
                <col width="50">
                <col>
                <col>
                <col>
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>ID</th>
                <th>封面</th>
                <th>标题</th>
                <th>添加时间</th>
                <th>修改时间</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $val): ?>
                <tr>
                    <td><?= $val['art_id'] ?></td>
                    <td><img src="<?= $val['cover'] ?>" alt="" height="20" width="40"></td>
                    <td><?= $val['title'] ?></td>
                    <td><?= $val['atime'] ?></td>
                    <td><?= $val['utime'] ?></td>
                    <td><?php if($val['status']==0)echo '正常';if($val['status']==1)echo '删除';if($val['status']==2)echo '冻结';?></td>
                    <td>
                        <div class="layui-btn-group">
                            <a class="layui-btn layui-btn-xs " href="<?= site_url("article/detail/{$val['art_id']}") ?>">查看</a>
                            <a class="layui-btn layui-btn-xs " href="<?= site_url("article/edit/{$val['art_id']}") ?>">编辑</a>
                            <a class="layui-btn layui-btn-xs " onclick="test(<?= $val['art_id'] ?>)">冻结</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pageLinks ?>


        <div class="layui-box layui-laypage layui-laypage-molv" id="layui-laypage-4">
            <a href="javascript:;" class="layui-laypage-prev layui-disabled" data-page="0">上一页</a>
            <span class="layui-laypage-curr">
            <em class="layui-laypage-em" style="background-color:#FF5722;"></em><em>1</em>
            </span>
            <a href="javascript:;" data-page="2">2</a>
            <span class="layui-laypage-spr">…</span>
            <a href="javascript:;" class="layui-laypage-last" title="尾页" data-page="10">10</a>
            <a href="javascript:;" class="layui-laypage-next" data-page="2">下一页</a>
        </div>

    </div>
</div>

<script>
    $(function () {
    });

    function test(artId) {
        layer.confirm("确认冻结？", function () {
            var data = {"id": artId};
            var url = '<?=site_url('article/delete')?>';
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
        })
    }
</script>