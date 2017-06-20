<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Module extends CI_Model{
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
    $this->output->set_content_type('application/json');
    $this->output->set_output(json_encode($data));
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
    $this->output->set_content_type('application/json');
    $this->output->set_output(json_encode($data));
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
    $this->output->set_content_type('application/json');
    $this->output->set_output(json_encode($data));
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
    $this->output->set_content_type('application/json');
    $this->output->set_output(json_encode($data));
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

  /**
   * create module to json
   *
   *
   *
   * @return none
   */
  public function createKeyJson()
  {
	  $modules = array();
		$this->db->where("na","A");
		$this->db->where("view","1");
		foreach($this->db->get("view_module_leve")->result() as $row)
		{
			$this->db->where("slug IS"," NOT NULL",FALSE);
			$this->db->where("id",$row->module_id);
			$this->db->order_by("sort_number","ASC");
			$Q = $this->db->get("module");
			if($Q->num_rows()>=1)
			{
				$module = array();
						$module["level_id"] = $row->level_id;
						$m = $Q->last_row();
						$module["id"] = $m->id;

						$module["parent_id"] = $m->parent_id;
						$module["name"] =  $m->name;
						$module["url"] =  $m->url;
						$module["slug"] =  $m->slug;
				$module["module_type"] =  $m->module_type;
						$module["icon"] =  $m->icon;
						$module["module"] =  TRUE;
						$modules[] = $module;
						
				if($row->view=="1")
				{
					if($m->view_url!="")
					{
						$view = explode(",",$m->view_url);
						foreach($view as $key=>$val)
						{
									$module = array();
									$module["level_id"] = $row->level_id;
									
							$module["id"] = $m->id;
							$module["parent_id"] = $m->parent_id;
									$module["url"] =  $m->url.$val;
									$module["slug"] =  $m->slug.$val;
							$module["module_type"] =  $m->module_type;
									$module["module"] =  FALSE;
									$modules[] = $module;
						}
					}
				}
				//if allow direct all function
				if($row->update=="1")
				{
					$update = explode(",",$m->update_url);
						foreach($update as $key=>$val)
						{
									$module = array();
									$module["level_id"] = $row->level_id;
									
							$module["id"] = $m->id;
							$module["parent_id"] = $m->parent_id;
									$module["url"] =  $m->url.$val;
									$module["slug"] =  $m->slug.$val;
							$module["module_type"] =  $m->module_type;
									$module["module"] =  FALSE;
									$modules[] = $module;
						}
				}
			}
		}
		$data = json_encode($modules);
		write_file("application/config/keys.json",$data);
  }
  /*public function createKeyJson()
  {
    $modules = array();
		$this->db->where("na","A");
		foreach($this->db->get("view_module_leve")->result() as $row)
		{
			$this->db->where("slug IS"," NOT NULL",FALSE);
			$this->db->where("id",$row->module_id);
			$this->db->order_by("sort_number","ASC");
			$Q = $this->db->get("module");
			if($Q->num_rows()>=1)
			{

				$module = array();
				$module["level_id"] = $row->level_id;
				$m = $Q->last_row();
				$module["id"] = $m->id;

				$module["parent_id"] = $m->parent_id;
				$module["name"] =  $m->name;
				$module["url"] =  $m->url;
				$module["slug"] =  $m->slug;
        $module["module_type"] =  $m->module_type;
				$module["icon"] =  $m->icon;
				$module["module"] =  TRUE;
				$modules[] = $module;

				//if allow direct all function

				$module = array();
				$module["level_id"] = $row->level_id;
				$row = $Q->last_row();
        $module["id"] = $m->id;
        $module["parent_id"] = $m->parent_id;
				$module["url"] =  $m->url."/$1";
				$module["slug"] =  $m->slug."/(:any)";
        $module["module_type"] =  $m->module_type;
				$module["module"] =  FALSE;
				$modules[] = $module;

			}
		}
		$data = json_encode($modules);
		write_file("application/config/keys.json",$data);
  }
	/*
  /**
   * get url field from table module_group
   *
   *
   * @param group_id int
   * @return url String
   */
  public function getGroup($parent_id)
	{
    if($parent_id!="0")
    {
  		$this->db->select("slug");
  		$this->db->where("id",$parent_id);
  		$row = $this->db->get("module")->last_row();
      $slug = $row->slug;
    }
    else{
      $slug="";
    }
		return $slug;
	}
}
