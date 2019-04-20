<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model {

    public function auth($username,$password)
    {
        return $this->db->get_where('user', array('username' => trim($username), 'password' => trim($password)));
    }

    public function auth_user($password)
    {
        return $this->db->get_where('meja', array('id_meja' => trim($password)));
    }

    public function getAll($table_name)
    {
        return $this->db->get($table_name)->result_array();
    }

    public function getWhere($table_name,$field,$id)
    {
        return $this->db->get_where($table_name, array($field => trim($id)))->row_array();
    }

    public function getWheree($table_name,$field1,$id1,$field2,$id2)
    {
        return $this->db->get_where($table_name, array($field1 => trim($id1),$field2 => trim($id2)))->row_array();
    }

    public function getWhereStatus($table_name,$field,$id)
    {
        return $this->db->get_where($table_name, array($field => trim($id)))->result_array();
    }

    public function deletee($id)
    {
        return $this->db->query("DELETE FROM orders WHERE status_order = 0 AND no_meja = $id");
    }

    public function save($table_name,$data)
    {
        return $this->db->insert($table_name,$data);
    }

    public function delete($field,$id,$table_name)
    {
        $this->db->where($field,$id);
        return $this->db->delete($table_name);
    }

    public function update($field,$id,$table_name,$data)
    {
        $this->db->where($field,$id);
        return $this->db->update($table_name,$data);
    }

    public function hari()
    {
        return $this->db->query("SELECT * FROM transaksi WHERE DAY(tanggal) = DAY(now())")->result_array();
    }

    public function sum_totalbayar()
    {
        return $this->db->query("SELECT SUM(total_bayar) FROM transaksi");
    }

    // public function mejarusak()
    // {
    //     return $this->db->query("SELECT * FROM meja WHERE status_meja")
    // }

}

/* End of file M_crud.php */
