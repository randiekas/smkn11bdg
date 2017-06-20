<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapitulasi_presensi extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("presensi/M_Rekapitulasi_presensi","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "presensi/rekapitulasi_presensi/index";
    $this->load->view("parser_content",$data);
	}

}
