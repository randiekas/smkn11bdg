<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_tunggakan extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("penerimaan_laporan/M_Pembayaran_tunggakan","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "penerimaan_laporan/Pembayaran_tunggakan/index";
    $this->load->view("parser_content",$data);
	}

}
