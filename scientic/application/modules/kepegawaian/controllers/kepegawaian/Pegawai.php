<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("kepegawaian/M_pegawai","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("kepegawaian/kepegawaian/pegawai/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		//$data["content"] = "kepegawaian/pegawai/index";
		$data["content"] = "kepegawaian/kepegawaian/pegawai/index";
		$this->load->view("parser_content",$data);
	}
	/**
	 * Display Json Data from table
	 *
	 *
	 *
	 * @return Response Json
	 */
	public function grid_data()
	{	
		$result = $this->db->get("pegawai")->result();
		$this->M_API->JSON($result);
	}
	/**
	 * Display Json Data from table
	 *
	 *
	 *
	 * @return Response Json
	 */
	public function getGolongan()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("peggol")->result();
		$this->M_API->JSON($result);
	}
	public function saveGolongan()
	{	
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("peggol",$input);
		}else{
			$this->db->insert("peggol",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteGolongan()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("peggol");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	
	
	
	
	public function getJabatan()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegjab")->result();
		$this->M_API->JSON($result);
	}
	public function saveJabatan()
	{	
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegjab",$input);
		}else{
			$this->db->insert("pegjab",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteJabatan()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegjab");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	
	
	
	public function getGaji()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("peggaji")->result();
		$this->M_API->JSON($result);
	}
	public function saveGaji()
	{	
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("peggaji",$input);
		}else{
			$this->db->insert("peggaji",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteGaji()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("peggaji");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	
	/////
	
	public function getDiklat()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegdiklat")->result();
		$this->M_API->JSON($result);
	}
	public function saveDiklat()
	{	
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegdiklat",$input);
		}else{
			$this->db->insert("pegdiklat",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteDiklat()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegdiklat");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	//
	
	public function getSekolah()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegsekolah")->result();
		$this->M_API->JSON($result);
	}
	public function saveSekolah()
	{	
		if(!is_numeric($_POST["masih"]))
			{
				$_POST["masih"] = ($_POST["masih"]=="true")?1:0;
			}
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegsekolah",$input);
		}else{
			$this->db->insert("pegsekolah",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteSekolah()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegsekolah");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	
	//
	
	public function getSertifikasi()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegserti")->result();
		$this->M_API->JSON($result);
	}
	public function saveSertifikasi()
	{	
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegserti",$input);
		}else{
			$this->db->insert("pegserti",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteSertifikasi()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegserti");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	//
	
	public function getPekerjaan()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegkerja")->result();
		$this->M_API->JSON($result);
	}
	public function savePekerjaan()
	{	
		
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegkerja",$input);
		}else{
			$this->db->insert("pegkerja",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deletePekerjaan()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegkerja");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	// new mulai
	
	public function getKeluarga()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegkeluarga")->result();
		$this->M_API->JSON($result);
	}
	public function saveKeluarga()
	{	
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegkeluarga",$input);
		}else{
			$this->db->insert("pegkeluarga",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteKeluarga()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegkeluarga");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	
	
	public function getBeasiswa()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegbeasiswa")->result();
		$this->M_API->JSON($result);
	}
	public function saveBeasiswa()
	{	
		if(!is_numeric($_POST["masihmenerima"]))
		{
			$_POST["masihmenerima"] = ($_POST["masihmenerima"]=="true")?1:0;
		}
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegbeasiswa",$input);
		}else{
			$this->db->insert("pegbeasiswa",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteBeasiswa()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegbeasiswa");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function getBuku()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegbuku")->result();
		$this->M_API->JSON($result);
	}
	public function saveBuku()
	{	
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegbuku",$input);
		}else{
			$this->db->insert("pegbuku",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteBuku()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegbuku");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	
	public function getKaryatulis()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegkaryatulis")->result();
		$this->M_API->JSON($result);
	}
	public function saveKaryatulis()
	{	
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegkaryatulis",$input);
		}else{
			$this->db->insert("pegkaryatulis",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteKaryatulis()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegkaryatulis");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	
	public function getKesejahteraan()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegkesejahteraan")->result();
		$this->M_API->JSON($result);
	}
	public function saveKesejahteraan()
	{	
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegkesejahteraan",$input);
		}else{
			$this->db->insert("pegkesejahteraan",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteKesejahteraan()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegkesejahteraan");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function getTunjangan()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegtunjangan")->result();
		$this->M_API->JSON($result);
	}
	public function saveTunjangan()
	{	
		if(!is_numeric($_POST["aktif"]))
		{
			$_POST["aktif"] = ($_POST["aktif"]=="true")?1:0;
		}
		
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegtunjangan",$input);
		}else{
			$this->db->insert("pegtunjangan",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteTunjangan()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegtunjangan");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	
	public function getTugas()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegtugastambahan")->result();
		$this->M_API->JSON($result);
	}
	public function saveTugas()
	{	
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegtugastambahan",$input);
		}else{
			$this->db->insert("pegtugastambahan",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteTugas()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegtugastambahan");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function getInpasing()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("peginpasing")->result();
		$this->M_API->JSON($result);
	}
	public function saveInpasing()
	{	
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("peginpasing",$input);
		}else{
			$this->db->insert("peginpasing",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteInpasing()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("peginpasing");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	
	public function getPenghargaan()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegpenghargaan")->result();
		$this->M_API->JSON($result);
	}
	public function savePenghargaan()
	{	
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegpenghargaan",$input);
		}else{
			$this->db->insert("pegpenghargaan",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deletePenghargaan()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegpenghargaan");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	
	public function getNilai()
	{	
		$this->db->where("nip",$this->input->post("nip"));
		$result = $this->db->get("pegnilaites")->result();
		$this->M_API->JSON($result);
	}
	public function saveNilai()
	{	
		foreach($_POST as $key=>$val)
		{
			if($key!="uid")
			{
				$input[$key] = $val;
			}
		}
		
			
		if(isset($input["replid"]))
		{
			$this->db->where("replid",$input["replid"]);
			$this->db->update("pegnilaites",$input);
		}else{
			$this->db->insert("pegnilaites",$input);
		}
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function deleteNilai()
	{
		$this->db->where("replid",$this->input->post("id"));
		$this->db->delete("pegnilaites");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	/** end mulai
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
			//
			$this->M_jqxgrid->update();
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
			//
			$this->M_jqxgrid->delete();
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	public function store()
	{
		$this->M_jqxgrid->create();
	}
	public function save()
	{
		//jangan dihapus
		$_POST["tgllahir"] = date("Y-m-d", strtotime($_POST["tgllahir"]));
		//end jangan dihapus;
		$this->model->save();
		$response["status"] = "success";
		$response["message"] = "Save Successfully";

		 $config['file_name']          = $_POST["nip"].'.jpg';
		 $config['overwrite']          = TRUE;
		 $config['upload_path']          = './assets/pegawai/'.$_POST["nip"]."/";
		 $config['allowed_types']        = 'gif|jpg|png';
		 $config['max_size']             = 100;
		 $config['max_width']            = 1024;
		 $config['max_height']           = 768;
		 if(!is_dir($config['upload_path']))
		 {
			 mkdir($config['upload_path'], 0777);
		 }
		 
		 $this->load->library('upload', $config);
		 if($_FILES["Foto"]["name"]!="")
		 {
			 if ($this->upload->do_upload("Foto"))
			 {
				 	$data = $this->upload->data();
				 	//$this->model->setImage();
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
}
