<?php

namespace app\index\controller;

use think\Controller;

class Test extends Controller
{
    public function test()
    {
        // dump("test");
        // dump(session_save_path());

        // http://cms.iuxiao.com/tset/test

        header('X-Accel-Chareset: utf-8');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.time().'.zip');
        header('X-Archive-Files: zip');
        // echo "1a6349c5 24 /localhost/file1.txt file1.txt";

        $crc32 = "-";
        // printf("%s %d %s %s\n", $crc32, 140865, '/data/log/api.access.log', '1.log');
        // printf("%s %d %s %s\n", $crc32, 171144, '/data/log/cms.access.log', '2.log');
        printf("%s %d %s %s\n", $crc32, 74, 'down/33a7e45582d2776f1a929baf005c40f2b03ac2f7.png', 'a.png');
        printf("%s %d %s %s\n", $crc32, 74, 'down/33a7e45582d2776f1a929baf005c40f2b03ac2f7.png', 'b.png');
        // printf("%s %d %s %s\n", '-', 0, 'down/_0', '/');
        // printf("%s %d %s %s\n", $crc32, $size, $url, $path );

    }

    public function getFileSize($url)
    {
        $url = parse_url($url);
        if (!!$fp = @fsockopen($url['host'], empty($url['port']) ? 80 : $url['port'], $error)) {
            fputs($fp, "GET " . (empty($url['path']) ? '/' : $url['path']) . " HTTP/1.1\r\n");
            fputs($fp, "Host:$url[host]\r\n\r\n");
            while (!feof($fp)) {
                $tmp = fgets($fp);
                if (trim($tmp) == '') break;
                if (preg_match('/Content-Length:(.*)/si', $tmp, $arr)) return trim($arr[1]);
            }
            return null;
        } else {
            return null;
        }
    }
}
