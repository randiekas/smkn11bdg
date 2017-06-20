<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_besar extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("laporan/M_Buku_besar","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "laporan/buku_besar/index";
		$this->load->view("parser_content",$data);
	}
	public function grid_jurnal()
	{
		$this->db->where("idtahunbuku",$this->input->post("idtahunbuku"));
		$this->db->where("tanggal BETWEEN '".$this->input->post('tanggal_awal')."' and '".$this->input->post('tanggal_akhir')."'");
		$result = $this->db->get("v_bukubesar")->result();
		$this->M_API->JSON($result);
	}
	public function grid_jurnal_detail()
	{
		$this->db->where("tanggal2 BETWEEN '".$this->input->post('tanggal_awal')."' and '".$this->input->post('tanggal_akhir')."'");
		$this->db->where("koderek",$this->input->post("koderek"));
		$result = $this->db->get("v_bukubesar_detail")->result();
		$this->M_API->JSON($result);
	}
}
