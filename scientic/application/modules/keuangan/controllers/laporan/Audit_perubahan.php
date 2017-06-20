<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit_perubahan extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("laporan/M_Audit_perubahan","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "laporan/audit_perubahan/index";
    $this->load->view("parser_content",$data);
	}

}
