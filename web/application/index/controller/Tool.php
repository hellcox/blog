<?php
/**
 * Created by PhpStorm.
 * User: hellcox
 * Date: 2018/7/21
 * Time: 22:48
 */

namespace app\index\controller;

use lib\Curl;
use lib\Tools;

class Tool extends Base
{
    public function ip()
    {
        return $this->fetch('ip');
    }

    public function ipAction()
    {
        $url = "http://ip.taobao.com/service/getIpInfo.php";
        $ip = $_REQUEST['ip'];
        $res = Curl::curl($url . "?ip={$ip}");
        Tools::returnJson($res, false);
    }

    public function timestamp()
    {
        $now = time();
        $resDate['nowTime'] = time();
        $resDate['nowDate'] = date('Y-m-d H:i:s', $now);
        return $this->fetch('timestamp', $resDate);
    }

    public function timeToDate()
    {
        $time = intval($_GET['time']);
        $date = date('Y-m-d H:i:s', $time);
        $data['code'] = 0;
        $data['data']['date'] = $date;
        Tools::returnJson($data);
    }

    public function dateToTime()
    {
        $date = trim($_GET['date']);
        $time = strtotime($date);
        $data['code'] = 0;
        $data['data']['time'] = intval($time);
        Tools::returnJson($data);
    }

    public function mi()
    {
        return $this->fetch('mi');
    }

    public function miRun()
    {
        $type = $_REQUEST['type'];
        $name = $_REQUEST['name'];
        $input = $_REQUEST['input'];

        $data['code'] = 0;
        $content = '';
        if ($type == 'decode') {
            // 解密
            switch ($name) {
                case 'md5':
                    $this->returnJson(-1, "暂不支持MD5解密");
                    break;
                case 'base64':
                    $content = base64_decode($input);
                    break;
                case 'url':
                    $content = urldecode($input);
                    break;
                default:
                    $this->returnJson(-1, "类型错误");
            }
        } else if ($type == 'encode') {
            // 加密
            if ($name == 'md5') {
                $content = md5($input);
            } else if ($name == 'base64') {
                $content = base64_encode($input);
            }
            switch ($name) {
                case 'md5':
                    $content = md5($input);
                    break;
                case 'base64':
                    $content = base64_encode($input);
                    break;
                case 'url':
                    $content = urlencode($input);
                    break;
                default:
                    $this->returnJson(-1, "类型错误");
            }
        } else {
            $this->returnJson(-1, "类型错误");
        }
        $this->returnJson(0, "成功", ['content' => $content]);
    }
}