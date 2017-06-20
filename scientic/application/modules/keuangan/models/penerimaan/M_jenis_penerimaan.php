<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Jenis_penerimaan extends CI_Model{
  /**
	 * create a newly created resource in storage.
	 *
	 * @return Response Json
	 */

  public function get_kas_kategori($kategori)
  {
    $this->db->where("kategori",$kategori);
    $this->db->select("kode as value,concat(kode,'-',nama) as label",false);
    return json_encode($this->db->get("rekakun")->result());
  }
}
