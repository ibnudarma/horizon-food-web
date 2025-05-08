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
    }

    public function index()
    {
        return redirect('customer/menu');
    }

    public function menu()
    {
        $data['title'] = 'Menu';
        $data['content'] = 'customer_menu';

        $this->load->view('template', $data);
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['content'] = 'customer_profile';
        $this->load->view('template', $data);
    }

    public function kantin()
    {
        $data['title'] = 'Kantin';
        $data['content'] = 'customer_kantin';
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