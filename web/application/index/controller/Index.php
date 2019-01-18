<?php

namespace app\index\controller;


use app\index\model\User;
use think\Controller;
use think\Db;
use think\facade\Config;
use think\facade\Env;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function test()
    {
        echo Config::get('default_lang');
        echo '<br>';
        echo Env::get('app_path');
    }

    /**
     * @route('sort')
     */
    public function sort()
    {
        echo '<pre>';
        $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        print_r($arr);
        shuffle($arr);
        print_r($arr);

    }

    /**
     * @route('adduser')
     */
    public function addUser()
    {

        $data = [
            'nick_name' => time(),
            'login_name' => time(),
            'password' => 'password',
            'age' => 20,
            'add_date' => date('Y-m-d H:i:s')
        ];
        $user = new User($data);
        $user->save();

        dump($user);
    }

    /**
     * @route('getuser')
     */
    public function getUser()
    {
        $id = 11;

        $user1 = User::get($id);
        dump($user1);

        $user2 = User::where(['id' => $id])->find();
        dump($user2);

        $user3 = Db::name('user')->where(['id' => $id])->find();
        dump($user3);
    }

    /**
     * @route('listuser')
     */
    public function listUser()
    {

        $users1 = User::all();
        dump($users1);

        $users2 = User::where('id', '>', 11)->where(['password' => 'password'])->select();
        dump($users2);
    }

    /**
     * @route('json')
     */
    public function json()
    {
        $arr = [1, 2, 3, 4, 5, 6];

        $data[] = 1;
        $data[] = 2;
        $data[] = 3;
        $data[] = 4;
        $data[] = 5;
        $data[] = 6;
        $data[] = $arr;

        echo json_encode($data);

    }

    /**
     * @route('view')
     */
    public function view()
    {
        return $this->fetch('test');
    }

    /**
     * @route('page')
     */
    public function page()
    {
        $list = User::where("age", 20)->paginate(10, false);
        $page = $list->render();

        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch();
    }

    /**
     * @route('editor')
     */
    public function editor()
    {
        return $this->fetch();
    }

    /**
     * @route('boot')
     */
    public function boot()
    {
        return $this->fetch();
    }

    /**
     * @route('detail')
     */
    public function detail()
    {
        return $this->fetch();
    }
}
