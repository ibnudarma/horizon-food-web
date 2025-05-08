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
        if ($this->input->method() === 'get') {
            $this->load->view('sign_in');
        } else {

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
    
            if ($this->form_validation->run() === TRUE) {
                $email = $this->input->post('email', TRUE);
                $password = $this->input->post('password', TRUE);

                $user = $this->db->get_where('account', ['email' => $email])->row();
    
                if ($user && password_verify($password, $user->password)) {

                    $this->session->set_userdata(['user_id' => $user->id, 'email' => $user->email, 'role' => $user->role]);

                    $this->session->set_flashdata('message', 'Login berhasil!');
                    redirect('app/dashboard');
                } else {

                    $this->session->set_flashdata('error', 'Masukkan email atau password yang valid!');
                    $this->load->view('sign_in');
                }
            } else {
  
                $this->session->set_flashdata('error', 'Masukkan email atau password yang valid!');
                $this->load->view('sign_in');
            }
        }
    }      
    
    public function sign_up()
    {
        if ($this->input->method() === 'get') {
            $this->load->view('sign_up');
        } elseif ($this->input->method() === 'post') {

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[account.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
            $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[password]');
            $this->form_validation->set_rules('role', 'Jenis Akun', 'required');

            if ($this->form_validation->run() === TRUE) {
                // Ambil data dari form
                $email = $this->input->post('email', TRUE);
                $password = $this->input->post('password', TRUE);
                $role = $this->input->post('role', TRUE);

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $data = [
                    'email' => $email,
                    'password' => $hashed_password,
                    'role' => $role
                ];

                $this->db->insert('account', $data);

                $this->session->set_flashdata('success', 'Selamat pendaftaran berhasil! silahkan masuk');
                redirect('app/sign_in');
            } else {
                
                $this->load->view('sign_up');
            }
        }
    }

    public function logout()
    {
    // Hapus semua data session
    $this->session->unset_userdata(['user_id', 'email', 'role']);
    $this->session->sess_destroy();

    // Set flashdata untuk notifikasi
    $this->session->set_flashdata('success', 'Anda telah logout.');

    // Redirect ke halaman login
    redirect('app/sign_in');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'dashboard_seller';

        $this->load->view('template', $data);
    }


}