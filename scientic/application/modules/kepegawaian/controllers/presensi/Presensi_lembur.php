<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi_lembur extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("presensi/M_presensi_lembur","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("presensi/presensi_lembur/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "presensi/presensi_lembur/index";
		$this->load->view("parser_content",$data);
	}
	public function grid_data()
	{
			$this->db->where("tanggal",$this->input->post("tanggal"));
			$this->db->where("source",'LEMBUR');
			$Q = $this->db->get('v_presensipegawai');
			$result[]["TotalRows"] = $Q->num_rows();
			$result[]["Rows"] = $Q->result();
			$this->M_API->JSON($result);
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
		$_POST["source"] = "LEMBUR";
		$_POST["status"] = "1";
		$this->M_jqxgrid->create();
	}
}
