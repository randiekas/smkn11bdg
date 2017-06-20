<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_persiswa extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("penerimaan_laporan/M_Pembayaran_persiswa","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "penerimaan_laporan/Pembayaran_persiswa/index";
    $this->load->view("parser_content",$data);
	}

}
