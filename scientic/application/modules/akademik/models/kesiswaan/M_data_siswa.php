<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Data_siswa extends CI_Model{
  /**
	 * create a newly created resource in storage.
	 *
	 * @return Response Json
	 */

	public $table = "siswa";
   public function save()
   {
      $update = array();
      foreach($_POST as $key=>$val)
      {
			$update[$key] = $this->input->post($key);
          //echo $key."<br/>";
      }
      if($_FILES["foto"]["name"]!="")
   		{
			$update["foto"] = $_POST["nis"].".jpg";
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
