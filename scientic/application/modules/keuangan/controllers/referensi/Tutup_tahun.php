<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutup_tahun extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("referensi/M_Tutup_tahun","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "referensi/tutup_tahun/index";
    $this->load->view("parser_content",$data);
	}

}
