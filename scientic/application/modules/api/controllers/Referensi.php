<?php
require(APPPATH.'/libraries/api/REST_Controller.php');
class Referensi extends REST_Controller {
 
 
	/*
    function user_get()
    {
        $data = array('returned: ada'. $this->get('id')." s ".$this->get('ids'));
        $this->response($data);
    }
    */ 
    function get_post()
    {       
	 
		 
			$result["status"] = "error";
			$result["message"] = "Parameter kurang lengkap, Gunakan Parameter {ref_grup:kode_refgrup}";
		 
        $this->response($result);
    }
	function provinsi_post()
	{
		$this->db->select("lokasi_propinsi,lokasi_nama");
		$this->db->where("lokasi_kabupatenkota","00");
		$result = $this->db->get("inf_lokasi")->result();
		$this->response($result);
	}
	function kota_post()
	{
		$this->db->select("lokasi_kabupatenkota,lokasi_nama");
		$this->db->where("lokasi_propinsi",$this->input->post("lokasi_propinsi"));
		$this->db->where("lokasi_kecamatan","00");
		$result = $this->db->get("inf_lokasi")->result();
		
		$this->response($result);
	}
	function fakultas_post()
    {
		$this->db->group_by("kd_fakultas");
		$result =  $this->db->get("fakultasprodi")->result();
        $this->response($result);
    }
	function programstudi_post()
    {
		$this->db->where("kd_fakultas",$this->input->post("kd_fakultas"));
		$result =  $this->db->get("fakultasprodi")->result();
        $this->response($result);
    }
	function gelombang_post()
    {
		$this->db->select("kegiatan,kode");
		$this->db->where("aktif","A");
		$result =  $this->db->get("kalenderakademik")->result();
        $this->response($result);
    }
}