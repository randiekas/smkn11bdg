<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik_pegawai extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("kepegawaian/M_Statistik_pegawai","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "kepegawaian/statistik_pegawai/index";
    $this->load->view("parser_content",$data);
	}

}
