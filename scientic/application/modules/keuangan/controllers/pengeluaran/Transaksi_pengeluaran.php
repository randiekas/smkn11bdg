<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_pengeluaran extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("pengeluaran/M_transaksi_pengeluaran","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "pengeluaran/transaksi_pengeluaran/index";
		$this->load->view("parser_content",$data);
	}
	public function grid_data()
	{
		$this->db->select("replid,nis,nama");
		$this->db->where("departemen",$this->input->post("departemen"));
		$this->db->where("idtahunajaran",$this->input->post("idtahunajaran"));
		$this->db->where("idkelas",$this->input->post("idkelas"));
		$result = $this->db->get('v_siswa')->result();
		
		$this->M_API->JSON($result);
	}
	public function grid_data_cicilan()
	{
		$idpenerimaan = $this->input->post('idpenerimaan');
		$idtahunbuku = $this->input->post('idtahunbuku');
		$nis = $this->input->post('nis');
		$result = $this->db->query("call app_penerimaan_lainnya('view','','12','','','','');")->result();
		$this->M_API->JSON($result);
	}
	public function getDetail()
	 {
		 $nis = $this->input->post("nis");
		 
		 
		 
		 $this->db->select("nis,nama,kelas,telponsiswa,kelas,alamatsiswa,foto");
		 $this->db->where("nis",$nis);
		 $result = $this->db->get("v_siswa_detail")->last_row();
		 
		 $this->db->where("nis",$nis);
		 $this->db->where("info2",$this->input->post("idtahunbuku"));
		 $result->tagihan = $this->db->get("besarjtt")->last_row();
		 
		 $this->M_API->JSON($result);
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
	public function getPenerimaan()
	{
		$this->db->where("departemen",$this->uri->segment('5'));
		
		foreach($this->db->get("datapengeluaran")->result() as $row)
		{
			
			echo "<option value='{$row->replid}' rekkas='{$row->rekkas}'>{$row->nama}</option>";
		}
	}
	public function getKelas()
	{
		$this->db->where("aktif","1");
		$this->db->where("idtahunajaran",$this->uri->segment("5"));
		$this->db->where("idtingkat",$this->uri->segment("6"));
		foreach($this->db->get("kelas")->result() as $row)
		{
		?>
		<option value="<?=$row->replid?>"><?=$row->kelas?></option>
		<?php
		}
	}
	
	public function store()
	{
		
		$nis = $this->input->post('nis');   //  p_nis varchar(20),
		$idpenerimaan = $this->input->post('idpenerimaan');  // p_id_penerimaan int(10),
		$besar = $this->input->post('besar');  // p_besar decimal(15),
		$cicilan = $this->input->post('cicilan');  //p_cicilan decimal(15),
		$keterangan = $this->input->post('keterangan');  //p_keterangan varchar(255),
		$keteranganperubahan = $this->input->post('keteranganperubahan');  //p_keterangan varchar(255),
		$pengguna = $this->session->userdata('entity_id');  //p_pengguna varchar(255),
		$idtahunbuku = $this->input->post('idtahunbuku'); //  p_idtahunbuku varchar(255)
		
		$result = $this->db->query("call app_tagihan_jtt('{$nis}','{$idpenerimaan}','{$besar}','{$cicilan}','{$keterangan}','{$keteranganperubahan}','{$pengguna}','{$idtahunbuku}');")->last_row();
		
		$this->M_API->JSON($result);
	}
	public function save_cicilan()
	{
		$sumber = $this->input->post('sumber');   //  p_nis varchar(20),
		$idpenerimaan = $this->input->post('idpenerimaan');  // p_id_penerimaan int(10),
		$besar = $this->input->post('jumlah');  // p_besar decimal(15),
		$keterangan = $this->input->post('keterangan');  //p_keterangan varchar(255),
		$petugas = $this->session->userdata('entity_id');  //p_pengguna varchar(255),
		$idtahunbuku = $this->input->post('idtahunbuku'); //  p_idtahunbuku varchar(255)
		
		$result = $this->db->query("call app_penerimaan_lainnya('insert','{$sumber}','{$idpenerimaan}','{$besar}','{$keterangan}','{$petugas}','{$idtahunbuku}');")->last_row();
	
		$this->M_API->JSON($result);
	}
	public function delete_cicilan()
	{
		$replid = $this->input->post("replid");
		$result = $this->db->query("call app_tagihan_jtt_cicilan('{$replid}','','','','','',null,'','','');")->last_row();
	
		$this->M_API->JSON($result);
	}
}
