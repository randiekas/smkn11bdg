<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Setup_psb extends CI_Model{
  /**
	 * create a newly created resource in storage.
	 *
	 * @return Response Json
	 */

  public $setting_module = "setting_module/datafields.json";
  public function create()
  {
    $table = $this->getTable();
    for($x=0;$x<count($table->fields);$x++)
    {
      $customer[$table->fields[$x]->name] = $this->input->post($table->fields[$x]->name);
    }
    $customers = $customer;
    $this->db->insert($table->table,$customers);
    $this->createKeyJson();
    $data["data"] = "";
    $data["status"] = "success";
    $data["xhr"] = "";
    $this->M_API->JSON($data);
  }
  /**
   * Display Json Data in table module
   *
   *
   *
   * @return Response Json
   */
  public function read()
  {
    $table = $this->getTable();
    //filterable
    $this->jqxgrid->filterable();
    //end of filterable
    //sort
    $this->jqxgrid->sortable();
    //end of sort

    //pagination
    $pagenum = (($this->input->get('pagenum')))?$this->input->get('pagenum'):0;
    $pagesize = (($this->input->get('pagesize')))?$this->input->get('pagesize'):10;
    $start = $pagenum * $pagesize;
    //end of pagination
    $query = $this->db->get($table->table,$pagesize,$start);


    $this->db->select("count(*) as TotalRows",FALSE);
    $this->jqxgrid->filterable();

    $total_rows = $this->db->get($table->table)->row();
    foreach($query->result_array() as $row)
    {
      $customer = array();
      for($x=0;$x<count($table->fields);$x++)
      {
        $customer[$table->fields[$x]->name] = $row[$table->fields[$x]->name];
      }
      $customers[] = $customer;
    }

    $data[] = array(
     'TotalRows' => $total_rows->TotalRows,
      'Rows' => $customers
    );
    $this->M_API->JSON($data);
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
    $table = $this->getTable();
    for($x=0;$x<count($table->fields);$x++)
    {
      $customer[$table->fields[$x]->name] = $this->input->post($table->fields[$x]->name);
    }
    $customers = $customer;


    $this->db->where($table->ID,$this->input->post($table->ID));
    $this->db->update($table->table,$customers);
    $this->createKeyJson();
    $data["data"] = "";
    $data["status"] = "success";
    $data["xhr"] = "";
    $this->M_API->JSON($data);
  }
  /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
  function delete()
  {
    $table = $this->getTable();
    $ID = $this->input->post($table->ID);
    for($x=0;$x<count($ID);$x++)
    {
      $this->db->where($table->ID,$ID[$x]);
      $this->db->delete($table->table);
    }
    $this->createKeyJson();
    $data["data"] = "";
    $data["status"] = "success";
    $data["xhr"] = "";
    $this->M_API->JSON($data);
  }
  /**
   * get setting table from json
   *
   *
   *
   * @return Response Json
   */
  public function getTable()
  {
    return json_decode($this->load->view($this->setting_module,array(),true));
  }
}
