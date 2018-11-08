<?php

class Base extends CI_Controller
{
    public $data = null;

    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION['sys_user'])) {
            redirect('login');
        }
    }

    /**
     * 检测是否登录
     * @return bool
     */
    protected function isLogin()
    {
        return !empty($_SESSION['sys_user']);
    }

    /**
     * 返回视图
     * @param null $view 视图
     * @param null $data 返回数据
     * @param bool $flag 是否启用复杂头
     */
    protected function view($view = null, $data = null, $flag = true)
    {
        if ($flag) {
            // 复杂头
            empty($data) ? "" : $this->load->view("public/data", $data);
            $this->load->view("public/header");
            empty($view) ? '' : $this->load->view($view);
            $this->load->view("public/footer");
        } else {
            // 简单头
            empty($data) ? "" : $this->load->view("public/data", $data);
            $this->load->view("public/header");
            empty($view) ? '' : $this->load->view($view);
            $this->load->view("public/footer");
        }
    }
}