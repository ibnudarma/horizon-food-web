<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        require_sign_in();
        is_role('customer');
    }

    public function index()
    {
        return redirect('customer/dashboard');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'dashboard_customer';

        $this->load->view('template', $data);
    }
}