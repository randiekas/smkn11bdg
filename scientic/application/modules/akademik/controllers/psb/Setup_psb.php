<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup_psb extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("psb/M_setup_psb","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "psb/setup_psb/index";
    $this->load->view("parser_content",$data);
	}

}
