<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/3/18
 * Time: 21:55
 */

namespace app\index\controller;


use lib\Tools;
use think\App;
use think\Controller;

class Base extends Controller
{

    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $time = Tools::runTimes(time()-strtotime("2018-08-01"));
        $this->assign('runTimes',$time);
    }

    /**
     * 扩展加载视图 增加头部三要素
     * @param string $template
     * @param string $head
     * @return string
     * @throws \Exception
     */
    public function view($template = '', $head = '')
    {
        switch ($head) {
            case 'tools':
                $headData['title'] = config('tool_title');
                $headData['description'] = config('tool_desc');
                $headData['keyword'] = config('tool_keyword');
                break;
            default:
                $headData['title'] = config('home_title');
                $headData['description'] = config('home_desc');
                $headData['keyword'] = config('home_keyword');
        }
        $this->assign('head', $headData);

        return $this->view->fetch($template, [], []);
    }
}