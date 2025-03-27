<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends Private_Controller {

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
		$this->_setPageTitle( $this->lang->line('page_title_teachers') );
    $this->load->model('teachers_model');
		$this->data['items'] = $this->teachers_model->getTeachers();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('teachers_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}

}