<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Private_Controller {

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
		$this->_setPageTitle( $this->lang->line('page_title_users') );
    $this->load->model('users_model');
		$this->data['items'] = $this->users_model->getUsers();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('users_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}

}