<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_keuangan extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("laporan/M_Transaksi_keuangan","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("laporan/transaksi_keuangan/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "laporan/transaksi_keuangan/index";
		$this->load->view("parser_content",$data);
	}
	public function grid()
	{
		$this->db->where("idtahunbuku",$this->input->get("idtahunbuku"));
		$this->db->where("tanggal BETWEEN '".$this->input->get('tanggal_awal')."' and '".$this->input->get('tanggal_akhir')."'");
		$this->M_jqxgrid->read();
	}
}
