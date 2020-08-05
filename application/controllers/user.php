<?php
    class User extends CI_Controller {
      // homempages
        public function index()
        {
          $data['crausel'] = $this->db->get_where('crausel', ['nama_gambar'])->row_array();
          $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

          $this->load->view('user/tamplat/header', $data);
          $this->load->view('user/tamplat/topbar', $data);
          $this->load->view('user/home', $data );
          $this->load->view('user/tamplat/footer', $data);
        }
        // end home

        // keranjang
        public function keranjang()
        {
          $data['title'] = 'Keranjang';
          $this->load->view('user/tamplat/header', $data);
          $this->load->view('user/tamplat/topbar', $data);
          $this->load->view('user/keranjang', $data );
          $this->load->view('user/tamplat/footer', $data);
        }
        // end keranjang
        // bantuan
        public function bantuan()
        {
          $data['title'] = 'Bantuan';
          $this->load->view('user/tamplat/header', $data);
          $this->load->view('user/tamplat/topbar', $data);
          $this->load->view('user/bantuan', $data );
          $this->load->view('user/tamplat/footer', $data);
        }
        // end bantuan
        // checkout
        public function checkout()
        {
          $data['title'] = 'Checkout';
          $this->load->view('user/tamplat/header', $data);
          $this->load->view('user/tamplat/topbar', $data);
          $this->load->view('user/checkout', $data );
          $this->load->view('user/tamplat/footer', $data);
        }
        // end checkout
    }
?>
