<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_mengajar extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("pelajaran/M_guru_mengajar","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("pelajaran/guru_mengajar/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "pelajaran/guru_mengajar/index";
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
		$this->M_jqxgrid->create();
	}
	public function getPelajaran()
	{
		$pelajaran = $this->db->get('pelajaran')->result();
		$this->M_API->JSON($pelajaran);
	}
	public function getGuruMengajar()
	{
		$this->db->where("idpelajaran",$this->input->post("idpelajaran"));
		$guru = $this->db->get('guru')->result();
		$this->M_API->JSON($guru);
	}
}
