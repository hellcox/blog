<?php
/**
 * User: long
 * Date: 2019/3/18
 * Time: 17:03
 */

namespace app\index\controller;


use lib\ApiResponse;
use lib\Date;
use think\App;

class Tool extends Base
{

    public function __construct(App $app = null)
    {
        parent::__construct($app);
    }

    /**
     * 时间戳首页
     * @return string
     * @throws \Exception
     */
    public function timestamp(){
        $now = time();
        $data['now'] = $now;
        $data['nowDate'] = date('Y-m-d H:i:s',$now);
        $this->assign('data',$data);
        return $this->view('tool/timestamp','tools');
    }

    /**
     * 时间日期转换
     */
    public function changeTime(){
        $type = $_REQUEST['type'];
        $value = $_REQUEST['value'];
        if($type==1){
            $target = date('Y-m-d H:i:s',intval($value));
            ApiResponse::success("success",$target);
        }

        if($type==2){
            $target = intval(strtotime($value));
            ApiResponse::success("success",$target);
        }
    }

    public function md5(){
        return $this->view('tool/md5','tools');
    }

    public function encodeMd5(){
        $type = $_REQUEST['type'];
        $value = $_REQUEST['value'];
        $data['bit32'] = md5($value);
        $data['bigbit32'] = strtoupper($data['bit32']);
        $data['bit16'] = substr($data['bit32'], 8, 16);
        $data['bigbit16'] = substr($data['bigbit32'], 8, 16);
        ApiResponse::success("success",$data);
    }

    public function bill(){
        $bill = new \app\index\model\Bill();
        $list = $bill->listAll(null);
        $this->assign('list', $list);
        $this->assign('todayCount',$bill->todayCount());
        $this->assign('monthCount',$bill->monthCount());
        $this->assign('lastMonthCount',$bill->lastMonthCount());
        return $this->view('tool/bill','tools');
    }

    public function addBill(){
        $data['money'] = $_POST['money'];
        $data['type'] = $_POST['type'];
        $data['gmt_create'] = $_POST['dateTime'];
        $data['content'] = $_POST['content'];

        if($data['money']<=0){
            ApiResponse::error(-1,"金额错误");
        }

        $bill = new \app\index\model\Bill();
        $bill->save($data);

        ApiResponse::success("success");
    }

    public function ttt(){
        header('X-Accel-Chareset: utf-8');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=test.zip');
        header('X-Archive-Files: zip');

        $crc32 = "-";
        printf("%s %d %s %s\n", $crc32, 488909, '/down/a.png', 'a.png');
        // printf("%s %d %s %s\n", $crc32, 171144, '/data/log/cms.access.log', '2.log');
        // printf("%s %d %s %s\n", $crc32, 74, 'down/33a7e45582d2776f1a929baf005c40f2b03ac2f7.png', 'a.png');
        // printf("%s %d %s %s\n", $crc32, 74, 'down/33a7e45582d2776f1a929baf005c40f2b03ac2f7.png', 'b.png');
    }
}