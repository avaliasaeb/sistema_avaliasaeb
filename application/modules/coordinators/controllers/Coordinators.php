<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinators extends Private_Controller {

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
		$this->_setPageTitle( $this->lang->line('page_title_coordinators') );
    $this->load->model('coordinators_model');
		$this->data['items'] = $this->coordinators_model->getCoordinators();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('coordinators_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}

}