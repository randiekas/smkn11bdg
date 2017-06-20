<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyusunan_jadwal extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("penjadwalan/M_penyusunan_jadwal","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("penjadwalan/penyusunan_jadwal/program_pembelajaran/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "penjadwalan/penyusunan_jadwal/index";
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
			
			$result = $this->db->query("call v_jadwal('".$this->input->post('departemen')."','".$this->input->post('idkelas')."','".$this->input->post('infojadwal')."','".$this->input->post("hari")."')")->result();
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
	public function update()
	{
			//
			if(!is_numeric($_POST["aktif"]))
			{
				$_POST["aktif"] = ($_POST["aktif"]=="true")?1:0;
			}
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
			//
			$this->db->where("replid",$this->input->post("replid"));
			$this->db->delete("jadwal");
			$result["status"] = "success";
			$result["message"] = "jadwal telah berhasil dihapus";
			$this->M_API->JSON($result);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	public function store()
	{
		
		$data["idkelas"]  = $this->input->post("idkelas");
		$data["nipguru"]  = $this->input->post("nipguru");
		$data["idpelajaran"]  = $this->input->post("idpelajaran");
		$data["departemen"]  = $this->input->post("departemen");
		$data["infojadwal"]  = $this->input->post("infojadwal");
		$data["hari"]  = $this->input->post("hari");
		$data["kode_ruang"]  = $this->input->post("kode_ruang");
		$data["jamke"]  = $this->input->post("jamke");
		$data["jam1"]  = $this->input->post("jam1");
		$data["jam2"]  = $this->input->post("jam2");
		$this->db->insert("jadwal",$data);
		$result["status"] = "success";
		$result["message"] = "jadwal telah berhasil dimasukkan";
		$this->M_API->JSON($result);
		//$this->M_jqxgrid->create();
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
				$result = $this->db->query("call v_jadwal_guru('".$this->input->post("departemen")."','".$this->input->post("infojadwal")."')")->result();
				$this->M_API->JSON($result);
				
				//$this->M_jqxgrid->read();
		}
	public function addInfoJadwal()
	{
		$insert["deskripsi"] = $this->input->post("deskripsi");
		$insert["aktif"] = '1';
		$insert["terlihat"] = '1';
		$insert["keterangan"] = $this->input->post("deskripsi");
		$insert["idtahunajaran"] = $this->input->post("idtahunajaran");
		$this->db->insert("infojadwal",$insert);
		
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
	public function removeInfoJadwal()
	{
		$this->db->where("replid",$this->input->post("replid"));
		$this->db->delete("infojadwal");
		$result["status"] = "success";
		$this->M_API->JSON($result);
	}
}
