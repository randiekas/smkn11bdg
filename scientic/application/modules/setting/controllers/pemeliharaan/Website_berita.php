<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_berita extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("pemeliharaan/website_berita/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "pemeliharaan/website_berita/index";
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
		$_POST["content"] = "<p>Silahkan Ubah Content Disini !</p>";
		$_POST["author"] = $this->session->userdata("username");
		$_POST["created"] = date("Y-m-d");
		$this->M_jqxgrid->create();
	}
	public function form_edit()
	{
		$this->db->where("id",$this->uri->segment(5));
		$data["row"] = $this->db->get("website_news")->last_row();
		$this->load->view("pemeliharaan/website_berita/form_edit",$data);
	}
	public function save_edit()
	{
		$data = $this->input->post("mce_0");
		$this->db->where("id",$this->uri->segment(5));
		$update["content"] = str_replace("../../../../../",'<?=scientic_url()?>',$data);
		$this->db->update("website_news",$update);
		redirect("setting/pemeliharaan/website_berita/form_edit/".$this->uri->segment(5));
	}
	public function save_edit_image()
	{
		$config['file_name']          = $_POST["id"].'.jpg';
		 $config['overwrite']          = TRUE;
		 $config['upload_path']          = '../sid/assets/news/';
		 $config['allowed_types']        = 'gif|jpg|png|jpeg';
		 $config['max_size']             = 500;
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
