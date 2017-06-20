<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upb extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("pemeliharaan/M_Upb","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("pemeliharaan/upb/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "pemeliharaan/upb/index";
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
			// call create function from model to create new rows
		$this->db->select("id");
		$this->db->where("kd_upb",$this->input->post("kd_upb"));
		if($this->db->get("upb")->num_rows()==0)
		{
			$this->M_jqxgrid->create();
		}
		else{
			$result["status"] = "error";
			$this->M_API->JSON($result);
		}
	}
}
