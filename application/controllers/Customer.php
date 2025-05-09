<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        require_sign_in();
        is_role('customer');
        check_profile();
        $this->load->model('Customer_model');
        $this->load->model('Seller_model');
        $this->load->model('Keranjang_model');
        $this->load->model('Menu_model');
        $this->load->model('Pesanan_model');
    }

    public function index()
    {
        return redirect('customer/menu');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['content'] = 'customer_profile';
        $data['customer'] = $this->Customer_model->get_by_account_id($this->session->userdata('account_id'));

        $this->load->view('template', $data);
    }

    public function menu()
    {
        $data['title'] = 'Menu';
        $data['content'] = 'customer_menu';
        $data['menu'] = $this->Menu_model->customer_menu();

        $this->load->view('template', $data);
    }

    public function menu_detail($id_menu)
    {
        $data['title'] = 'Detail Menu';
        $data['content'] = 'customer_menu_detail';
        $data['menu'] = $this->Menu_model->get_by_id($id_menu);

        $this->load->view('template', $data);
    }

    public function kantin()
    {
        $data['title'] = 'Kantin';
        $data['content'] = 'customer_kantin';
        $data['seller'] = $this->Seller_model->get_all();

        $this->load->view('template', $data);
    }

    public function kantin_detail($id_kantin)
    {
        $data['title'] = 'Detail Kantin';
        $data['content'] = 'customer_kantin_detail';
        $data['seller'] = $this->Seller_model->get_by_id($id_kantin);
        $data['menu'] = $this->Menu_model->get_all_by_seller($id_kantin);

        $this->load->view('template', $data);
    }

    public function keranjang_add()
    {
        if ($this->input->method() === 'post') {
            $menu_id = $this->input->post('menu_id');
            $jumlah  = $this->input->post('jumlah');
            $catatan  = $this->input->post('catatan');
            $customer_id = $this->session->userdata('customer_id');
    
            $menu = $this->db->get_where('menu', ['id_menu' => $menu_id])->row();
            if (!$menu) {
                $this->session->set_flashdata('error', 'Menu tidak ditemukan.');
                return redirect($_SERVER['HTTP_REFERER']);
            }
    
            $keranjang = $this->db->get_where('keranjang', ['customer_id' => $customer_id])->result();
    
            if (!empty($keranjang)) {
                $first_menu = $this->db->get_where('menu', ['id_menu' => $keranjang[0]->menu_id])->row();
                if ($first_menu && $first_menu->seller_id != $menu->seller_id) {
                    $this->session->set_flashdata('error', 'Keranjang hanya bisa berisi menu dari satu kantin. Silakan checkout terlebih dahulu.');
                    return redirect('customer/keranjang');
                }
            }
    
            $existing = $this->db->get_where('keranjang', [
                'customer_id' => $customer_id,
                'menu_id' => $menu_id
            ])->row();
    
            if ($existing) {

                $new_jumlah = $existing->jumlah + $jumlah;
                $this->db->where('id_keranjang', $existing->id_keranjang)
                         ->update('keranjang', ['jumlah' => $new_jumlah]);
            } else {

                $data = [
                    'customer_id' => $customer_id,
                    'menu_id'     => $menu_id,
                    'jumlah'      => $jumlah,
                    'catatan'      => $catatan,
                    'seller_id'   => $menu->seller_id
                ];
                $this->Keranjang_model->insert($data);
            }
    
            $this->session->set_flashdata('success', 'Menu berhasil ditambahkan ke keranjang.');
            redirect('customer/keranjang');
        }
    }      

    public function keranjang()
    {
        $data['title'] = 'Keranjang';
        $data['content'] = 'customer_keranjang';
        $data['keranjang'] = $this->Keranjang_model->get_keranjang_customer($this->session->userdata('customer_id'));

        $this->load->view('template', $data);
    }

    public function keranjang_delete($id_keranjang)
    {
        $this->Keranjang_model->delete($id_keranjang);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function checkout()
    {
        $customer_id = $this->session->userdata('customer_id');
    
        // Ambil keranjang
        $keranjang = $this->db->get_where('keranjang', ['customer_id' => $customer_id])->result();
        if (empty($keranjang)) {
            $this->session->set_flashdata('error', 'Keranjang kosong.');
            redirect('customer/keranjang');
            return;
        }
    
        // Ambil seller_id dari salah satu item di keranjang
        $seller_id = $keranjang[0]->seller_id ?? null;
    
        // Hitung total harga
        $total = 0;
        foreach ($keranjang as $item) {
            $menu = $this->db->get_where('menu', ['id_menu' => $item->menu_id])->row();
            if ($menu) {
                $total += $menu->harga * $item->jumlah;
            }
        }
    
        if (!$seller_id || $total <= 0) {
            $this->session->set_flashdata('error', 'Checkout gagal. Data tidak valid.');
            redirect('customer/keranjang');
            return;
        }
    
        // Simpan pesanan
        $data = [
            'customer_id' => $customer_id,
            'seller_id'   => $seller_id,
            'total'       => $total,
        ];

        $this->db->insert('pesanan', $data);

        $pesanan_id = $this->db->insert_id();
    
        // Simpan detail pesanan
        foreach ($keranjang as $item) {
            $this->db->insert('pesanan_detail', [
                'pesanan_id' => $pesanan_id,
                'menu_id'    => $item->menu_id,
                'jumlah'     => $item->jumlah,
                'catatan'    => $item->catatan ?? ''
            ]);
        }
    
        // Kosongkan keranjang
        $this->db->delete('keranjang', ['customer_id' => $customer_id]);
    
        $this->session->set_flashdata('success', 'Checkout berhasil. Silakan lakukan pembayaran.');
        redirect('customer/pesanan');
    }
    
    public function pesanan()
    {
        $data['title'] = 'Pesanan';
        $data['content'] = 'customer_pesanan';
        $data['pesanan'] = $this->Pesanan_model->get_pesanan_by_customer($this->session->userdata('customer_id'));
  
        $this->load->view('template', $data);
    }
    
    public function pesanan_detail($id_pesanan)
    {
        $data['title'] = 'Pesanan Detail';
        $data['content'] = 'customer_pesanan_detail';
        $data['pesanan'] = $this->Pesanan_model->get_pesanan_by_id($id_pesanan);
        $data['pesanan_detail'] = $this->Pesanan_model->get_pesanan_detail($id_pesanan);
        
        $this->load->view('template', $data);
    }

}