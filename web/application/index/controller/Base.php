<?php
/**
 * Created by PhpStorm.
 * User: hellcox
 * Date: 2018/7/25
 * Time: 21:45
 */

namespace app\index\controller;


use think\Config;
use think\Controller;

class Base extends Controller
{
    public $data = [];

    public function _initialize()
    {
        $pti = trim($_SERVER['PATH_INFO'],'/');
        $path = explode('/',$pti);
        switch ($path[0]){
            case 'new':
                $this->data['title'] = '最近发布 - 小豆豆博客';
                $this->data['keywords'] = '小豆豆,博客,个人博客,小豆豆博客,程序,程序员';
                $this->data['description'] = '小豆豆博客！记录每一心动时刻！';
                break;
            case 'update':
                $this->data['title'] = '最近修改 - 小豆豆博客';
                $this->data['keywords'] = '小豆豆,博客,个人博客,小豆豆博客,程序,程序员';
                $this->data['description'] = '小豆豆博客！记录每一心动时刻！';
                break;
            case 'search':
                $this->data['title'] = '搜索一下 - 小豆豆博客';
                $this->data['keywords'] = '小豆豆,博客,个人博客,小豆豆博客,程序,程序员';
                $this->data['description'] = '小豆豆博客！记录每一心动时刻！';
                break;
            case 'tools':
                $this->data['title'] = '工具 - 小豆豆博客';
                $this->data['keywords'] = '小豆豆,博客,个人博客,小豆豆博客,程序,程序员';
                $this->data['description'] = '小豆豆博客！记录每一心动时刻！';
                break;
            case 'about':
                $this->data['title'] = '关于我 - 小豆豆博客';
                $this->data['keywords'] = '小豆豆,博客,个人博客,小豆豆博客,程序,程序员';
                $this->data['description'] = '小豆豆博客！记录每一心动时刻！';
                break;
            default:
                $this->data['title'] = '小豆豆博客 - 记录每一心动时刻!';
                $this->data['keywords'] = '小豆豆,博客,个人博客,小豆豆博客,程序,程序员';
                $this->data['description'] = '小豆豆博客！记录每一心动时刻！';
                break;
        }
    }

    public function returnJson($code = 0, $msg = 'success', $data = null)
    {
        header('Content-type:text/json');
        $rData['code'] = $code;
        $rData['msg'] = $msg;
        $rData['data'] = $data;
        echo json_encode($rData);
        exit();
    }
}