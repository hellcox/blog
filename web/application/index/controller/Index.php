<?php

namespace app\index\controller;


use app\index\model\Article;
use think\Controller;

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

    /**
     * 测试方法
     */
    public function test()
    {
        echo "test";
        echo "<br><a href='" . url('/') . "'>home</a>";
    }

    /**
     * 最新列表
     */
    public function latest()
    {
        echo 1;
    }


    public function detail()
    {
        $id = intval($_GET['id']);
        $article = Article::get($id);
        $this->assign('article', $article);
        return $this->fetch();
    }
}
