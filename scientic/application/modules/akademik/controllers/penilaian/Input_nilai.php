<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Input_nilai extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("penilaian/M_input_nilai","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("penilaian/input_nilai/jqxgrid/datafields.json");
	 }
	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "penilaian/input_nilai/index";
		$this->load->view("parser_content",$data);
	}
	public function getGuruMengajar()
	{
		$pelajaran = $this->db->get('v_pilih_input_nilai')->result();
        $this->M_API->JSON($pelajaran);
	}
	public function getTingkat()
	{
		$this->db->where("departemen",$this->input->post('departemen'));
		$this->db->where("nipguru",$this->input->post("nipguru"));
		$this->db->where("idtingkat",$this->input->post("idtingkat"));
		$this->db->where("idpelajaran",$this->input->post("idpelajaran"));
		$pelajaran = $this->db->get('v_aspek_penilaian')->result();
		
		$this->M_API->JSON($pelajaran);
	}
	public function getUjian()
	{
		$this->db->where("idpelajaran",$this->input->post("idpelajaran"));
		$this->db->where("idkelas",$this->input->post("idkelas"));
		$this->db->where("idsemester",$this->input->post("idsemester"));
		$this->db->where("idjenis",$this->input->post("idjenis"));
		$this->db->where("idaturan",$this->input->post("idaturan"));
		$ujian = $this->db->get('ujian')->result();
		$this->M_API->JSON($ujian);
	}
	public function updateUjian()
	{
			$this->M_jqxgrid->update();
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroyUjian()
	{
			$this->M_jqxgrid->delete();
	}
	public function storeUjian()
	{
		$this->M_jqxgrid->create();
	}
	
	public function getNilai()
	{
		$idujian = $this->input->post("idujian");
		$idkelas = $this->input->post("idkelas");
		
		$nilai = $this->db->query("call ins_input_nilai('form','','{$idujian}','{$idkelas}','','','')")->result();
        
		$this->M_API->JSON($nilai);
	}
	public function updateNilai()
	{
		//p_idnilaiujian int(10),p_idujian int(10),p_idkelas int(10),p_nis varchar(20),p_nilaiujian decimal(10,2),p_keterangan varchar(255)
		
		
		$idnilaiujian = $this->input->post("replid");
		$idujian = $this->input->post("idujian");
		$nis = $this->input->post("nis");
		$nilaiujian = $this->input->post("nilaiujian");
		$keterangan = $this->input->post("keterangan");
		
		$nilai = $this->db->query("call ins_input_nilai('insert','{$idnilaiujian}','{$idujian}','','{$nis}','{$nilaiujian}','{$keterangan}');");
		$result["status"] = "success";
		$result["message"] = "Nilai telah berhasil di input";
		
		$this->M_API->JSON($result);
	}
	public function getRPP()
	{
		$this->db->select("replid as value,rpp as label");
		$this->db->where("idtingkat",$this->input->post("idtingkat"));
		$this->db->where("idsemester",$this->input->post("idsemester"));
		$this->db->where("idpelajaran",$this->input->post("idpelajaran"));
		
		$result = $this->db->get("rpp")->result();
        
		$this->M_API->JSON($result);
	}
}
