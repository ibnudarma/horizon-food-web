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
            if(check_sign_in() == true) {
                if(check_role('seller')){
                    redirect('seller');
                }elseif(check_role('customer')){
                    redirect('customer');
                }
            }else{
                $this->load->view('sign_in');
            }
        } else {

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
    
            if ($this->form_validation->run() === TRUE) {
                $email = $this->input->post('email', TRUE);
                $password = $this->input->post('password', TRUE);

                $user = $this->db->get_where('account', ['email' => $email])->row();
    
                if ($user && password_verify($password, $user->password)) {

                    $this->session->set_userdata([
                        'user_id' => $user->id_account, 
                        'email' => $user->email, 
                        'role' => $user->role,
                        'sign_in' => true
                    ]);

                    $this->session->set_flashdata('message', 'Login berhasil!');
                    
                    if($user->role === "seller") {

                        redirect('seller');
            
                    }elseif($user->role === "customer") {
            
                        redirect('customer');
            
                    }else {
                        
                        redirect('app/sign_in');
                    }

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
    $this->session->unset_userdata(['user_id', 'email', 'role','sign_in']);
    $this->session->sess_destroy();

    // Set flashdata untuk notifikasi
    $this->session->set_flashdata('success', 'Anda telah logout.');

    // Redirect ke halaman login
    redirect('app/sign_in');
    }

    public function seller_form()
    {
        $data['title'] = 'Profile';
        $data['content'] = 'form_seller';
        
        $this->load->view('template', $data);
    }

    public function customer_form()
    {
        $data['title'] = 'Profile';
        $data['content'] = 'form_customer';
        
        $this->load->view('template', $data);
    }

    public function seller_add() {
        $this->load->model('Seller_model');
        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation', 'upload']);
    
        $user_id = $this->session->userdata('user_id');
    
        // Aturan validasi form
        $this->form_validation->set_rules('nama_kantin', 'Nama Kantin', 'required');
        $this->form_validation->set_rules('nama', 'Nama Pemilik Kantin', 'required');
        $this->form_validation->set_rules('deskripsi_kantin', 'Deskripsi Kantin', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('seller'); // atau sesuaikan dengan halaman form kamu
        }
    
        // Konfigurasi upload
        $config['upload_path']   = './uploads/seller_logo/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']      = 2048;
        $config['file_name']     = 'logo_' . time();
    
        $this->upload->initialize($config);
    
        $logo = null;
        if (!empty($_FILES['logo_kantin']['name'])) {
            if ($this->upload->do_upload('logo_kantin')) {
                $upload_data = $this->upload->data();
                $logo = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('seller');
            }
        }
    
        // Simpan ke database
        $data = [
            'account_id'       => $user_id,
            'nama_kantin'      => $this->input->post('nama_kantin'),
            'nama'             => $this->input->post('nama'),
            'deskripsi_kantin' => $this->input->post('deskripsi_kantin'),
            'logo_kantin'      => $logo
        ];
    
        $this->Seller_model->insert($data);
    
        $this->session->set_flashdata('success', 'Profil berhasil dilengkapi.');
        redirect('seller'); // ubah ke halaman yang sesuai
    }

    public function customer_add()
    {

    }

    public function profile()
    {
        if(check_role('seller')){
            redirect('seller/profile');
        }elseif (check_role('customer')){
            redirect('customer/profile');
        }
    }

}