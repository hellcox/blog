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
}