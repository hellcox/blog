<?php

namespace app\index\controller;


use app\index\model\Article;
use think\Controller;
use think\facade\Request;

class Index extends Controller
{

    public function index()
    {
        $article = new Article();
        $list = $article->listAll(null);
        $page = $list->render();

        $this->assign('list', $list);
        $this->assign('page', $page);
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

        $this->assign('article', $article);
        return $this->fetch();
    }

    public function tools()
    {
        return $this->fetch();
    }
}
