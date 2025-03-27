<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Exams extends Private_Controller {

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
		$this->_setPageTitle( $this->lang->line('page_title_exams') );
    $this->load->model('exams_model');
		$this->data['items'] = $this->exams_model->getExams();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('exams_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}

}