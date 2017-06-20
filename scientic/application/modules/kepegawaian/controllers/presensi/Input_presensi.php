<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_presensi extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("presensi/M_input_presensi","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("presensi/input_presensi/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "presensi/input_presensi/index";
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
			$this->db->where("tanggal",$this->input->post("tanggal"));
			$this->db->where("source",'MANUAL');
			$result = $this->db->get('v_presensipegawai')->result();
			$this->M_API->JSON($result);
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
		/*
		$replid = $this->input->post("replid");
		$tanggal = $this->input->post("tanggal");
		$nip = $this->input->post("nip");
		$jammasuk = $this->input->post("jammasuk");
		$jampulang = $this->input->post("jampulang");
		$status = $this->input->post("status");
		$keterangan = $this->input->post("keterangan");
		
		$this->db->query("call ins_presensi_pegawai('udpate','".$replid."','".$tanggal."','".$nip."','".$jammasuk."','".$jampulang."','".$status."','".$keterangan."');");
		$result["status"] = "success";
		$result["message"] = "Presensi telah berhasil diupdate";
		$this->M_API->JSON($result);
		 */
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
		
		$this->db->query("call ins_presensi_pegawai('delete',null,'".$this->input->post("tanggal")."',null,now(),now(),1,'keterangan');");
		$result["status"] = "success";
		$result["message"] = "Presensi berhasil dihapus";
		$this->M_API->JSON($result);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	public function store()
	{
		
		
		$this->db->query("call ins_presensi_pegawai('generate',null,'".$this->input->post("tanggal")."',null,null,null,0,'');");
		
		$result["status"] = "success";
		$result["message"] = "Presensi telah berhasil ditambahkan";
		
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
	public function getPelajaran()
	{
		$this->db->where("aktif","1");
		if($this->uri->segment("5"))
		{
			$this->db->where("departemen",$this->uri->segment("5"));
		}
		foreach($this->db->get("pelajaran")->result() as $row)
		{
		?>
		<option value="<?=$row->replid?>"><?=$row->kode?> - <?=$row->nama?></option>		
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
	function save()
	{
		
	}	
}
