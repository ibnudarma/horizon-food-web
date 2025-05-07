<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('welcome');
    }

    public function sign_in() 
    {
        $this->load->view('sign_in');
    }

    public function sign_up()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $this->load->view('sign_up');
            
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('sign_up');
            }
        }
    }
    
}