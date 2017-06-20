<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik_mutasi extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("mutasi/M_statistik_mutasi","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "mutasi/statistik_mutasi/index";
		$this->load->view("parser_content",$data);
	}
	public function grid_data_statistik()
	{
		$periode_awal = $this->input->post("periode_awal");
		$periode_akhir = $this->input->post("periode_akhir");
		$result = $this->db->query("call v_statistik_mutasi({$periode_awal},{$periode_akhir})")->result();
		$this->M_API->JSON($result);
	}
	public function grid_data()
	{
			$this->db->where("jenismutasi",$this->input->post("jenismutasi"));
			$result = $this->db->get('v_siswa_mutasi')->result();
			$this->M_API->JSON($result);
	}
	public function getDetail()
	 {
		 $this->db->where("nis",$this->input->post("nis"));
		 $result = $this->db->get("siswa")->last_row();
		 $this->M_API->JSON($result);
	 }
}
