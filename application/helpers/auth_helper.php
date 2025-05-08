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
