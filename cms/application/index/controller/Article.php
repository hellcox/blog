<?php

namespace app\index\controller;

use lib\ApiResponse;

class Article extends BaseController
{
    public function index()
    {
        $article = new \app\index\model\Article();
        $list = $article->listAll(null);

        $this->assign('list', $list);
        $this->assign('page', $list->render());
        return $this->fetch();
    }

    public function edit()
    {
        $id = intval($_GET['id']);
        $article = \app\index\model\Article::get($id);
        $this->assign('article', $article);
        return $this->fetch();
    }

    public function doEdit()
    {
        $id = intval($_POST['id']);
        $title = $_POST['title'];
        $keyword = $_POST['keyword'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $md_content = $_POST['md_content'];

        if (empty($title) || empty($keyword) || empty($description) || empty($content) || empty($md_content)) {
            ApiResponse::error(-1, "参数错误");
        }

        $article = \app\index\model\Article::get($id);
        if (empty($article)) {
            ApiResponse::error(-1, "稿件不存在");
        }
        $article['title'] = $title;
        $article['keyword'] = $keyword;
        $article['description'] = $description;
        $article['content'] = $content;
        $article['md_content'] = $md_content;
        $article->save();

        ApiResponse::success("修改成功");
    }

    public function add()
    {
        return $this->fetch();
    }

    public function doAdd()
    {

        $title = $_POST['title'];
        $keyword = $_POST['keyword'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $md_content = $_POST['md_content'];

        if (empty($title) || empty($keyword) || empty($description) || empty($content) || empty($md_content)) {
            ApiResponse::error(-1, "参数错误");
        }

        $data = [
            'uuid' => time(),
            'title' => $title,
            'keyword' => $keyword,
            'description' => $description,
            'cover' => "",
            'content' => $content,
            'md_content' => $md_content,
            'gmt_create' => date('Y-m-d H:i:s'),
            'gmt_update' => date('Y-m-d H:i:s')
        ];

        $article = new \app\index\model\Article();
        $article->save($data);

        ApiResponse::success("新增成功");
    }

    public function delete()
    {
        $id = intval($_POST['id']);
        if (empty($id)) {
            ApiResponse::error(-1, "ID错误");
        }

        $article = \app\index\model\Article::get($id);
        if (empty($article)) {
            ApiResponse::error(-1, "稿件不存在");
        }
        $article['status'] = -1;
        $article->save();

        ApiResponse::success("删除成功");

    }

    public function online()
    {
        $id = intval($_POST['id']);
        $status = intval($_POST['status']);
        if (empty($id)) {
            ApiResponse::error(-1, "ID错误");
        }

        if (!in_array($status, [0, 1])) {
            ApiResponse::error(-1, "操作错误");
        }

        $article = \app\index\model\Article::get($id);
        if (empty($article)) {
            ApiResponse::error(-1, "稿件不存在");
        }
        $article['status'] = $status;
        $article->save();

        ApiResponse::success("操作成功");

    }
}
