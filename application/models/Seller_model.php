<?php

class Seller_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('seller')->result_array();
    }

    public function get_by_id($id_seller) {
        return $this->db->get_where('seller', ['id_seller' => $id_seller])->row();
    }

    public function get_by_account_id($account_id) {
        return $this->db->get_where('seller', ['account_id' => $account_id])->row();
    }

    public function insert($data) {
        return $this->db->insert('seller', $data);
    }
    
}