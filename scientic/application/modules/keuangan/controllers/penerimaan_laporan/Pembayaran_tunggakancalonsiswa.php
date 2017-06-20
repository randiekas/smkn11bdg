<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_tunggakancalonsiswa extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("penerimaan_laporan/M_Pembayaran_tunggakancalonsiswa","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "penerimaan_laporan/Pembayaran_tunggakancalonsiswa/index";
    $this->load->view("parser_content",$data);
	}

}
