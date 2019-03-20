<?php
/**
 * User: long
 * Date: 2019/3/18
 * Time: 14:08
 */

namespace lib;

class ApiResponse
{

    public static function success($msg = "success", $data = "")
    {
        header('Content-Type:application/json; charset=utf-8');
        $res['code'] = 0;
        $res['msg'] = $msg;
        $res['data'] = $data;
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        exit;
    }

    public static function markdownUpload($code = 0,$msg = "success", $url = "")
    {
        header('Content-Type:application/json; charset=utf-8');
        $res['success'] = $code; // 0 1
        $res['message'] = $msg;
        $res['url'] = $url;
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        exit;
    }

    public static function error($code = -1, $msg = "success", $data = "")
    {
        header('Content-Type:application/json; charset=utf-8');
        $res['code'] = $code;
        $res['msg'] = $msg;
        $res['data'] = $data;
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        exit;
    }
}