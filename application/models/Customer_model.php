<?php

class Customer_model extends CI_Model {
    public function get_by_account_id($account_id) {
        return $this->db->get_where('customer', ['account_id' => $account_id])->row();
    }

    public function insert($data) {
        return $this->db->insert('customer', $data);
    }
        
}