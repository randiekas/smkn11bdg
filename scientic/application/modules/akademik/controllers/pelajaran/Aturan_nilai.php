<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aturan_nilai extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("pelajaran/M_aturan_nilai","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("pelajaran/aturan_nilai/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "pelajaran/aturan_nilai/index";
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
			$this->M_jqxgrid->setPath("pelajaran/aturan_nilai/jqxgrid/datafields.json");
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
			$this->M_jqxgrid->setPath("pelajaran/aturan_nilai/jqxgrid/datafields.json");
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
			$this->M_jqxgrid->setPath("pelajaran/aturan_nilai/jqxgrid/datafields.json");
			$this->M_jqxgrid->delete();
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	public function store()
	{
		$this->M_jqxgrid->setPath("pelajaran/aturan_nilai/jqxgrid/datafields.json");
		$this->M_jqxgrid->create();
	}
	
	/// batas
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function updateBobot()
	{
			$this->M_jqxgrid->setPath("pelajaran/aturan_nilai/jqxgrid/datafieldsBobot.json");
			if(!is_numeric($_POST["aktif"]))
			{
				$_POST["aktif"] = ($_POST["aktif"]=="true")?1:0;
			}
			$this->M_jqxgrid->update();
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroyBobot()
	{
			//
			$this->M_jqxgrid->setPath("pelajaran/aturan_nilai/jqxgrid/datafieldsBobot.json");
			$this->M_jqxgrid->delete();
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	public function storeBobot()
	{
		$this->M_jqxgrid->setPath("pelajaran/aturan_nilai/jqxgrid/datafieldsBobot.json");
		$_POST["aktif"] = ($_POST["aktif"]=="true")?1:0;
		$this->M_jqxgrid->create();
	}
	/// batas
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
	public function getBobot()
	{
		$this->db->where("nipguru",$this->input->post("nip"));
		$this->db->where("idtingkat",$this->input->post("idtingkat"));
		$this->db->where("idpelajaran",$this->input->post("idpelajaran"));
		$this->db->where("dasarpenilaian",$this->input->post("dasarpenilaian"));
		$bobot = $this->db->get('aturannhb')->result();
		$this->M_API->JSON($bobot);
	}
}
