<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Point extends CI_Controller {
function __construct()
	 {
		 parent::__construct();
		 $this->load->model("kesiswaan/M_data_siswa","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("point/point/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "point/point/index";
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
        $this->db->where("departemen",$this->input->post("departemen"));
        $this->db->where("idtahunajaran",$this->input->post("idtahunajaran"));
        $this->db->where("idkelas",$this->input->post("idkelas"));
        $result = $this->db->get('v_point_siswa')->result();
		
		$this->M_API->JSON($result);
	}
	
	/**
	 * Display Json Data from table
	 *
	 *
	 *
	 * @return Response Json
	 */
	 
    public function getPoint()
    {
        $this->db->where("nis",$this->input->post("nis"));
        $result = $this->db->get("v_point")->result();
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
	public function store()
    {
        $data["kode"] = $this->input->post("kode_jenis");
        $data["nis"] = $this->input->post("nis");
        $data["tanggal"] = date("Y-m-d H:i:s");
        $data["keterangan"] = $this->input->post("keterangan");
        $data["user"] = $this->input->post("user");
        
        $this->db->insert("point_siswa",$data);
        $result["status"] = "success";
        $this->M_API->JSON($result);
    }
    public function update()
    {
        $data["kode"] = $this->input->post("kode_jenis");
        $data["nis"] = $this->input->post("nis");
        $data["tanggal"] = $this->input->post("tanggal");
        $data["keterangan"] = $this->input->post("keterangan");
        $data["user"] = $this->input->post("user");
        $this->db->where("replid",$this->input->post("replid"));
        $this->db->update("point_siswa",$data);
        
        $result["status"] = "success";
        $this->M_API->JSON($result);
    }
    public function destroy()
    {
        $this->db->where("replid",$this->input->post("id"));
        $this->db->delete("point_siswa");
        $result["status"] = "success";
        $this->M_API->JSON($result);
    }
}