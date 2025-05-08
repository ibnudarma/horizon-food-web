<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Produk';
        $data['content'] = 'produk_seller';

        $this->load->view('template', $data);
    }

}