<?php
/**
 * User: long
 * Date: 2019/1/4
 * Time: 16:29
 */

namespace app\index\model;


use think\Model;

class Article extends Model
{
    protected $pk = 'id';

    public function listAll($params)
    {
        $list = $this->db()->where(['status' => 1])->order('id', 'desc')->paginate(10, true);
        return $list;
    }

    public function getByUuid($uuid){
        $article = $this->db()->where(['status'=>1,'uuid'=>$uuid])->limit(1);
        return $article;
    }

}