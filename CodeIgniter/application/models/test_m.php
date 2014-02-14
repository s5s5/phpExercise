<?php

class Test_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function user_insert($arr)
    {
        $this->db->insert('ci', $arr);
    }

    function user_update($id, $arr)
    {
        $this->db->where('uid', $id);
        $this->db->update('ci', $arr);
    }

    function user_del($id)
    {
        $this->db->where('uid', $id);
        $this->db->delete('ci');
    }

    function user_select($id)
    {
        $this->db->where('uid', $id);
        $this->db->select('*');
        $query = $this->db->get('ci');
        return $query->result();
    }

    function user_select2($uname)
    {
        $this->db->where('uname', $uname);
        $this->db->select('*');
        $query = $this->db->get('ci');
        return $query->result();
    }

    function user_select_all()
    {
        $this->db->select('*');
        $query = $this->db->get('ci');
        return $query->result();
    }

    function user_select_limit($start, $end)
    {
        $this->db->select('*');
        $this->db->limit($end, $start);
        $query = $this->db->get('ci');
        return $query->result();
    }

}

?>