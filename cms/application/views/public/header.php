<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>水果豆豆 后台布局</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="<?= base_url("assets/ext/layui/css/layui.css") ?>" media="all">
    <script src="<?= base_url("assets/js/jquery-3.3.1.min.js") ?>" charset="utf-8"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">水果豆豆</div>

        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="<?= base_url("assets/img/head.jpg") ?>" class="layui-nav-img">
                    土豆
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="<?=site_url('login/logout')?>">安全退出</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->

            <ul class="layui-nav layui-nav-tree" lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">文章中心</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?=site_url("article/index")?>">文章列表</a></dd>
                        <dd><a href="<?=site_url("article/add")?>">文章新增</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">点我干嘛</a></li>
            </ul>
        </div>
    </div>



