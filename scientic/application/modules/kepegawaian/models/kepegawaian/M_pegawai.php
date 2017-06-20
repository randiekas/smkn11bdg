<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Pegawai extends CI_Model{
  /**
	 * create a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	 public $table = "pegawai";
   public function save()
   {
      $update = array();
      foreach($_POST as $key=>$val)
      {
        $update[$key] = $this->input->post($key);
      }

      if($_POST["replid"]!="")
      {
        $this->db->where("replid",$_POST["replid"]);
        $this->db->update($this->table,$update);
      }
      else{
        $this->db->insert($this->table,$update);
      }
   }
}
