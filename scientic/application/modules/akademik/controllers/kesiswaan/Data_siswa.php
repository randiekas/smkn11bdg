<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("kesiswaan/M_data_siswa","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("kesiswaan/data_siswa/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "kesiswaan/data_siswa/index";
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
	public function grid_data_import()
	{
		$result = $this->db->get("siswa_import")->result();
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
	public function update_import()
	{
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
	public function reset_siswa_import()
	{
			//
		$this->db->query("CALL reset_siswa_import()");
		$result["status"] = "success";
		$result["message"] = "Import Siswa telah berhasil direset";
		$this->M_API->JSON($result);
	}
	public function store_import()
	{
		if($this->input->post("idkelas")!="")
		{
			$this->db->query("call proccess_siswa_import({$this->input->post("idkelas")})");
		}
		$result["status"] = "success";
		$result["message"] = "Import Siswa telah berhasil direset";
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
			$nis = $this->db->query("call ins_siswa({$nopendaftaran},{$tahunmasuk},{$angkatan},{$kelas})")->last_row();
			echo $nis->nis;
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
    public function export_excel()
    {   
        $this->db->select("kelas");
        $this->db->where("replid",$this->uri->segment(5));
        $kelas = $this->db->get("kelas");
        if($kelas->num_rows()>=1)
        {
            $kelas = $kelas->last_row();
            header("Content-type: application/vnd.ms-excel; name='excel'");
            header("Content-Disposition: attachment; filename={$kelas->kelas}.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $this->load->view("kesiswaan/data_siswa/export_excel");
        }else{
            echo "data tidak ditemukan";
        }
    }
	public function savemutasi()
	{
			//

		$insert["nis"] = $this->input->post("nis");
		$insert["jenismutasi"] = $this->input->post("jenismutasi");
		$insert["tglmutasi"] = $this->input->post("tglmutasi");
		$insert["keterangan"] = $this->input->post("keterangan");
		$insert["departemen"] = $this->input->post("departemen");

		if($this->db->insert("mutasisiswa",$insert))
		{
			$update["statusmutasi"]=$insert["jenismutasi"];
			$this->db->where("nis",$insert["nis"]);
			$this->db->update("siswa",$update);
		}
		$result["status"] = "success";
		$result["message"] = "Siswa telah berhasil dimutasi";
		$this->M_API->JSON($result);

	}
}
