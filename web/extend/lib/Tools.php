<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/24
 * Time: 5:23
 */

namespace lib;
class Tools
{
    public static function pager($data, $str = '')
    {
        return null;
    }

    public static function secondToDay($second)
    {
        return date("Y-m-d H:i:s", $second);
    }

    /**
     * 秒转时间
     * @param $time
     * @return string
     */
    public static function runTimes($time)
    {
        $value = array(
            "years" => 0, "days" => 0, "hours" => 0,
            "minutes" => 0, "seconds" => 0,
        );
        if ($time >= 31556926) {
            $value["years"] = floor($time / 31556926);
            $time = ($time % 31556926);
        }
        if ($time >= 86400) {
            $value["days"] = floor($time / 86400);
            $time = ($time % 86400);
        }
        if ($time >= 3600) {
            $value["hours"] = floor($time / 3600);
            $time = ($time % 3600);
        }
        if ($time >= 60) {
            $value["minutes"] = floor($time / 60);
            $time = ($time % 60);
        }
        $value["seconds"] = floor($time);
        $t = "{$value['years']}年{$value['days']}天{$value['hours']}小时{$value['minutes']}分{$value['minutes']}秒";
        Return $t;
    }
}