<?php

namespace app\index\model;

use think\Db;
use think\Model;

class Article extends Model
{
    protected $pk = 'art_id';

    // 获取列表
    public function newList($conf)
    {
        $pageConf['page'] = $conf['page'];

        $this->field('art_id,title,desc,key_words,content,atime,utime');
        $this->where('status', 0);
        $this->order('atime desc');
        $query = $this->paginate($conf['size'],false,$pageConf);
        return $query;
    }

    public function updateList($conf)
    {
        $pageConf['page'] = $conf['page'];
        $this->field('art_id,title,desc,key_words,content,atime,utime');
        $this->where('status', 0);
        $this->order('utime desc');
        $query = $this->paginate($conf['size'],false,$pageConf);
        return $query;
    }

    public function getOneByid($id)
    {
        $res = $this->field('art_id,title,desc,key_words,content,views,atime,utime')
            ->where('status', 0)
            ->where('art_id', $id)
            ->find();
        return $res->toArray();
    }


    public function searchList($conf)
    {
        $this->field('art_id,title,desc,key_words,content,atime,utime');
        $this->where('status', 0);
        $this->where(["title" => ["like", "%{$conf['key']}%"]]);
        $this->order('atime desc');
        $query = $this->select();
        return $query->toArray();
    }

    public function addViews($id)
    {
        return $this->where('art_id', $id)->setInc('views',1);

    }
}