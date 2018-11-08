<?php
/**
 * User: hellcox
 * Date: 2018/5/31
 * Time: 21:32
 */

class Article extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
    }

    // 文章列表
    public function index()
    {
        $data['page'] = empty($_GET['page']) ? 1 : $_GET['page'];
        $data['page_size'] = empty($_GET['page_size']) ? 1000 : $_GET['page_size'];
        $data['where'] = 'status=0';
        $modelData = $this->article_model->getRows($data);
        $res['rows'] = $modelData['rows'];
        $res['total'] = $modelData['total'];
        $this->view('article/index', $res);
    }

    public function add()
    {

        // 提交文章
        if ($this->input->is_ajax_request()) {
            $now = time();
            $data['title'] = $this->input->post('title');
            $data['desc'] = $this->input->post('desc');
            $data['key_words'] = $this->input->post('key');
            $data['cover'] = Tool::moveTempFile($this->input->post('cover'),'image/');
            $data['markdown_content'] = $this->input->post('content');
            $data['content'] = $this->input->post('html');
            $data['atime'] = $now;
            $data['utime'] = $now;

            // 验参
            if (empty($data['title'])) {
                Tool::json(-1, '标题不能为空');
            }
            if (empty($data['desc'])) {
                Tool::json(-1, '简介不能为空');
            }
            if (empty($data['key_words'])) {
                Tool::json(-1, '关键词不能为空');
            }
            if (empty($data['markdown_content'])) {
                Tool::json(-1, '内容不能为空');
            }
            if (empty($data['content'])) {
                Tool::json(-1, 'HTML内容不能为空');
            }

            $id = $this->article_model->insert($data);
            $data['id'] = $id;
            Tool::json(0, null, $data);
        }
        $this->view('article/add');
    }

    public function edit()
    {
        // 提交文章
        if ($this->input->is_ajax_request()) {
            $now = time();
            $artId = $this->input->post('id');
            if(intval($artId)==0){
                Tool::json(-1,'文章错误');
            }
            $data['title'] = $this->input->post('title');
            $data['desc'] = $this->input->post('desc');
            $data['key_words'] = $this->input->post('key');
            $data['cover'] = Tool::moveTempFile($this->input->post('cover'),'image/');
            $data['markdown_content'] = $this->input->post('content');
            $data['content'] = $this->input->post('html');
            $data['utime'] = $now;

            // 验参
            if (empty($data['title'])) {
                Tool::json(-1, '标题不能为空');
            }
            if (empty($data['desc'])) {
                Tool::json(-1, '简介不能为空');
            }
            if (empty($data['key_words'])) {
                Tool::json(-1, '关键词不能为空');
            }
            if (empty($data['markdown_content'])) {
                Tool::json(-1, '内容不能为空');
            }
            if (empty($data['content'])) {
                Tool::json(-1, 'HTML内容不能为空');
            }

            $condition['art_id'] = $artId;
            $bool = $this->article_model->update($data,$condition);
            Tool::json(0, null, $bool);
        }
        // 获取当前文章信息
        $artId = $this->uri->segment(3);
        $article = $this->article_model->getOne($artId);
        $res['article'] = $article;
        $this->view('article/edit', $res);
    }

    public function delete()
    {
        // 提交文章
        if ($this->input->is_ajax_request()) {
            $artId = $this->input->post('id');
            if(intval($artId)==0){
                Tool::json(-1,'文章ID错误');
            }

            $condition['art_id'] = $artId;
            $data['status'] = 1;
            $bool = $this->article_model->update($data,$condition);
            Tool::json(0, null, $bool);
        }
    }

    public function detail()
    {
        // 获取当前文章信息
        $artId = $this->uri->segment(3);
        $article = $this->article_model->getOne($artId);
        $res['article'] = $article;
        $this->view('article/detail', $res);
    }
}