<?php

class Model_Admin extends CI_Model
{
    // Data Barang
    public function getDataBarang()
    {
        return $this->db->get('tb_databarang')->result_array();
    }
    public function add_Barang()
    {
        $namabarang = $this->input->post('namabarang');
        $deskripsi = $this->input->post('deskripsi');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');
        $upload_barang = $_FILES['gambar']['name'];

        if ($upload_barang != null) {
            if ($upload_barang) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2548';
                $config['upload_path'] = 'assets/uploads';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }

                $this->db->set('namabarang', $namabarang);
                $this->db->set('deskripsi', $deskripsi);
                $this->db->set('stok', $stok);
                $this->db->set('harga', $harga);
                $this->db->insert('tb_databarang');
            }
        } else {
            echo $this->upload->display_errors();
        }
    }
    public function delete_barang($id)
    {
        $this->db->delete('tb_databarang', ['id' => $id]);
    }
    public function update_barang()
    {
        $namabarang = $this->input->post('namabarang');
        $deskripsi = $this->input->post('deskripsi');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');
        $id = $this->input->post('id');
        $upload_image = $_FILES['gambar']['name'];

        if ($upload_image != null) {
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2548';
                $config['upload_path'] = 'assets/uploads';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }

                $this->db->set('namabarang', $namabarang);
                $this->db->set('deskripsi', $deskripsi);
                $this->db->set('stok', $stok);
                $this->db->set('harga', $harga);
                $this->db->where('id', $id);
                $this->db->update('tb_databarang');
            }
        } else {
            $this->db->set('namabarang', $namabarang);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->set('stok', $stok);
            $this->db->set('harga', $harga);
            $this->db->where('id', $id);
            $this->db->update('tb_databarang');
        }
    }
    // and Data Barang
    // edit menu
    public function getEditMenu()
    {
        return $this->db->get('admin_menu')->result_array();
    }
    public function delete_menu($id)
    {
        $this->db->delete('admin_menu', ['id' => $id]);
    }
    // end edit menu
    // submenu
    public function getSubMenu()
    {
      $query =  " SELECT `admin_sub_menu`.*, `admin_menu`.`menu`
                  FROM  `admin_sub_menu` JOIN `admin_menu`
                  ON `admin_sub_menu`.`menu_id` = `admin_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
    // end subMenu

    // Role
    public function getDataRole()
    {
        return $this->db->get('user_role')->result_array();
    }
    public function RoleAccess($id)
    {
        return $this->db->get_where('user_role', ['role_id' => $id])->row_array();
    }
    // end role
}
