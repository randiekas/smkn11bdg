<?php
class M_API extends CI_Model{
  function __construct()
  {
    parent::__construct();
  }
  public function authorization()
  {
    return TRUE;
  }
  public function JSON($response)
  {
    /*
    $this->output->set_content_type('application/json');
    $this->output->set_output(json_encode($response));
    */
    echo json_encode($response);
  }
}
