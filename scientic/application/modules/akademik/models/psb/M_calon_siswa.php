<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Calon_siswa extends CI_Model{
  /**
	 * create a newly created resource in storage.
	 *
	 * @return Response Json
	 */

	public $table = "calonsiswa";
   public function save()
   {
      $update = array();
		$response["status"] = "success";
		$response["message"] = "Save Successfully";
      foreach($_POST as $key=>$val)
      {
        $update[$key] = $this->input->post($key);
      }
      if($_FILES["foto"]["name"]!="")
   		 {
         $update["foto"] = $_POST["nopendaftaran"].".jpg";
       }
      if($_POST["replid"]!="")
      {
        $this->db->where("replid",$_POST["replid"]);
        $this->db->update($this->table,$update);
      }
      else{
		 $this->db->select("replid");
		 $this->db->where("nopendaftaran",$this->input->post("nopendaftaran"));
		if($this->db->get("calonsiswa")->num_rows()==0) 
		{
			$this->db->insert($this->table,$update);
		}else{
			$response["status"] = "error";
			$response["message"] = "Nomor pendaftaran sudah digunakan, silahkan gunakan nomor pendaftaran lain.";
		}
        
      }
	  return $response;
   }
}
