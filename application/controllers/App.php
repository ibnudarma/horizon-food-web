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
            // Validasi email dan password
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
    
            if ($this->form_validation->run() === TRUE) {
                $email = $this->input->post('email', TRUE);
                $password = $this->input->post('password', TRUE);
    
                // Cek apakah email ada di database
                $user = $this->db->get_where('account', ['email' => $email])->row();
    
                if ($user && password_verify($password, $user->password)) {
                    // Set session data untuk login
                    $this->session->set_userdata(['user_id' => $user->id, 'email' => $user->email, 'role' => $user->role]);
    
                    // Pesan sukses
                    $this->session->set_flashdata('message', 'Login berhasil!');
                    redirect('app/dashboard');
                } else {
                    // Pesan error jika login gagal
                    $this->session->set_flashdata('error', 'Masukkan email atau password yang valid!');
                    $this->load->view('sign_in');
                }
            } else {
                // Pesan error jika validasi gagal
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

            // Validasi input
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[account.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
            $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[password]');
            $this->form_validation->set_rules('role', 'Jenis Akun', 'required');

            if ($this->form_validation->run() === TRUE) {
                // Ambil data dari form
                $email = $this->input->post('email', TRUE);
                $password = $this->input->post('password', TRUE);
                $role = $this->input->post('role', TRUE);

                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Data yang akan disimpan
                $data = [
                    'email' => $email,
                    'password' => $hashed_password,
                    'role' => $role
                ];

                // Simpan ke database
                $this->db->insert('account', $data);

                // Redirect atau tampilkan pesan sukses
                $this->session->set_flashdata('success', 'Selamat pendaftaran berhasil! silahkan masuk');
                redirect('app/sign_in');
            } else {
                // Jika validasi gagal, kembali ke form dengan error
                $this->load->view('sign_up');
            }
        }
    }

    public function dashboard()
    {
        $this->load->view('dashboard');
    }

}