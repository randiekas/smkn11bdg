<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_siswa extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("penilaian/M_nilai_siswa","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "penilaian/nilai_siswa/index";
		$this->load->view("parser_content",$data);
	}
	public function getGuruMengajar()
	{
		$pelajaran = $this->db->get('v_pilih_input_nilai')->result();
		$this->M_API->JSON($pelajaran);
	}
	public function getTingkat()
	{
		//$this->db->select("dasarpenilaian");
		$this->db->where("departemen",$this->input->post('departemen'));
		$this->db->where("nipguru",$this->input->post("nipguru"));
		$this->db->where("idtingkat",$this->input->post("idtingkat"));
		$this->db->where("idpelajaran",$this->input->post("idpelajaran"));
		$this->db->group_by("dasarpenilaian");
		$pelajaran = $this->db->get('v_aspek_penilaian')->result();
		
		$this->M_API->JSON($pelajaran);
	}
	public function getUjian()
	{
		
		$departemen = $this->input->post("departemen");
		$nipguru = $this->input->post("nipguru");
		$idtingkat = $this->input->post("idtingkat");
		$idpelajaran = $this->input->post("idpelajaran");
		$idkelas = $this->input->post("idkelas");
		$idsemester = $this->input->post("idsemester");
		$dasarpenilaian = $this->input->post("dasarpenilaian");
		
		$ujian = $this->db->query("call v_nau('{$departemen}','{$nipguru}','{$idtingkat}','{$idpelajaran}','{$idkelas}','{$idsemester}','{$dasarpenilaian}')")->result();
		$this->M_API->JSON($ujian);
		
		
		
	}
	public function hitungNilai()
	{
		$idpelajaran = $this->input->post("idpelajaran");
		$idkelas = $this->input->post("idkelas");
		$idsemester = $this->input->post("idsemester");
		$idinfo = $this->input->post("idinfo");
		
		$this->db->query("call ins_nau('{$idpelajaran}','{$idkelas}','{$idsemester}','{$idinfo}')");
		
		$result["status"] = "success";
		$result["message"] = "Nilai telah berhasil dihitung";
		
		$this->M_API->JSON($result);
	}
	public function savekkm()
	{
		$idpelajaran = $this->input->post("idpelajaran");
		$idkelas = $this->input->post("idkelas");
		$idsemester = $this->input->post("idsemester");
		$nilaimin = $this->input->post("nilaimin");
		
		$result = $this->db->query("call app_kkm('save','{$idpelajaran}','{$idsemester}','{$idkelas}','{$nilaimin}')")->last_row();
		
		
		$this->M_API->JSON($result);
	}
	/*
	public function getField()
	{
		$ujian = $this->db->query("call v_nau('SMK','026','26','45','46',20,'AFEK')")->list_fields();
		var_dump($ujian);
	}
	*/
}
