<?php

namespace app\index\controller;

use lib\Tools;
use app\index\model\Article;
use think\Request;

class Index extends Base
{
    /**
     * 首页
     * @return mixed
     */
    public function index()
    {
        $artModel = new Article();
        $page = intval(input('page')) == 0 ? 1 : intval(input('page'));
        $conf['page'] = $page;
        $conf['size'] = 5;

        $list = $artModel->newList($conf);
        $data = $list->toArray();

        $this->data['data'] = $data['data'];
        $this->data['page'] = Tools::pager($data, '/new/');
        return $this->fetch('index', $this->data);
    }

    /**
     * 最新发布
     * @return mixed
     */
    public function new()
    {
        $artModel = new Article();
        $page = intval(input('page')) == 0 ? 1 : intval(input('page'));
        $conf['page'] = $page;
        $conf['size'] = 5;

        $list = $artModel->newList($conf);
        $data = $list->toArray();

        $this->data['data'] = $data['data'];
        $this->data['page'] = Tools::pager($data, '/new/');
        return $this->fetch('new', $this->data);
    }

    /**
     * 文章详情页
     * @return mixed
     */
    public function detail()
    {
        $id = intval(input('id'));
        $model = new Article();
        $data = $model->getOneByid($id);
        $model->addViews($id);

        $this->data['article'] = $data;
        $this->data['title'] = $data['title'] . " - 小豆豆博客";
        $this->data['keywords'] = $data['key_words'];
        $this->data['description'] = $data['desc'];
        return $this->fetch('detail', $this->data);
    }

    /**
     * 最近修改
     * @return mixed
     */
    public function update()
    {
        $artModel = new Article();
        $page = intval(input('page')) == 0 ? 1 : intval(input('page'));
        $conf['page'] = $page;
        $conf['size'] = 5;

        $list = $artModel->updateList($conf);
        $data = $list->toArray();

        $this->data['data'] = $data['data'];
        $this->data['page'] = Tools::pager($data, '/update/');
        return $this->fetch('update', $this->data);
    }

    /**
     * 关于作者
     * @return mixed
     */
    public function about()
    {
        $runtime = time() - 1533052800;
        $runStr = Tools::secondToDay($runtime);
        $this->data['runtime'] = $runStr;
        return $this->fetch('about', $this->data);
    }

    /**
     * 搜索一下
     * @return mixed
     */
    public function search()
    {
        $key = input('key');
        if (empty($key)) {
            $this->data['data'] = [];
        } else {
            $model = new Article();
            $conf['key'] = $key;
            $data = $model->searchList($conf);
            $this->data['data'] = $data;
        }
        $resData['key'] = $key;
        $this->data['key'] = $key;
        return $this->fetch('search', $this->data);
    }

    /**
     * 工具集合
     * @return mixed
     */
    public function tool()
    {
        return $this->fetch('tool', $this->data);
    }
}
