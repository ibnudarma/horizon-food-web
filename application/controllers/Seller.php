<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        require_sign_in();
        is_role('seller');
        check_profile();
        $this->load->model('Seller_model');
    }

    public function index()
    {
        return redirect('seller/dashboard');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'seller_dashboard';

        $this->load->view('template', $data);
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['content'] = 'seller_profile';
        $this->load->view('template', $data);
    }

    public function menu()
    {
        $data['title'] = 'Produk';
        $data['content'] = 'seller_menu';

        $this->load->view('template', $data);
    }

    public function pesanan()
    {
        $data['title'] = 'Pesanan';
        $data['content'] = 'seller_pesanan';

        $this->load->view('template', $data);
    }

}