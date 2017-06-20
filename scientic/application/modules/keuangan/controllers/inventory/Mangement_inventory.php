<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mangement_inventory extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("inventory/M_Mangement_inventory","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "inventory/Mangement_inventory/index";
    $this->load->view("parser_content",$data);
	}

}
