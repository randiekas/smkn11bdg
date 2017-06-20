<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_pengeluaran extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("pengeluaran_laporan/M_Transaksi_pengeluaran","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "pengeluaran_laporan/Transaksi_pengeluaran/index";
    $this->load->view("parser_content",$data);
	}

}
