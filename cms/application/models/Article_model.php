<?php
/**
 * User: hellcox
 * Date: 2018/6/2
 * Time: 16:38
 */

class Article_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "article";
        $this->primary_key = "art_id";
    }

    public function getRows($data)
    {
        $page = $data['page'];
        $pageSize = $data['page_size'];
        $this->db->select('*');
        $this->db->from($this->table);
        empty($data['where']) ? "" : $this->db->where($data['where']);
        $this->db->order_by('art_id desc');
        $this->db->limit($pageSize, $pageSize * ($page - 1));
        $query = $this->db->get();
        $rows = $query->result_array();

        empty($data['where']) ? "" : $this->db->where($data['where']);
        $this->db->from($this->table);
        $total = $this->db->count_all_results();
        // echo $this->db->last_query();
        return ['rows' => $rows, 'total' => $total];
    }

    public function update($data, $condition)
    {
        $bool = $this->db->update($this->table, $data, $condition);
        // echo $this->db->last_query();
        return $bool;
    }
}