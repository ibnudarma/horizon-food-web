<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_pesanan_by_customer($customer_id)
    {
        $this->db->select('pesanan.*, seller.nama_kantin');
        $this->db->from('pesanan');
        $this->db->join('seller', 'seller.id_seller = pesanan.seller_id', 'left');
        $this->db->where('pesanan.customer_id', $customer_id);
        $this->db->order_by('pesanan.id_pesanan', 'DESC');

        return $this->db->get()->result_array();
    }

    public function get_pesanan_by_seller($seller_id)
    {
        $this->db->select('pesanan.*, customer.nama as nama_customer');
        $this->db->from('pesanan');
        $this->db->join('customer', 'customer.id_customer = pesanan.customer_id', 'left');
        $this->db->where('pesanan.seller_id', $seller_id);
        $this->db->order_by('pesanan.id_pesanan', 'DESC');

        return $this->db->get()->result_array();
    }

    public function get_pesanan_by_id($id_pesanan)
    {
        $this->db->select('pesanan.*, seller.nama_kantin, customer.nama as nama_customer, customer.no_hp as nomor_wa');
        $this->db->from('pesanan');
        $this->db->join('customer', 'customer.id_customer = pesanan.customer_id', 'left');
        $this->db->join('seller', 'seller.id_seller = pesanan.seller_id', 'left');
        $this->db->where('pesanan.id_pesanan', $id_pesanan);
        
        return $this->db->get()->row();
    }

    public function get_pesanan_detail($id_pesanan)
    {
        return $this->db->select('pesanan_detail.*, menu.nama_menu, menu.harga')
                ->from('pesanan_detail')
                ->join('menu','pesanan_detail.menu_id = menu.id_menu','left')
                ->where('pesanan_id',$id_pesanan)->get()->result_array();
    }

    public function approve_pesanan($id_pesanan)
    {
        $this->db->where('id_pesanan', $id_pesanan)
            ->update('pesanan', array('status' => 'selesai'));
    }

}
