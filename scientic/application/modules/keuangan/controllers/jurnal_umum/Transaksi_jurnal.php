<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_jurnal extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("jurnal_umum/M_Transaksi_jurnal","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "jurnal_umum/transaksi_jurnal/index";
		$this->load->view("parser_content",$data);
	}
	public function grid_jurnal()
	{
		$result = $this->db->get('jurnal')->result();
		
		$this->M_API->JSON($result);
	}
	
	public function grid_jurnal_detail()
	{
		
		$this->db->where("idjurnal",$this->input->post("idjurnal"));
		$result = $this->db->get('jurnaldetail')->result_array();
		$sekarang = count($result);
		$berikutnya = count($result)+10;
		for($x=$sekarang;$x<$berikutnya;$x++)
		{
			$result[$x]["replid"] ="";
			$result[$x]["idjurnal"] ="";
			$result[$x]["koderek"] ="";
			$result[$x]["debet"] ="";
			$result[$x]["kredit"] ="";
		}
		
		
		$this->M_API->JSON($result);
	}
	public function save_jurnal()
	{
		$idtahunbuku = $this->input->post('idtahunbuku');  // p_id_penerimaan int(10),
		$tanggal = implode("-",array_reverse(explode('/',$this->input->post('tanggal'))));   //  p_nis varchar(20),
		$transaksi = $this->input->post('transaksi');  // p_id_penerimaan int(10),
		$keterangan = $this->input->post('keterangan');  // p_id_penerimaan int(10),
		$pengguna = $this->session->userdata('entity_id');  //p_pengguna varchar(255),
		$result = $this->db->query("select ins_jurnal('{$idtahunbuku}',now(),'{$transaksi}','{$keterangan}','{$pengguna}','jurnalumum') as replid,'success' as status")->last_row();	
		$this->M_API->JSON($result);
		
	}
	public function save_jurnal_detail()
	{
		$detail = $this->input->post("detail");
		for($x=0;$x<count($detail);$x++)
		{
			$replid = $detail[$x]["replid"];
			$koderek = $detail[$x]["koderek"];
			$debet = $detail[$x]["debet"];
			$kredit = $detail[$x]["kredit"];
			if($koderek!="" and ($debet!="" or $kredit!=""))
			{
				$data["idjurnal"] = $this->input->post('idjurnal');  
				$data["koderek"] = $koderek;
				$data["debet"] =   $debet;
				$data["kredit"] = $kredit;
				
				if($replid=="")
				{
					$this->db->insert("jurnaldetail",$data);
				}else{
					$this->db->where("replid",$replid);
					$this->db->update("jurnaldetail",$data);
				}
			}else{
				if($replid!="")
				{
					$this->db->where("replid",$replid);
					$this->db->delete("jurnaldetail");
				}
			}
		}
		$result["status"] = "success";
		$result["message"] = "Detail jurnal telah disimpan";
		$this->M_API->JSON($result);
		/*
		$idtahunbuku = $this->input->post('idtahunbuku');  // p_id_penerimaan int(10),
		$tanggal = implode("-",array_reverse(explode('/',$this->input->post('tanggal'))));   //  p_nis varchar(20),
		$transaksi = $this->input->post('transaksi');  // p_id_penerimaan int(10),
		$keterangan = $this->input->post('keterangan');  // p_id_penerimaan int(10),
		$pengguna = $this->session->userdata('entity_id');  //p_pengguna varchar(255),
		$result = $this->db->query("select ins_jurnal('{$idtahunbuku}',now(),'{$transaksi}','{$keterangan}','{$pengguna}','jurnalumum') as replid,'success' as status")->last_row();	
		$this->M_API->JSON($result);
		*/
	}
	
}
