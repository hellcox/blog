<?php
/**
 * User: hellcox
 * Date: 2018/6/2
 * Time: 16:10
 */

class MY_Model extends CI_Model
{
    public $table;
    public $primary_key;

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getOne($id)
    {
        $query = $this->db->select("*")->from($this->table)->where($this->primary_key,$id)->get();
        $row = $query->row_array();
        return $row;
    }
}