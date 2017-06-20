{open_tag_php}
defined('BASEPATH') OR exit('No direct script access allowed');

class {controller_name} extends CI_Controller {
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model("{sub_folder}/{model_name}","model");
	 }


	/**
   * Display a listing of the resource.
   *
   * @return Response
   */
	public function index()
	{
		$data["content"] = "{sub_folder}/{controller_name}/index";
    $this->load->view("parser_content",$data);
	}

}
