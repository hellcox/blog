<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Base
{
    public function index()
    {
        $this->view("home/index");
    }

    public function view2()
    {
        $this->load->view('welcome_message');
    }
}
