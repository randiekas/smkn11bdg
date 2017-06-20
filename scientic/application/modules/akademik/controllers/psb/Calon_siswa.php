<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calon_siswa extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("psb/M_calon_siswa","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("psb/calon_siswa/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "psb/calon_siswa/index";
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

			$this->M_jqxgrid->read();
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
			//
			if(!is_numeric($_POST["aktif"]))
			{
				$_POST["aktif"] = ($_POST["aktif"]=="true")?1:0;
			}
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
			if($this->input->post("replid"))
			{
				$this->db->where("replid",$this->input->post("replid"));
				$this->db->delete("calonsiswa");
			}
			$result["status"] ="success";
			$result["message"] = "calon siswa telah berhasil dihapus";
			$this->M_API->JSON($result);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	public function store()
	{
		$_POST["aktif"] = ($_POST["aktif"]=="true")?1:0;
		$this->M_jqxgrid->create();
	}
	/**
	 * Display Json Data from table
	 *
	 *
	 *
	 * @return Response Json
	 */
	 public function getDetail()
	 {
		 $this->db->where("nopendaftaran",$this->input->post("nopendaftaran"));
		 $result = $this->db->get("calonsiswa")->last_row();
		 $this->M_API->JSON($result);
	 }
	 public function save()
	 {
		$response = $this->model->save();
		 /*
		 $response["status"] = "success";
		$response["message"] = "Save Successfully";
		*/
		 $config['file_name']          = $_POST["nopendaftaran"].'.jpg';
		 $config['overwrite']          = TRUE;
		 $config['upload_path']          = './assets/PSB/'.$_POST["nopendaftaran"]."/";
		 if(!is_dir($config['upload_path']))
		 {
			 mkdir($config['upload_path'], 0777);
		 }
		 $config['allowed_types']        = 'gif|jpg|png';
		 $config['max_size']             = 100;
		 $config['max_width']            = 1024;
		 $config['max_height']           = 768;
		
		 $this->load->library('upload', $config);
		 if($_FILES["foto"]["name"]!="")
		{
			 if ($this->upload->do_upload("foto"))
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
