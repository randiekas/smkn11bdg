<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi_siswa extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("mutasi/M_mutasi_siswa","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("mutasi/mutasi_siswa/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "mutasi/mutasi_siswa/index";
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
		$replid = $this->input->post("replid");
		$this->db->select("nis");
		$this->db->where("replid",$replid[0]);
		$mutasi = $this->db->get("mutasisiswa")->last_row();
		$this->db->where("replid",$replid[0]);
		$this->db->delete("mutasisiswa");
		
		
		$this->db->where("nis",$mutasi->nis);
		$this->db->update("siswa",array("statusmutasi"=>null));
		$result["status"] ="success";
		$result["message"] = "Mutasi telah berhasil dibatalkan";
		$this->M_API->JSON($result);
			//
			//$this->M_jqxgrid->delete();
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
