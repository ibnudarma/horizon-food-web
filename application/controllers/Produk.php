<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        require_sign_in();
        is_role('seller');
        check_profile();
    }

    public function index()
    {

        $data['title'] = 'Produk';
        $data['content'] = 'seller_produk';

        $this->load->view('template', $data);
    }

}