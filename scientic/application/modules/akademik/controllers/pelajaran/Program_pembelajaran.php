<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_pembelajaran extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("pelajaran/M_program_pembelajaran","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("pelajaran/program_pembelajaran/jqxgrid/datafields.json");
	 }
	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "pelajaran/program_pembelajaran/index";
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
			
				$this->db->where('idtingkat',$this->input->get('tingkat'));
			
				$this->db->where('idsemester',$this->input->get('semester'));
			
				$this->db->where('idpelajaran',$this->input->get('pelajaran'));
			
			$result = $this->db->get("rpp")->result();
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
			$this->M_jqxgrid->delete();
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response Json
	 */
	public function store()
	{
		$_POST["aktif"] = ($_POST["aktif"]=="true")?1:0;
		$this->M_jqxgrid->create();
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
		$this->db->order_by("semester","ASC");
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
		$this->db->order_by("nama","ASC");
		$this->db->where("aktif","1");
		if($this->uri->segment("5"))
		{
			$this->db->where("departemen",$this->uri->segment("5"));
		}
		foreach($this->db->get("pelajaran")->result() as $row)
		{
			?>
			<option value="<?=$row->replid?>"><?=$row->nama?></option>
			<?php
		}
	}
}
