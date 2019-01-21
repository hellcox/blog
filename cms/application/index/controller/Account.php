<?php
/**
 * User: long
 * Date: 2019/1/21
 * Time: 16:58
 */

namespace app\index\controller;


use think\Controller;
use think\Session;

class Account extends Controller
{
    public function login()
    {
        $session = new Session();
        $user = $session->get('user');
        if (!empty($user)) {
            header('location:' . url('index/index'));
            exit;
        }
        return $this->fetch();
    }

    public function doLogin()
    {

        $loginName = $_POST['login_name'];
        $password = $_POST['password'];

        $data['code'] = -1;
        $data['msg'] = '用户名或密码错误';

        if ($loginName == 'admin' && $password = '111111') {
            $session = new Session();
            $session->set('user', $loginName);
            $data['code'] = 0;
            $data['msg'] = '登录成功';
        }

        header('Content-Type:application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;

    }

    public function logout()
    {
        $session = new Session();
        $session->delete('user');
        header('location:' . url('account/login'));
    }
}