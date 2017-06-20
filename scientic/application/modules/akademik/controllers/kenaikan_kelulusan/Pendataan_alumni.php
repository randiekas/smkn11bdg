<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendataan_alumni extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("kenaikan_kelulusan/M_pendataan_alumni","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("kenaikan_kelulusan/pendataan_alumni/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "kenaikan_kelulusan/pendataan_alumni/index";
		$this->load->view("parser_content",$data);
	}
	public function alumniData()
	{
		$this->db->where("YEAR(tgllulus)",$this->input->post('tahunlulus'),false);
		$this->db->where("departemen",$this->input->post('departemen'));
		$result = $this->db->get("v_alumni")->result();

		$this->M_API->JSON($result);
	}
	public function getDetail()
	 {
		 $this->db->where("nis",$this->input->post("nis"));
		 $result = $this->db->get("siswa")->last_row();
		 $this->M_API->JSON($result);
	 }
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		$kelas = $this->input->post("idkelas");
		$tingkat = $this->input->post("idtingkat");
		$departemen = $this->input->post("departemen");
		$nis = $this->input->post("nis");
		$tgllulus = $this->input->post("tgllulus");
		for($x=0;$x<count($nis);$x++)
		{
			$niss = $nis[$x];
			$this->db->query("call kelulusan('batal','{$niss}','{$departemen}','{$tingkat}','{$kelas}','{$tgllulus}')");
		}
		$result["status"] = "success";
		$result["message"] = "berhasil membatalkan Alumni";
		$this->M_API->JSON($result);
	}
	 
}
