<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penempatan_siswa extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("psb/M_penempatan_siswa","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("psb/penempatan_siswa/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "psb/penempatan_siswa/index";
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
		$this->db->where("departemen",$this->input->get("departemen"));
		$this->db->where("idproses",$this->input->get("proses"));
		$this->db->where("kelompok",$this->input->get("kelompok"));
		$result = $this->db->get('v_calonsiswa')->result();
		$this->M_API->JSON($result);
		//$this->M_jqxgrid->read();
	}
	public function getSiswa()
	{
		$this->db->where("departemen",$this->input->post("departemen"));
		$this->db->where("idtahunajaran",$this->input->post("idtahunajaran"));
		$this->db->where("idkelas",$this->input->post("idkelas"));
		$result = $this->db->get('v_siswa')->result();
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
			//
			$result["status"] = "error";
			$result["message"] = "NIS tidak boleh kosong";
		
			if($this->input->post('nis')!="")
			{
				$this->db->select("nis");
				$this->db->where("nis",$this->input->post('nis'));
				if($this->db->get("siswa")->num_rows()==0)
				{
					$this->db->where("replid",$this->input->post('replid'));
					$this->db->update("siswa",array("nis"=>$this->input->post("nis")));
					$result["status"] = "success";
					$result["message"] = "NIS berhasil diubah";
				}
				else{
					$result["status"] = "error";
					$result["message"] = "NIS sudah digunakan , gunakan NIS yang lain";
				}
			}
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
			//
		$siswa = $this->input->post("replid");
		for($x=0;$x<count($siswa);$x++)
		{
			$replid = $siswa[$x];
			$this->db->where("replid",$replid);
			$this->db->delete("siswa");
		}
		$result["status"] = "success";
		$result["message"] = "siswa berhasil dihapus";
		$this->M_API->JSON($result);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	public function store()
	{
		$tahunmasuk = date("Y");
		$angkatan = $this->input->post("angkatan");
		$kelas = $this->input->post("kelas");
		
		$pendaftaran = $this->input->post("nopendaftaran");
		for($x=0;$x<count($pendaftaran);$x++)
		{
			$nopendaftaran = $pendaftaran[$x];
			$this->db->query("call ins_siswa({$nopendaftaran},{$tahunmasuk},{$angkatan},{$kelas})");
		}
		for($x=0;$x<count($pendaftaran);$x++)
		{
			$nopendaftaran = $pendaftaran[$x];
			$nis = $this->db->query("select calonsiswa.foto,siswa.nis from calonsiswa,siswa where calonsiswa.nopendaftaran='{$nopendaftaran}' and siswa.noun = calonsiswa.noun")->last_row();
			
			$upload_path = "./assets/siswa/{$nis->nis}/";
			 $location = "./assets/PSB/{$nopendaftaran}/".$nis->foto;
			 if(!is_dir($upload_path))
			 {
				 mkdir($upload_path, 0777);
			 }
			 @copy($location,$upload_path.$nis->foto);
		}
		$result["status"] = "success";
		$result["message"] = "siswa berhasil ditambahkan";
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
		 $this->db->where("nopendaftaran",$this->input->post("nopendaftaran"));
		 $result = $this->db->get("calonsiswa")->last_row();
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
	public function getProses()
	{
		$this->db->where("aktif","1");
		if($this->uri->segment("5"))
		{
			$this->db->where("departemen",$this->uri->segment("5"));
		}
		foreach($this->db->get("prosespenerimaansiswa")->result() as $row)
		{
		?>
		<option value="<?=$row->replid?>"><?=$row->proses?></option>		
		<?php
		}
	}
}
