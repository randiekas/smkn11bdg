<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_penerimaan extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("penerimaan/M_Jurnal_penerimaan","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "penerimaan/jurnal_penerimaan/index";
    $this->load->view("parser_content",$data);
	}

}
