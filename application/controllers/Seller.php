<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        require_sign_in();
        is_role('seller');
        check_profile();
        $this->load->model('Seller_model');
        $this->load->model('Category_model');
        $this->load->model('Menu_model');
        $this->load->model('Pesanan_model');
    }

    public function index()
    {
        return redirect('seller/dashboard');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'seller_dashboard';

        $this->load->view('template', $data);
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['content'] = 'seller_profile';
        $data['seller'] = $this->Seller_model->get_by_account_id($this->session->userdata('account_id'));
        
        $this->load->view('template', $data);
    }

    public function menu()
    {
        $data['title'] = 'Menu';
        $data['content'] = 'seller_menu';
        $data['menu'] = $this->Menu_model->get_all_by_seller($this->session->userdata('seller_id'));

        $this->load->view('template', $data);
    }

    public function menu_add()
    {
        if ($this->input->method() === 'get') {

            $data['title'] = 'Tambah Menu';
            $data['content'] = 'seller_menu_add';
            $data['category'] = $this->Category_model->get_all();
    
            $this->load->view('template', $data);

        }elseif ($this->input->method() === 'post') {

            $nama_menu = $this->input->post('nama_menu', TRUE);
            $harga = $this->input->post('harga', TRUE);
            $deskripsi_menu = $this->input->post('deskripsi_menu', TRUE);
            $category_id = $this->input->post('category_id', TRUE);

            if (empty($nama_menu) || empty($harga) || empty($category_id)) {
                $this->session->set_flashdata('error', 'Semua field wajib diisi.');
                redirect('seller/menu_add');
            }

            $config['upload_path']   = './uploads/menu/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048;
            $config['file_name']     = 'menu_' . time();
        
            $this->upload->initialize($config);

            $gambar = null;

            if (!empty($_FILES['gambar']['name'])) {
                if ($this->upload->do_upload('gambar')) {
                    $upload_data = $this->upload->data();
                    $gambar = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('seller/menu_add');
                }
            }

            $data = [
                'seller_id'     => $this->session->userdata('seller_id'),
                'nama_menu'     => $nama_menu,
                'harga'         => $harga,
                'deskripsi_menu'=> $deskripsi_menu,
                'category_id'   => $category_id,
                'gambar'        => $gambar
            ];
        
            $this->Menu_model->insert($data);
        
            $this->session->set_flashdata('success', 'Menu berhasil ditambahkan.');
            redirect('seller/menu');
        }
    }

    public function menu_detail($id_menu)
    {
        $data['title'] = 'Detail Menu';
        $data['content'] = 'seller_menu_detail';
        $data['menu'] = $this->Menu_model->get_by_id($id_menu);
        $data['category'] = $this->Category_model->get_all();

        $this->load->view('template', $data);
    }

    public function menu_update($id)
    {
        $menu = $this->Menu_model->get_by_id($id);

        if (!$menu || $menu->seller_id != $this->session->userdata('seller_id')) {
            $this->session->set_flashdata('error', 'Menu tidak ditemukan atau Anda tidak memiliki akses.');
            redirect('seller/menu_detail/'.$id);
        }

        if ($this->input->method() === 'post') {

            $nama_menu = $this->input->post('nama_menu', TRUE);
            $harga = $this->input->post('harga', TRUE);
            $deskripsi_menu = $this->input->post('deskripsi_menu', TRUE);
            $category_id = $this->input->post('category_id', TRUE);

            if (empty($nama_menu) || empty($harga) || empty($category_id)) {
                $this->session->set_flashdata('error', 'Semua field wajib diisi.');
                redirect('seller/menu_detail/' . $id);
            }

            $config['upload_path']   = './uploads/menu/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048;
            $config['file_name']     = 'menu_' . time();

            $this->upload->initialize($config);

            $gambar = $menu->gambar;

            if (!empty($_FILES['gambar']['name'])) {
                if ($this->upload->do_upload('gambar')) {
                    // Hapus gambar lama jika ada
                    if ($gambar && file_exists('./uploads/menu/' . $gambar)) {
                        unlink('./uploads/menu/' . $gambar);
                    }

                    $upload_data = $this->upload->data();
                    $gambar = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('seller/menu_detail/' . $id);
                }
            }

            $data = [
                'nama_menu'     => $nama_menu,
                'harga'         => $harga,
                'deskripsi_menu'=> $deskripsi_menu,
                'category_id'   => $category_id,
                'gambar'        => $gambar
            ];

            $this->Menu_model->update($id, $data);

            $this->session->set_flashdata('success', 'Menu berhasil diperbarui.');
            redirect('seller/menu_detail/'.$id);
        }else{
            redirect('seller/menu_detail/'.$id);
        }
    }


    public function menu_delete($id_menu)
    {
        $this->Menu_model->delete($id_menu);
        $this->session->set_flashdata('notif_menu_delete','Berhasil hapus menu');
        redirect('seller/menu');
    }

    public function pesanan()
    {
        $data['title'] = 'Pesanan';
        $data['content'] = 'seller_pesanan';
        $data['pesanan'] = $this->Pesanan_model->get_pesanan_by_seller($this->session->userdata('seller_id'));
  
        $this->load->view('template', $data);
    }

    public function pesanan_detail($id_pesanan)
    {
        $data['title'] = 'Pesanan';
        $data['content'] = 'seller_pesanan_detail';
        $data['pesanan'] = $this->Pesanan_model->get_pesanan_by_id($id_pesanan);
        $data['pesanan_detail'] = $this->Pesanan_model->get_pesanan_detail($id_pesanan);

        $this->load->view('template', $data);
    }

    public function pesanan_ready($id_pesanan)
    {
        $this->Pesanan_model->approve_pesanan($id_pesanan);
        redirect('seller/pesanan');
    }

}