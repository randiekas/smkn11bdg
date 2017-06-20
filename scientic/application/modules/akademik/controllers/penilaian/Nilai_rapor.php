<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_rapor extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("penilaian/M_nilai_rapor","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "penilaian/nilai_rapor/index";
		$this->load->view("parser_content",$data);
	}
	public function getKelas()
	{
		$pelajaran = $this->db->get('v_pilih_kelas')->result();
		$this->M_API->JSON($pelajaran);
	}
	public function getNilai()
	{
		$idkelas = $this->input->post("idkelas");
		$idsemester = $this->input->post("idsemester");
		$nis = $this->input->post("nis");
		$pelajaran = $this->db->query("call v_nau_rapor('{$idkelas}','{$idsemester}','{$nis}')")->result();
		$this->M_API->JSON($pelajaran);
	}
	public function getSiswa()
	{
		$this->db->select("nis,nama");
		$this->db->where("idtahunajaran",$this->input->post("idtahunajaran"));
		$this->db->where("idkelas",$this->input->post("idkelas"));
		$this->db->order_by("nama","asc");
		$pelajaran = $this->db->get('v_siswa')->result();
		$this->M_API->JSON($pelajaran);
	}
}
