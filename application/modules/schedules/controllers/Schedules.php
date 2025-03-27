<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Schedules extends Private_Controller {

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
		$this->_setPageTitle( $this->lang->line('page_title_schedules') );
    $this->load->model('schedules_model');
		$this->data['items'] = $this->schedules_model->getSchedules();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('schedules_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}

}