<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('Admin/Tamplat/Header', $data);
        $this->load->view('Admin/Tamplat/Sidebar', $data);
        $this->load->view('Admin/Tamplat/Navbar', $data);
        $this->load->view('Admin/Index', $data);
        $this->load->view('Admin/Tamplat/footer', $data);
    }
    // AndDashboard

    // edit menu_id
    public function menu()
    {
      $data['title'] = 'Edit Menu';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['edit_menu'] = $this->Model_Admin->getEditMenu();
      $this->form_validation->set_rules('menu', 'Menu', 'required');
      if ($this->form_validation->run() == false) {
        $this->load->view('Admin/Tamplat/Header', $data);
        $this->load->view('Admin/Tamplat/Sidebar', $data);
        $this->load->view('Admin/Tamplat/Navbar', $data);
        $this->load->view('Admin/edit_menu', $data);
        $this->load->view('Admin/Tamplat/footer', $data);
      }else {
        $this->db->insert('admin_menu', ['menu' => $this->input->post('menu')]);
        $this->session->set_flashdata('flash', 'Ditambah');
        redirect('admin/menu');
      }
    }
    public function deleteMenu($id)
    {
        $this->Model_Admin->delete_menu($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Admin/menu');
    }
    // end edit menu
    // sub menu
    public function subMenu()
    {
      $data['title'] = 'Sub Menu';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['submenu'] = $this->Model_Admin->getSubMenu();
      $data['edit_menu'] = $this->Model_Admin->getEditMenu();

      $this->form_validation->set_rules('title', 'title', 'required');
      if ($this->form_validation->run() == false) {
        $this->load->view('Admin/Tamplat/Header', $data);
        $this->load->view('Admin/Tamplat/Sidebar', $data);
        $this->load->view('Admin/Tamplat/Navbar', $data);
        $this->load->view('Admin/subMenu', $data);
        $this->load->view('Admin/Tamplat/footer', $data);
      }else {
        $data = [
            'title'     => $this->input->post(title),
            'menu_id'   => $this->input->post(menu_id),
            'url'       => $this->input->post(url),
            'icon'      => $this->input->post(icon),
            'is_active' => $this->input->post(is_active)
        ];
        $this->db->insert('admin_sub_menu', $data);
        $this->session->set_flashdata('flash', 'Ditambah');
        redirect('Admin/subMenu');
      }
    }

    // end sub menu

    // DataBarang
    public function Data_Barang()
    {
        $data['title'] = 'Data Barang';
        $data['data_barang'] = $this->Model_Admin->getDataBarang();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('Admin/Tamplat/Header', $data);
        $this->load->view('Admin/Tamplat/Sidebar', $data);
        $this->load->view('Admin/Tamplat/Navbar', $data);
        $this->load->view('Admin/DataBarang', $data);
        $this->load->view('Admin/Tamplat/Footer', $data);
    }
    public function addBarang()
    {
        $this->Model_Admin->add_barang();
        $this->session->set_flashdata('flash', 'Ditambah');
        redirect('admin/Data_Barang');
    }
    public function deleteBarang($id)
    {
        $this->Model_Admin->delete_barang($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Admin/Data_Barang');
    }
    public function editbarang($id)
    {
        $data['editbarang'] = $this->db->get_where('tb_databarang', ['id' => $id])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Edit Barang";

        $this->load->view('Admin/Tamplat/Header', $data);
        $this->load->view('Admin/Tamplat/Sidebar', $data);
        $this->load->view('Admin/Tamplat/Navbar', $data);
        $this->load->view('Admin/editbarang', $data);
        $this->load->view('Admin/Tamplat/Footer', $data);
    }
    public function updatebarang()
    {
        $this->Model_Admin->update_barang();
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('admin/Data_Barang');
    }
    public function detailbarang($id)
    {
        $data['title'] = 'Detail Barang';
        $data['detailbarang'] = $this->db->get_where('tb_databarang', ['id' => $id])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('Admin/Tamplat/Header', $data);
        $this->load->view('Admin/Tamplat/Sidebar', $data);
        $this->load->view('Admin/Tamplat/Navbar', $data);
        $this->load->view('Admin/detailbarang', $data);
        $this->load->view('Admin/Tamplat/Footer', $data);
    }

    //AndDataBarang

    // role
    public function role()
    {
      $data['title'] = 'Role';
      $data['role'] = $this->Model_Admin->getDataRole();
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->view('Admin/Tamplat/Header', $data);
      $this->load->view('Admin/Tamplat/Sidebar', $data);
      $this->load->view('Admin/Tamplat/Navbar', $data);
      $this->load->view('Admin/Role', $data);
      $this->load->view('Admin/Tamplat/Footer', $data);
    }

    public function roleAccess($role_id)
    {
      $data['title'] = 'Role Access';
      $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->db->where('id !=' , 1);
      $data['menu'] = $this->db->get('admin_menu')->result_array();

      $this->load->view('Admin/Tamplat/Header', $data);
      $this->load->view('Admin/Tamplat/Sidebar', $data);
      $this->load->view('Admin/Tamplat/Navbar', $data);
      $this->load->view('Admin/roleAccess', $data);
      $this->load->view('Admin/Tamplat/Footer', $data);
    }

    public function changeAccess()
    {
      $menuId = $this->input->post('menuId');
      $roleId = $this->input->post('roleId');

      $data = [
        'role_id' => $role_id,
        'menu_id' => $menu_id
      ];

      $result = $this->db->get_where('admin_access_menu', $data);

      if ($result->num_rows() < 1) {
        $this->db->insert('admin_access_menu', $data);
      } else {
        $this->db->delete('admin_access_menu', $data);
      }
      $this->session->set_flashdata('flash', 'Berhasil');
    }
    // end role
    // edit profil
    public function editprofil()
    {
      $data['title'] = 'Edit Profile';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama tidak boleh kosong']);

      if ($this->form_validation->run() == false) {
      $this->load->view('Admin/Tamplat/Header', $data);
      $this->load->view('Admin/Tamplat/Sidebar', $data);
      $this->load->view('Admin/Tamplat/Navbar', $data);
      $this->load->view('Admin/editprofile', $data);
      $this->load->view('Admin/Tamplat/Footer', $data);
    } else {
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      // cek gambar
      $upload_gambar = $_FILES['gambar']['name'];
      if ($upload_gambar != null) {
          if ($upload_gambar) {
              $config['allowed_types'] = 'gif|jpg|png|jpeg';
              $config['max_size'] = '2548';
              $config['upload_path'] = './assets/img/profile/';

              $this->load->library('upload', $config);

              if ($this->upload->do_upload('gambar')) {
                  $old_gambar = $data['user']['gambar'];
                  if($old_gambar != 'default.jpg'){
                    unlink(FCPATH . 'assets/img/profile/'. $old_gambar);
                  }
                  $new_image = $this->upload->data('file_name');
                  $this->db->set('gambar', $new_image);
              } else {
                  echo $this->upload->display_errors();
              }

              $this->db->set('nama', $nama);
              $this->db->where('email', $email);
              $this->db->update('user');


              $this->session->set_flashdata('flash', 'Diubah');
              redirect('admin');
          }
      } else {
          echo $this->upload->display_errors();
      }

      }
    }
    // end edit profile

    // lupa password
    public function lupapassword()
    {
      $data['title'] = 'Ubah Password';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('passwordsaatini', 'PasswordSaatIni', 'required|trim', ['required' => 'Password tidak boleh kosong']);
        $this->form_validation->set_rules('passwordbaru1', 'passwordbaru', 'required|trim|min_length[6]|matches[passwordbaru2]', [
  				'required' => 'passwoard tidak boleh kosong',
  				'matches' => 'passwoard tidak sama',
  				'min_length' => 'paswoard minimal 6'
  			]);
        $this->form_validation->set_rules('passwordbaru2', 'password', 'required|trim|matches[passwordbaru1]', [
  				'required' => 'passwoard tidak boleh kosong',
          'matches' => 'passwoard tidak sama'
  			]);

      if ($this->form_validation->run() == false) {
      $this->load->view('Admin/Tamplat/Header', $data);
      $this->load->view('Admin/Tamplat/Sidebar', $data);
      $this->load->view('Admin/Tamplat/Navbar', $data);
      $this->load->view('Admin/lupapassword', $data);
      $this->load->view('Admin/Tamplat/Footer', $data);
    }else {
      $passwordsaatini = $this->input->post('passwordsaatini');
      $new_password = $this->input->post('passwordbaru1');
      if (!password_verify($passwordsaatini, $data['user']['password'])) {
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Password Saat Ini salah!</div>' );
        redirect('admin/lupapassword');
      } else {
        if ($passwordsaatini == $new_password) {
          $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Password Baru Tidak Boleh Sama Dengan Password Lama!</div>' );
          redirect('admin/lupapassword');
        }else {
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('user');

          $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"> Password Berhasil Diubah!</div>' );
          redirect('admin/lupapassword');
        }

      }
      }
    }
    // end lupa passsword
    // crausel
    public function crausel()
    {
      $data['title'] = 'Data Barang';
      $data['crausel'] = $this->Model_Admin->getCrausel();
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->view('Admin/Tamplat/Header', $data);
      $this->load->view('Admin/Tamplat/Sidebar', $data);
      $this->load->view('Admin/Tamplat/Navbar', $data);
      $this->load->view('Admin/DataBarang', $data);
      $this->load->view('Admin/Tamplat/Footer', $data);
    }
    // end crausel

}
