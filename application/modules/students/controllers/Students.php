<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends Private_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Exibe lista de usuários
	 *
	 * @param 	none
	 * @return 	void
	 */
	public function index(){
		$this->_setPageTitle( $this->lang->line('page_title_students') );
    $this->load->model('students_model');
		$this->data['items'] = $this->students_model->getStudents();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('students_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}

}