<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_pengujian extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("pelajaran/M_jenis_pengujian","model");
		 $this->load->model("M_jqxgrid");
		 $this->M_jqxgrid->setPath("pelajaran/jenis_pengujian/jqxgrid/datafields.json");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "pelajaran/jenis_pengujian/index";
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

		$this->db->where("idpelajaran",$this->input->get("idpelajaran"));
		$tahunajaran = $this->db->get('jenisujian')->result();
		$this->M_API->JSON($tahunajaran);
		
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
		$this->M_jqxgrid->create();
	}
	public function getPelajaran()
	{
		$this->db->where("departemen",$this->uri->segment(5));
		$this->db->where("aktif","1");
		$this->db->order_by("kode","ASC");
		?>
		<option value=""> -- Pilih Pelajaran -- </option>
		<?php
		foreach($this->db->get("pelajaran")->result() as $row)
		{
			?>
			
			<option value="<?=$row->replid?>"><?=$row->kode?> | <?=$row->nama?></option>
			<?php
		}
	}
	

}
