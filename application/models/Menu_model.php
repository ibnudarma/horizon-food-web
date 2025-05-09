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
            ->select('menu.*, category.category')
            ->from('menu')
            ->join('category', 'category.id_category = menu.category_id', 'left')
            ->where('menu.seller_id', $seller_id)
            ->get()
            ->result_array();
    }    

    public function get_by_id($id_menu) {
        return $this->db
            ->select('menu.*, category.category')
            ->from($this->table)
            ->join('category', 'category.id_category = menu.category_id', 'left')
            ->where('menu.id_menu', $id_menu)
            ->get()
            ->row();
    }
    

    public function update($id, $data) {
        return $this->db->where('id_menu', $id)->update($this->table, $data);
    }

    public function delete($id_menu) {

        $menu = $this->get_by_id($id_menu); 
    
        if ($menu) {

            if (!empty($menu->gambar)) {
                $gambar_path = FCPATH . 'uploads/menu/' . $menu->gambar;
                if (file_exists($gambar_path)) {
                    unlink($gambar_path);
                }
            }

            return $this->db->where('id_menu', $id_menu)->delete($this->table);
        }
    
        return false;
    }

    public function customer_menu() 
    {
        $this->db->select('
            menu.*, 
            seller.nama AS seller_nama, 
            seller.nama_kantin, 
            seller.logo_kantin, 
            category.category AS nama_kategori
        ');
        $this->db->from('menu');
        $this->db->join('seller', 'seller.id_seller = menu.seller_id');
        $this->db->join('category', 'category.id_category = menu.category_id');
        $query = $this->db->get();
    
        return $query->result_array(); // Mengembalikan array data menu + seller + kategori
    }
      
    
}
