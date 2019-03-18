<?php

namespace app\index\controller;


use app\index\model\User;
use lib\ApiResponse;
use OSS\OssClient;
use think\Controller;
use think\Db;
use think\facade\Config;
use think\facade\Env;
use think\Image;

class Upload extends BaseController
{
    /**
     * 图片上传
     * @return string
     * @throws \OSS\Core\OssException
     */
    public function ossImage()
    {
        // 获取到上传的文件
        $file = request()->file('file');
        $image = Image::open($file);
        $fileSize = ceil($file->getInfo()['size'] / 1027);
        if ($fileSize > 5 * 1024) {
            ApiResponse::error(-1, "图片不能大于5M", ['fileSize' => $fileSize]);
        }
        // 执行上传
        try {
            //获取Oss的配置
            $config = Config::pull('aliyunOss');
            //实例化对象 将配置传入
            $ossClient = new OssClient($config['keyId'], $config['keySecret'], $config['endpoint']);
            // 获取文件后缀
            $type = $image->type() == 'jpeg' ? 'jpg' : $image->type();
            // 这里是有sha1加密 生成文件名 之后连接上后缀
            $fileName = sha1(date('YmdHis', time()) . uniqid()) . '.' . $type;
            // oss存储KEY
            $ossFileKey = "image/" . date("Y/m/d/") . $fileName;
            //执行阿里云上传
            $result = $ossClient->uploadFile($config['bucket'], $ossFileKey, $file->getInfo()['tmp_name']);
            // 返回数据
            $arr = [
                'ossUrl' => $result['info']['url'],
                'fileName' => $fileName,
                'fileUrl' => $config['httpUrl'] . "/" . $ossFileKey,
            ];
            ApiResponse::success("上传成功", $arr);
        } catch (OssException $e) {
            ApiResponse::error(-1, $e->getMessage());
        }
    }

    /**
     * 图片上传-markdown编辑器
     * @return string
     * @throws \OSS\Core\OssException
     */
    public function ossImageMarkdown()
    {
        // 获取到上传的文件
        $file = request()->file('editormd-image-file');
        $image = Image::open($file);
        $fileSize = ceil($file->getInfo()['size'] / 1027);
        if ($fileSize > 5 * 1024) {
            ApiResponse::error(-1, "图片不能大于5M", ['fileSize' => $fileSize]);
        }
        // 执行上传
        try {
            //获取Oss的配置
            $config = Config::pull('aliyunOss');
            //实例化对象 将配置传入
            $ossClient = new OssClient($config['keyId'], $config['keySecret'], $config['endpoint']);
            // 获取文件后缀
            $type = $image->type() == 'jpeg' ? 'jpg' : $image->type();
            // 这里是有sha1加密 生成文件名 之后连接上后缀
            $fileName = sha1(date('YmdHis', time()) . uniqid()) . '.' . $type;
            // oss存储KEY
            $ossFileKey = "image/" . date("Y/m/d/") . $fileName;
            //执行阿里云上传
            $result = $ossClient->uploadFile($config['bucket'], $ossFileKey, $file->getInfo()['tmp_name']);
            // 返回数据
            $arr = [
                'ossUrl' => $result['info']['url'],
                'fileName' => $fileName,
                'fileUrl' => $config['httpUrl'] . "/" . $ossFileKey,
            ];
            ApiResponse::markdownUpload(1, "上传成功", $arr['fileUrl']);
        } catch (OssException $e) {
            ApiResponse::markdownUpload(0, $e->getMessage());
        }
    }
}
