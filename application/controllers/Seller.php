<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        require_sign_in();
        is_role('seller');
    }

    public function index()
    {
        return redirect('seller/dashboard');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'dashboard_seller';

        $this->load->view('template', $data);
    }

}