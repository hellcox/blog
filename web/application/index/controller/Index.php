<?php

namespace app\index\controller;


use app\index\model\Article;
use think\Controller;
use think\facade\Request;

class Index extends Controller
{

    public function index()
    {
        echo config('idx_title');
        $head['title'] = config('home_title');
        $head['description'] = config('home_desc');
        $head['keyword'] = config('home_keyword');

        $article = new Article();
        $list = $article->listAll(null);
        $page = $list->render();

        $this->assign('list', $list);
        $this->assign('page', $page);
        $this->assign('head', $head);
        return $this->fetch('home');
    }

    public function test()
    {
        echo "test";
        echo "<br><a href='" . url('/') . "'>home</a>";
        return $this->fetch('detailBak');
    }

    public function detail()
    {
        $id = Request::param('uuid');
        if (empty($id)) {
            $id = intval($_GET['id']);
        }
        $article = Article::get(['uuid' => $id, 'status' => 1]);

        // 浏览量+1
        $article['views'] = $article['views'] + 1;
        $article->save();

        $head['title'] = $article['title'].'-小豆豆博客';
        $head['description'] = $article['description'];
        $head['keyword'] = $article['keyword'];
        $this->assign('head', $head);

        $this->assign('article', $article);
        return $this->fetch();
    }

    public function tools()
    {
        $head['title'] = config('tool_title');
        $head['description'] = config('tool_desc');
        $head['keyword'] = config('tool_keyword');
        $this->assign('head', $head);
        return $this->fetch();
    }
}
