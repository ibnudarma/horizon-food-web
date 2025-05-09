<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang_model extends CI_Model {

    protected $table = 'keranjang';

    public function __construct() {
        parent::__construct();
    }

    public function get_keranjang_customer($customer_id){
        return $this->db->select('keranjang.*, menu.*')
        ->from($this->table)
        ->join('menu', 'menu.id_menu = keranjang.menu_id', 'left')
        ->where('customer_id', $customer_id)
        ->get()
        ->result_array();
    }

    public function insert($data){
        $this->db->insert($this->table, $data);
    }

    public function delete($id_keranjang){
        $this->db->where('id_keranjang', $id_keranjang)->delete($this->table);
    }

}