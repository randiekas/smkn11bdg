<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi_harian extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("presensi/M_presensi_harian","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("presensi/presensi_harian/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "presensi/presensi_harian/index";
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
			$this->db->where("tanggal",$this->input->post("tanggal"));
			$result = $this->db->get('presensiharian')->last_row();
		
			$this->M_API->JSON($result);
	 }
	 public function grid_data()
	{
			$this->db->where("idkelas",$this->input->post("idkelas"));
			$this->db->where("idsemester",$this->input->post("idsemester"));
			$this->db->where("tanggal",$this->input->post("tanggal"));
			$result = $this->db->get('v_presensihariansiswainput')->result();
		
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
		if(!is_numeric($_POST["hadir"]))
			{
				$_POST["hadir"] = ($_POST["hadir"]=="true")?1:0;
			}
		if(!is_numeric($_POST["ijin"]))
			{
				$_POST["ijin"] = ($_POST["ijin"]=="true")?1:0;
			}
		if(!is_numeric($_POST["sakit"]))
			{
				$_POST["sakit"] = ($_POST["sakit"]=="true")?1:0;
			}	
		if(!is_numeric($_POST["alpa"]))
			{
				$_POST["alpa"] = ($_POST["alpa"]=="true")?1:0;
			}	
		if(!is_numeric($_POST["cuti"]))
			{
				$_POST["cuti"] = ($_POST["cuti"]=="true")?1:0;
			}
		$replid = $this->input->post("replid");
		$idkelas = "";
		$idsemester = "";
		$tanggal = "";
		$hadir = $_POST['hadir'];
		$ijin = $_POST['ijin'];
		$sakit = $_POST['sakit'];
		$alpa = $_POST['alpa'];
		$cuti = $_POST['cuti'];
		$keterangan  = $_POST['keterangan'];
		
		$result = $this->db->query("call app_insert_presensi_harian('detail','{$replid}','{$idkelas}','{$idsemester}','{$tanggal}','{$hadir}','{$ijin}','{$sakit}','{$alpa}','{$cuti}','{$keterangan}')")->last_row();
		
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
		$replid = $this->input->post("replid");
		$idkelas = "";
		$idsemester = "";
		$tanggal = "";
		$hadir = "";
		$ijin = "";
		$sakit = "";
		$alpa = "";
		$cuti = "";
		$keterangan  = "";
		
		$result = $this->db->query("call app_insert_presensi_harian('destroy','{$replid}','{$idkelas}','{$idsemester}','{$tanggal}','{$hadir}','{$ijin}','{$sakit}','{$alpa}','{$cuti}','{$keterangan}')")->last_row();
		
		$this->M_API->JSON($result); 
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	public function store()
	{
		$replid = $this->input->post("replid");
		$idkelas = $this->input->post('idkelas');
		$idsemester = $this->input->post('idsemester');
		$tanggal = $this->input->post('tanggal');
		$hadir = "";
		$ijin = "";
		$sakit = "";
		$alpa = "";
		$cuti = "";
		$keterangan  = "";
		
		$result = $this->db->query("call app_insert_presensi_harian('header','{$replid}','{$idkelas}','{$idsemester}','{$tanggal}','{$hadir}','{$ijin}','{$sakit}','{$alpa}','{$cuti}','{$keterangan}')")->last_row();
		
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
