<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan_lain extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("penerimaan_laporan/M_Penerimaan_lain","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "penerimaan_laporan/Penerimaan_lain/index";
    $this->load->view("parser_content",$data);
	}

}
