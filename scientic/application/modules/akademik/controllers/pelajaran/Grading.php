<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grading extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("pelajaran/M_grading","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("pelajaran/grading/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "pelajaran/grading/index";
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
	public function getGuruMengajar()
	{
		$pelajaran = $this->db->get('v_guru_mengajar')->result();
		$this->M_API->JSON($pelajaran);
	}
	public function getTingkat()
	{
		$this->db->where("departemen",$this->input->get('departemen'));
		$pelajaran = $this->db->get('v_tingkat_aspek')->result();
		$this->M_API->JSON($pelajaran);
	}
	public function getGrading()
	{
		$this->db->where("nipguru",$this->input->post("nip"));
		$this->db->where("idtingkat",$this->input->post("idtingkat"));
		$this->db->where("idpelajaran",$this->input->post("idpelajaran"));
		$this->db->where("dasarpenilaian",$this->input->post("dasarpenilaian"));
		$grading = $this->db->get('aturangrading')->result();
		$this->M_API->JSON($grading);
	}
}
