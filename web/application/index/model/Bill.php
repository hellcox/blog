<?php
/**
 * User: long
 * Date: 2019/1/4
 * Time: 16:29
 */

namespace app\index\model;


use lib\Date;
use think\Model;

class Bill extends Model
{
    protected $pk = 'id';

    public function listAll($params)
    {
        $list = $this->db()->order('gmt_create', 'desc')->all();
        return json_decode(json_encode($list), true);;
    }

    public function todayCount()
    {
        $count = $this->where('gmt_create', '>=', Date::dayStartDateTime())
            ->where('gmt_create', '<=', Date::dayEndDateTime())
            ->sum('money');
        return $count;
    }

    public function monthCount()
    {
        $count = $this->where('gmt_create', '>=', Date::dayStartDateTime(Date::monthStartDate()))
            ->where('gmt_create', '<=', Date::dayEndDateTime(Date::monthEndDate()))
            ->sum('money');
        return $count;
    }

    public function lastMonthCount()
    {
        $count = $this->where('gmt_create', '>=', Date::dayStartDateTime(Date::monthStartDate('-1')))
            ->where('gmt_create', '<=', Date::dayEndDateTime(Date::monthEndDate('-1')))
            ->sum('money');
        return $count;
    }

}