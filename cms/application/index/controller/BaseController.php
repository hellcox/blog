<?php
/**
 * User: long
 * Date: 2019/1/21
 * Time: 13:54
 */

namespace app\index\controller;


use think\App;
use think\Controller;
use think\Session;

class BaseController extends Controller
{

    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $session = new Session();
        $user = $session->get('user');
        if (empty($user)) {
            header('location:' . url('account/login'));
            exit;
        }
    }

    public function json($code = 0, $msg = "success", $data = "")
    {
        header('Content-Type:application/json; charset=utf-8');

        $res['code'] = $code;
        $res['msg'] = $msg;
        $res['data'] = $data;

        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        exit;
    }

}