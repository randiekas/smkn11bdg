<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik_siswa extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("kesiswaan/M_statistik_siswa","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "kesiswaan/statistik_siswa/index";
    $this->load->view("parser_content",$data);
	}

}
