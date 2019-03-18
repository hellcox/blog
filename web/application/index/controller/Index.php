<?php

namespace app\index\controller;


use app\index\model\Article;
use think\Controller;
use think\facade\Request;

class Index extends Base
{

    public function index()
    {
        $article = new Article();
        $list = $article->listAll(null);
        $page = $list->render();

        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->view('home');
    }

    public function detail()
    {
        $id = Request::param('uuid');
        if (empty($id)) {
            $id = intval($_GET['id']);
        }
        $article = Article::get(['uuid' => $id, 'status' => 1]);
        $this->assign('article', $article);

        // 浏览量+1
        $article['views'] = $article['views'] + 1;
        $article->save();

        $head['title'] = $article['title'].'-小豆豆博客';
        $head['description'] = $article['description'];
        $head['keyword'] = $article['keyword'];
        $this->assign('head', $head);
        return $this->fetch();
    }

    public function tools()
    {
        return $this->view('tools','tools');
    }
}
