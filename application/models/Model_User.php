<?php

class Model_User extends CI_Model
{
    // crausel
    public function getCrausel()
    {
      $this->db->get('crausel', ['nama_gambar'])->row_array();
    }
    // end crause
}
