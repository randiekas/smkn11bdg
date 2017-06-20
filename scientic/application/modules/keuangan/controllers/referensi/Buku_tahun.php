<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_tahun extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("referensi/M_buku_tahun","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("referensi/buku_tahun/jqxgrid/datafields.json");
	 }

	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "referensi/buku_tahun/index";
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

		$replid = $this->input->post("replid");
		$departemen = $this->input->post("departemen");
		$tanggaltutup = "";
		$tahunbuku = $this->input->post("tahunbuku");
		$tanggalmulai = $this->input->post("tanggalmulai");
		$awalan = $this->input->post("awalan");
		$ditahan = "";
		$keterangan = $this->input->post("keterangan");
		
		$pelajaran = $this->db->query("call app_tutup_buku('update','{$replid}','{$departemen}','{$tanggaltutup}','{$tahunbuku}','{$tanggalmulai}','{$awalan}','{$ditahan}','{$keterangan}')")->last_row();
		$this->M_API->JSON($pelajaran);
			/*
			if(!is_numeric($_POST["aktif"]))
			{
				if(($_POST["aktif"]=="true"))
				{
					$this->db->update("tahunbuku",array('aktif'=>0));
				}
				$_POST["aktif"] = ($_POST["aktif"]=="true")?1:0;
			}
			$this->M_jqxgrid->update();
			*/
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
		$replid = $this->input->post("replid");
		$departemen = $this->input->post("departemen");
		$tanggaltutup = $this->input->post("tanggaltutup");
		$tahunbuku = $this->input->post("tahunbuku");
		$tanggalmulai = $this->input->post("tanggalmulai");
		$awalan = $this->input->post("awalan");
		$ditahan = $this->input->post("rekre");
		$keterangan = $this->input->post("keterangan");
		
		$pelajaran = $this->db->query("call app_tutup_buku('tutup','{$replid}','{$departemen}','{$tanggaltutup}','{$tahunbuku}','{$tanggalmulai}','{$awalan}','{$ditahan}','{$keterangan}')")->last_row();
		$this->M_API->JSON($pelajaran);
		
		/*
		if(!is_numeric($_POST["aktif"]))
		{
			if(($_POST["aktif"]=="true"))
			{
				$this->db->update("tahunbuku",array('aktif'=>0));
			}

			$_POST["aktif"] = ($_POST["aktif"]=="true")?1:0;
		}
		$this->M_jqxgrid->create();
		*/
	}
}
