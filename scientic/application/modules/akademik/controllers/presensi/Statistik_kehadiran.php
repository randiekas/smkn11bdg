<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik_kehadiran extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("presensi/M_statistik_kehadiran","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("presensi/statistik_kehadiran/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "presensi/statistik_kehadiran/index";
		$this->load->view("parser_content",$data);
	}
	/**
	 * Display Json Data from table
	 *
	 *
	 *
	 * @return Response Json
	 */
	 public function getPresensi()
	 {
			$this->db->where("idkelas",$this->input->post("idkelas"));
			$this->db->where("idsemester",$this->input->post("idsemester"));
			$this->db->where("tanggal",$this->input->post("tanggal_awal"));
			$result = $this->db->get('presensiharian')->last_row();
		
			$this->M_API->JSON($result);
	 }
	 public function grid_data()
	{
			$idkelas = $this->input->post("idkelas");
			$idsemester = $this->input->post("idsemester");
			$idtingkat = $this->input->post("idtingkat");
			$idtahunajaran = $this->input->post("idtahunajaran");
			$tanggal_awal = $this->input->post("tanggal_awal");
			$tanggal_akhir = $this->input->post("tanggal_akhir");
			$result = $this->db->query("call v_statistik_presensi_kelas('{$idtingkat}','{$idtahunajaran}','{$idsemester}','{$tanggal_awal}','{$tanggal_akhir}')")->result();
			$this->M_API->JSON($result);
	}
	public function grid_data_siswa()
	{
			$idkelas = $this->input->post("idkelas");
			$idsemester = $this->input->post("idsemester");
			$tanggal_awal = $this->input->post("tanggal_awal");
			$tanggal_akhir = $this->input->post("tanggal_akhir");
			$result = $this->db->query("call v_statistik_presensi_siswa('{$idkelas}','{$idsemester}','{$tanggal_awal}','{$tanggal_akhir}')")->result();
			$this->M_API->JSON($result);
	}
	public function grid_data_detail()
	{
			$this->db->where("idkelas",$this->input->post("idkelas"));
			$this->db->where("idsemester",$this->input->post("idsemester"));
			$this->db->where("tanggal>=",$this->input->post("tanggal_awal"));
			$this->db->where("tanggal<=",$this->input->post("tanggal_akhir"));
			$this->db->where("nis",$this->input->post("nis"));
			$result = $this->db->get('v_presensihariansiswainput')->result();
			$this->M_API->JSON($result);
	}
	/**
	 * Display Json Data from table
	 *
	 *
	 *
	 * @return Response Json
	 */
	 public function getDetail()
	 {
		 $this->db->where("nis",$this->input->post("nis"));
		 $result = $this->db->get("siswa")->last_row();
		 $this->M_API->JSON($result);
	 }
	
  
	public function getAngkatan()
	{
		$this->db->where("aktif","1");
		if($this->uri->segment("5"))
		{
			$this->db->where("departemen",$this->uri->segment("5"));
		}
		foreach($this->db->get("angkatan")->result() as $row)
		{
		?>
			<option value="<?=$row->replid?>"><?=$row->angkatan?></option>		
		<?php
		}
	}
	public function getTahunAjaran()
	{
		
		$this->db->where("aktif","1");
		if($this->uri->segment("5"))
		{
			$this->db->where("departemen",$this->uri->segment("5"));
		}
		foreach($this->db->get("tahunajaran")->result() as $row)
		{
		?>
		<option value="<?=$row->replid?>"><?=$row->tahunajaran?></option>		
		<?php
		}
	}
	public function getTingkat()
	{
		$this->db->where("aktif","1");
		if($this->uri->segment("5"))
		{
			$this->db->where("departemen",$this->uri->segment("5"));
		}
		foreach($this->db->get("tingkat")->result() as $row)
		{
		?>
		<option value="<?=$row->replid?>"><?=$row->tingkat?></option>		
		<?php
		}
	}
	public function getSemester()
	{
		$this->db->where("aktif","1");
		if($this->uri->segment("5"))
		{
			$this->db->where("departemen",$this->uri->segment("5"));
		}
		foreach($this->db->get("semester")->result() as $row)
		{
		?>
		<option value="<?=$row->replid?>"><?=$row->semester?></option>		
		<?php
		}
	}
	public function getKelas()
	{
		$this->db->where("aktif","1");
		if($this->uri->segment("5"))
		{
			$this->db->where("idtahunajaran",$this->uri->segment("5"));
		}
		foreach($this->db->get("kelas")->result() as $row)
		{
		?>
		<option value="<?=$row->replid?>"><?=$row->kelas?></option>		
		<?php
		}
	}
}
