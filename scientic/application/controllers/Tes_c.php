<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tes_c extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct()
	 {
		 parent::__construct();
	 }
	 /**
		* get setting table from json
		*
		*
		*
		* @return Response Json
		*/
	public function index()
 	{
		echo "tes";
 	}
	public function create_source()
	{
		$data = "asdfadsf";
		$group="setting";
		$module="modul";

		$controllers_path = "application/modules/".$group."/controllers/";
		$models_path = "application/modules/".$group."/models/";
		$views_path = "application/modules/".$group."/views/".$group."/";


		$controller_source = $this->controller_source();
		//write_file($controllers_path.$module.".php","ajksdfhasdhfkj");
		write_file($controllers_path.$module.".php",$controller_source);

	}
	public function controller_source()
	{
		ob_start();
		?>


		&#60?php
		defined('BASEPATH') OR exit('No direct script access allowed');

		class group_modul extends CI_Controller {

			/**
			 * Index Page for this controller.
			 *
			 * Maps to the following URL
			 * 		http://example.com/index.php/welcome
			 *	- or -
			 * 		http://example.com/index.php/welcome/index
			 *	- or -
			 * Since this controller is set as the default controller in
			 * config/routes.php, it's displayed at http://example.com/
			 *
			 * So any other public methods not prefixed with an underscore will
			 * map to /index.php/welcome/<method_name>
			 * @see http://codeigniter.com/user_guide/general/urls.html
			 */
			 function __construct()
			 {
				 parent::__construct();
				 $this->load->model("m_module_group","model");
			 }


			/**
		   * Display a listing of the resource.
		   *
		   * @return Response
		   */
			public function index()
			{
				$data["content"] = "module_group/index";
		    $this->load->view("dashboard2",$data);
			}

			/**
			 * Display Json Data in table customer
			 *
			 *
			 *
			 * @return Response Json
			 */
			public function grid_data()
			{
					$this->model->read();
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
					$this->model->update();
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
					$this->model->delete();

			}
			/**
			 * Store a newly created resource in storage.
			 *
			 * @return Response Json
			 */
			public function store()
			{
					// call create function from model to create new rows
					$this->model->create();
			}
		}



		<?php
		return ob_get_clean();


	}

}
