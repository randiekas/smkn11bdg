<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jam_belajar extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("penjadwalan/M_jam_belajar","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("penjadwalan/jam_belajar/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "penjadwalan/jam_belajar/index";
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
		
		$this->M_jqxgrid->create();
	}

}
