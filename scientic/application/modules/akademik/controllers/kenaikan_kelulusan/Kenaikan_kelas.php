<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kenaikan_kelas extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("kenaikan_kelulusan/M_kenaikan_kelas","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("kenaikan_kelulusan/kenaikan_kelas/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "kenaikan_kelulusan/kenaikan_kelas/index";
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
		if($this->input->post("filter")=="false")
		{

			$this->db->where("departemen",$this->input->post("departemen"));
			$this->db->where("idtahunajaran",$this->input->post("idtahunajaran"));
			$this->db->where("idkelas",$this->input->post("idkelas"));
			$result = $this->db->get('v_siswa')->result();
		}else{
			$result = $this->db->query("call v_filtersiswa('{$this->input->post("field")}','{$this->input->post("keywords")}');")->result();
		}
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
		$kelas = $this->input->post("idkelas");
		$kelaslama = $this->input->post("idkelaslama");
		$nis = $this->input->post("nis");
		for($x=0;$x<count($nis);$x++)
		{
			$niss = $nis[$x];
			$this->db->query("call kenaikan_kelas('batal','{$niss}','{$kelas}','{$kelaslama}')");
		}
		$result["status"] = "success";
		$result["message"] = "berhasil membatalkan kenaikan kelas";
		$this->M_API->JSON($result);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	public function store()
	{
		$kelas = $this->input->post("idkelas");
		$kelaslama = $this->input->post("idkelaslama");
		$nis = $this->input->post("nis");
		for($x=0;$x<count($nis);$x++)
		{
			$niss = $nis[$x];
			$this->db->query("call kenaikan_kelas('kenaikan','{$niss}','{$kelas}','{$kelaslama}')");
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
		 $this->db->where("nis",$this->input->post("nis"));
		 $result = $this->db->get("siswa")->last_row();
		 $this->M_API->JSON($result);
	 }


	public function getAngkatan()
	{
		$this->db->where("aktif","1");
		 
			$this->db->where("departemen",$this->uri->segment("5"));
		 
		foreach($this->db->get("angkatan")->result() as $row)
		{
		?>
			<option value="<?=$row->replid?>"><?=$row->angkatan?></option>
		<?php
		}
	}
	public function getTahunAjaran()
	{

		 
			$this->db->where("departemen",$this->uri->segment("5"));
		 
		foreach($this->db->get("tahunajaran")->result() as $row)
		{
		?>
		<option value="<?=$row->replid?>" <?=($row->aktif=="1")?"selected":""?>><?=$row->tahunajaran?></option>
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
		$this->db->where("idtahunajaran",$this->uri->segment("5"));
		$this->db->where("idtingkat",$this->uri->segment("6"));
		foreach($this->db->get("kelas")->result() as $row)
		{
		?>
		<option value="<?=$row->replid?>"><?=$row->kelas?></option>
		<?php
		}
	}
	function save()
	{
		$this->model->save();
		$response["status"] = "success";
		$response["message"] = "Save Successfully";

		 $config['file_name']          = $_POST["nis"].'.jpg';
		 $config['overwrite']          = TRUE;
		 $config['upload_path']          = './assets/siswa/'.$_POST["nis"]."/";
		 if(!is_dir($config['upload_path']))
		 {
			 mkdir($config['upload_path'], 0777);
		 }
		 $config['allowed_types']        = 'gif|jpg|png';
		 $config['max_size']             = 100;
		 $config['max_width']            = 1024;
		 $config['max_height']           = 768;

		 $this->load->library('upload', $config);
		 if($_FILES["foto"]["name"]!="")
		 {
			 if ($this->upload->do_upload("foto"))
			 {
				 	$data = $this->upload->data();
				 	//$this->model->setImage();
					$response["status"] = "success";
					$response["message"] = "Change Image Successfully";
			 }
			 else
			 {
				 $response["status"] = "error";
				 $response["message"] = $this->upload->display_errors();
			 }
		}

		$this->M_API->JSON($response);
	}
}
