<?php
/**
 * User: hellcox
 * Date: 2018/6/7
 * Time: 22:29
 */

class Login extends CI_Controller
{
    public function index()
    {
        if(!empty($_SESSION['sys_user'])){
            redirect(base_url());
        }
        $this->load->view('login');
    }

    public function doLogin()
    {
        $userName = $this->input->post('user_name');
        $password = $this->input->post('password');
        $arr['user_name'] = $userName;
        $arr['password'] = $password;

        if ($userName == 'admin' && $password == '111111') {
            $_SESSION['sys_user'] = $arr;
            Tool::json(0,'登录成功',$arr);
        }else{
            Tool::json(1000,'用户名或密码错误',$arr);
        }
    }

    public function logout(){
        $_SESSION['sys_user'] = null;
        redirect('login');
    }
}