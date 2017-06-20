<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Jenis_pengeluaran extends CI_Model{
  public function get_kas_kategori($kategori)
  {
    $this->db->where("kategori",$kategori);
    $this->db->select("kode as value,concat(kode,'-',nama) as label",false);
    return json_encode($this->db->get("rekakun")->result());
  }
}
