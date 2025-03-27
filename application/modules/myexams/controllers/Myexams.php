<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Myexams extends Private_Controller {

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
		$this->_setPageTitle( $this->lang->line('page_title_myexams') );
    $this->load->model('exams/exams_model');
		$this->data['items'] = $this->exams_model->getMyExams( $this->data['user']['id'] );
		$this->load->view('main/header_view', $this->data);
		$this->load->view('myexams_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}

}