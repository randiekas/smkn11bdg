<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_jadwal extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("penjadwalan/M_laporan_jadwal","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("penjadwalan/laporan_jadwal/program_pembelajaran/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "penjadwalan/laporan_jadwal/index";
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
			
			//$result = $this->db->query("call v_jadwal('".$this->input->post('departemen')."','".$this->input->post('idkelas')."','".$this->input->post('infojadwal')."','".$this->input->post("hari")."')")->result();
			//$result = $this->db->query("call v_jadwal_full_guru('101','SMK','46','1')")->result();
			$departemen = $this->input->post('departemen');
			$idkelas = $this->input->post('idkelas');
			$infojadwal = $this->input->post('infojadwal');
			$nip = $this->input->post('nip');
			$result = $this->db->query("call v_jadwal_full_guru('{$nip}','{$departemen}','{$idkelas}','{$infojadwal}');")->result();
			$this->M_API->JSON($result);
			//$this->M_jqxgrid->read();
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
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
	public function getTahunAjaran()
	{
		//$this->db->where("aktif","1");
		if($this->uri->segment("5"))
		{
			$this->db->where("departemen",$this->uri->segment("5"));
		}
		foreach($this->db->get("tahunajaran")->result() as $row)
		{
			?>
			<option value="<?=$row->replid?>" <?=($row->aktif=='1')?"selected":""?>><?=$row->tahunajaran?></option>
			<?php
		}
	}
	public function getKelas()
	{
		$this->db->where("aktif","1");
		if($this->uri->segment("5"))
		{
			$this->db->where("idtahunajaran",$this->uri->segment("5"));
			$this->db->where("idtingkat",$this->uri->segment("6"));
		}
		?>
			<option value="all">Semua Kelas</option>
		<?php
		foreach($this->db->get("kelas")->result() as $row)
		{
			?>
			<option value="<?=$row->replid?>"><?=$row->kelas?></option>
			<?php
		}
	}
 
	public function getInfoJadwal()
	{
		$this->db->where("terlihat","1");
		if($this->uri->segment("5"))
		{
			$this->db->where("idtahunajaran",$this->uri->segment("5"));
		}
		
		foreach($this->db->get("infojadwal")->result() as $row)
		{
			?>
			<option value="<?=$row->replid?>"><?=$row->keterangan?></option>
			<?php
		}
		
	}
	public function getGuru()
		{
			?>
			<option value="all">Semua Guru</option>
			<?php
			$this->db->where("departemen",$this->uri->segment("5"));
			$this->db->group_by("nip");
			$this->db->order_by("nip","asc");
			foreach($this->db->get("v_guru_mengajar")->result() as $row)
			{
				?>
				<option value="<?=$row->nip?>"><?=$row->nip." - ".$row->nama_pegawai?></option>
				<?php
			}
		}
}
