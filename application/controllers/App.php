<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {
        $this->load->view('sign_in');
    }

    public function sign_up()
    {
        $this->load->view('sign_up');
    }
}