<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Params extends Private_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Exibe lista de parâmetros
	 *
	 * @param 	none
	 * @return 	void
	 */
	public function index(){
		$this->_setPageTitle( $this->lang->line('page_title_params') );
    $this->load->model('params_model');
		$this->data['items'] = $this->params_model->getParams();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('params_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}

}
