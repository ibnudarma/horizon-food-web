<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        require_sign_in();
        is_role('customer');
        check_profile();
        $this->load->model('Customer_model');
        $this->load->model('Seller_model');
        $this->load->model('Menu_model');
    }

    public function index()
    {
        return redirect('customer/menu');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['content'] = 'customer_profile';
        $data['customer'] = $this->Customer_model->get_by_account_id($this->session->userdata('account_id'));

        $this->load->view('template', $data);
    }

    public function menu()
    {
        $data['title'] = 'Menu';
        $data['content'] = 'customer_menu';
        $data['menu'] = $this->Menu_model->customer_menu();
        // var_dump($data['menu']);
        // exit;

        $this->load->view('template', $data);
    }

    public function kantin()
    {
        $data['title'] = 'Kantin';
        $data['content'] = 'customer_kantin';
        $data['seller'] = $this->Seller_model->get_all();

        $this->load->view('template', $data);
    }

    public function kantin_detail($id_kantin)
    {
        $data['title'] = 'Detail Kantin';
        $data['content'] = 'customer_kantin_detail';
        $data['seller'] = $this->Seller_model->get_by_id($id_kantin);
        $data['menu'] = $this->Menu_model->get_all_by_seller($id_kantin);

        $this->load->view('template', $data);
    }

    public function keranjang()
    {
        $data['title'] = 'Keranjang';
        $data['content'] = 'customer_keranjang';
        $this->load->view('template', $data);
    }

    public function pesanan()
    {
        $data['title'] = 'Pesanan';
        $data['content'] = 'customer_pesanan';
        $this->load->view('template', $data);
    }

}