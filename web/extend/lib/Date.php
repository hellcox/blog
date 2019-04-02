<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/4/2
 * Time: 21:37
 */

namespace lib;


class Date
{
    static $formatDate = 'Y-m-d';
    static $formatDatetime = 'Y-m-d H:i:s';

    static function monthStartDate($num = null)
    {
        if ($num != null) {
            $startDate = date('Y-m-01', strtotime(date("Y-m-d") . "{$num} month"));
        } else {
            $startDate = date('Y-m-01', strtotime(date("Y-m-d")));
        }
        return $startDate;
    }

    static function monthEndDate($num = null)
    {
        if ($num != null) {
            $startDate = date('Y-m-01', strtotime(date("Y-m-d") . "{$num} month"));
        } else {
            $startDate = date('Y-m-01', strtotime(date("Y-m-d")));
        }
        $endDate = date('Y-m-d', strtotime("$startDate +1 month -1 day"));
        return $endDate;
    }

    static function weekStartDate()
    {
        return date('Y-m-d', (time() - ((date('w') == 0 ? 7 : date('w')) - 1) * 24 * 3600));
    }

    static function weekEndDate()
    {
        return date('Y-m-d', (time() + (7 - (date('w') == 0 ? 7 : date('w'))) * 24 * 3600));
    }

    static function dayStartDateTime($date = null)
    {
        if (!empty($date)) {
            return date('Y-m-d H:i:s', strtotime($date));
        }
        return date('Y-m-d H:i:s', strtotime(date("Y-m-d")));
    }

    static function dayEndDateTime($date = null)
    {
        if (!empty($date)) {
            $date = date('Y-m-d', strtotime($date)) . ' 23:59:59';
            return date('Y-m-d H:i:s', strtotime($date));
        }
        return date('Y-m-d H:i:s', strtotime(date("Y-m-d") . ' 23:59:59'));
    }
}