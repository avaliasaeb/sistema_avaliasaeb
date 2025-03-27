<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Classrooms extends Private_Controller {

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
		$this->_setPageTitle( $this->lang->line('page_title_classrooms') );
    $this->load->model('classrooms_model');
		$this->data['items'] = $this->classrooms_model->getClassrooms();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('classrooms_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}

}
