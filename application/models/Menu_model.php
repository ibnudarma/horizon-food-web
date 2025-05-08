<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    protected $table = 'menu';

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function get_all_by_seller($seller_id) {
        return $this->db
            ->select('menu.*, category.category') // pilih semua dari menu + nama kategori
            ->from('menu')
            ->join('category', 'category.id_category = menu.category_id', 'left') // join dengan category
            ->where('menu.seller_id', $seller_id)
            ->get()
            ->result();
    }    

    public function get_by_id($id_menu) {
        return $this->db
            ->select('menu.*, category.category') // pilih semua dari menu + nama kategori
            ->from($this->table)
            ->join('category', 'category.id_category = menu.category_id', 'left')
            ->where('menu.id_menu', $id_menu)
            ->get()
            ->row();
    }
    

    public function update($id, $data) {
        return $this->db->where('id_menu', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('id_menu', $id)->delete($this->table);
    }
}
