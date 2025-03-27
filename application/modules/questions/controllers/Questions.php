<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends Private_Controller {

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
		$this->_setPageTitle( $this->lang->line('page_title_questions') );
    $this->load->model('questions_model');
		$this->data['items'] = $this->questions_model->getQuestions();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('questions_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}

}