<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("pemeliharaan/M_Referensi","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("pemeliharaan/referensi/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "pemeliharaan/referensi/index";
    $this->load->view("parser_content",$data);
	}
	/**
	 * Display Json Data from table
	 *
	 *
	 *
	 * @return Response Json
	 */
	public function grid_data()
	{

			$this->M_jqxgrid->read();
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
			//
			if(!is_numeric($_POST["na"]))
			{
				$_POST["na"] = ($_POST["na"]=="true")?1:0;
			}
			$this->M_jqxgrid->update();
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
			//
			$this->M_jqxgrid->delete();

	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	public function store()
	{
		$_POST["na"] = ($_POST["na"]=="true")?1:0;
			// call create function from model to create new rows
			$this->M_jqxgrid->create();
	}
}
