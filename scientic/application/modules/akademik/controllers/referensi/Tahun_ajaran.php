<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("referensi/M_tahun_ajaran","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("referensi/tahun_ajaran/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "referensi/tahun_ajaran/index";
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
			if(!is_numeric($_POST["aktif"]))
			{
				$_POST["aktif"] = ($_POST["aktif"]=="true")?1:0;
				if($_POST["aktif"]==1)
				{
					$this->db->where("departemen",$this->input->post("departemen"));
					$this->db->update("tahunajaran",array("aktif"=>0));
				}
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
		$_POST["aktif"] = ($_POST["aktif"]=="true")?1:0;
		if($_POST["aktif"]==1)
		{
			$this->db->where("departemen",$this->input->post("departemen"));
			$this->db->update("tahunajaran",array("aktif"=>0));
		}
		$this->M_jqxgrid->create();
	}
}
