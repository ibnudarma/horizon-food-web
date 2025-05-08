<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function check_sign_in() {
    $CI =& get_instance();
    return $CI->session->userdata('sign_in');
}

function check_role($role) {
    $CI =& get_instance();
    return $CI->session->userdata('role') === $role;
}

function require_sign_in() {
    if (!check_sign_in()) {
        redirect('app/sign_in');
        exit;
    }
}

function is_role($role) {
    if (!check_role($role)) {
        show_error("Access denied, you are not $role", 403);
    }
}

function check_profile() {
    $CI =& get_instance();
    $account_id = $CI->session->userdata("account_id");
    if($CI->session->userdata('role') === 'seller'){
        $CI->load->model('Seller_model');
    
        $profile = $CI->Seller_model->get_by_account_id($account_id);
    
        if (!$profile) {
            redirect('app/seller_form');
        }

    }elseif ($CI->session->userdata('role') === 'customer'){
        $CI->load->model('Customer_model');

        $profile = $CI->Customer_model->get_by_account_id($account_id);
    
        if (!$profile) {
            redirect('app/customer_form');
        }
    }
}


