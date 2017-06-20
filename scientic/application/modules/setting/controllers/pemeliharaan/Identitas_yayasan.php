<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas_yayasan extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("pemeliharaan/M_Identitas_yayasan","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "pemeliharaan/identitas_yayasan/index";
    $this->load->view("parser_content",$data);
	}
	public function getIdentity()
	{
		$this->model->getIdentity();
	}
	public function save()
	{
		$this->model->save();
		$response["status"] = "success";
		$response["message"] = "Save Successfully";

		 $config['file_name']          = 'logo.png';
		 $config['overwrite']          = TRUE;
		 $config['upload_path']          = './assets/identitas_yayasan/';
		 $config['allowed_types']        = 'gif|jpg|png';
		 $config['max_size']             = 100;
		 $config['max_width']            = 1024;
		 $config['max_height']           = 768;

		 $this->load->library('upload', $config);
		 if($_FILES["Logo"]["name"]!="")
		 {
			 if ($this->upload->do_upload("Logo"))
			 {
				 	$data = $this->upload->data();
				 	$this->model->setImage();
					$response["status"] = "success";
					$response["message"] = "Change Image Successfully";
			 }
			 else
			 {
				 $response["status"] = "error";
				 $response["message"] = $this->upload->display_errors();
			 }
			}
		$this->M_API->JSON($response);
	}
	public function getKota()
	{
		if($this->input->post("kode_propinsi"))
		{
			$kode_kota = ($this->input->post("kode_kota"))?$this->input->post("kode_kota"):"00";
			$this->db->select("lokasi_kabupatenkota,lokasi_nama");
			$this->db->where("lokasi_propinsi",$this->input->post("kode_propinsi"));
			$this->db->where("lokasi_kecamatan","00");
			foreach($this->db->get("inf_lokasi")->result() as $row)
			{
				?>
				<option value="<?=$row->lokasi_kabupatenkota?>" <?=($row->lokasi_kabupatenkota==$kode_kota)?"selected":""?>><?=$row->lokasi_nama?></option>
				<?php
			}
			
		}
	}	
}
