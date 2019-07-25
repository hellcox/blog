<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/7/25
 * Time: 22:28
 */

namespace app\index\controller;

use QC;
use think\facade\Session;

require_once "../extend/lib/QQAuth/qqConnectAPI.php";

class Auth
{
    /**
     * 授权登录
     */
    public function auth()
    {
        $qc = new QC();
        $qc->qq_login();
    }

    /**
     * 授权回调
     */
    public function notify()
    {

        require_once "../extend/lib/QQAuth/qqConnectAPI.php";
        $qc = new QC();

        $openID = $qc->get_openid();
        $userInfo = $qc->get_user_info();
        if (empty($userInfo)) {
            die('<h3>QQ授权登录失败，请联系管理员！</h3>');
        }

        @Session::set('open_id',$openID);
        echo Session::get('open_id');

        echo  '<pre>';
        print_r($userInfo);

    }
}