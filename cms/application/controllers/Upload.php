<?php
/**
 * User: hellcox
 * Date: 2018/6/1
 * Time: 20:54
 */

class Upload extends Base
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 上传所有文件到缓存目录
     */
    public function file()
    {
        $tempDir = 'temp/' . date('Y/m/d', time());
        $dir = FILE_DIR . $tempDir;
        $fileUrl = FILE_URL . $tempDir;
        Tool::createDirs($dir);
        $config['upload_path'] = $dir;
        $config['allowed_types'] = '*';
        $config['max_size'] = 100000000;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            Tool::json(-1, 'error', $error);
        } else {
            $dat = array('upload_data' => $this->upload->data());
            $data['file_url'] = $fileUrl . '/' . $dat['upload_data']['file_name'];
            Tool::json(0, null, $data);
        }
    }

    /**
     * 上传文章内容中的图片 - 只用于editor.md插件中的图片上传
     */
    public function md_image()
    {
        $tempDir = 'image/' . date('Y/m/d', time());
        $dir = FILE_DIR . $tempDir;
        $fileUrl = FILE_URL . $tempDir;
        Tool::createDirs($dir);
        $config['upload_path'] = $dir;
        $config['allowed_types'] = '*';
        $config['max_size'] = 100000000;
        $config['max_width'] = 102400;
        $config['max_height'] = 76800;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('editormd-image-file')) {
            $error = array('error' => $this->upload->display_errors());
            $data['success'] = 0;
            $data['message'] = '上传失败';
            echo json_encode($data);
            exit();
        } else {
            $dat = array('upload_data' => $this->upload->data());
            $data['url'] = $fileUrl . '/' . $dat['upload_data']['file_name'];
            $data['success'] = 1;
            $data['message'] = '上传成功';
            echo json_encode($data);
            exit();
        }
    }
}