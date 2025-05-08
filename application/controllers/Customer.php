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
        return redirect('customer/home');
    }

    public function home()
    {
        $data['title'] = 'Home';
        $data['content'] = 'customer_home';

        $this->load->view('template', $data);
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['content'] = 'customer_profile';
        $this->load->view('template', $data);
    }

}