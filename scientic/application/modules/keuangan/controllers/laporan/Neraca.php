<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Neraca extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("laporan/M_Neraca","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "laporan/neraca/index";
		$this->load->view("parser_content",$data);
	}
	public function grid()
	{
		$idtahunbuku = $this->input->post("idtahunbuku");
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$result = $this->db->query("call v_neraca('{$idtahunbuku}','{$tanggal_awal}','{$tanggal_akhir}');")->result();
		$this->M_API->JSON($result);
	}

}
