<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapitulias_penerimaan extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("penerimaan_laporan/M_Rekapitulias_penerimaan","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "penerimaan_laporan/Rekapitulias_penerimaan/index";
    $this->load->view("parser_content",$data);
	}

}
