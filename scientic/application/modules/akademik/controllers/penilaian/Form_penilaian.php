<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_penilaian extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("penilaian/M_form_penilaian","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "penilaian/form_penilaian/index";
    $this->load->view("parser_content",$data);
	}

}
