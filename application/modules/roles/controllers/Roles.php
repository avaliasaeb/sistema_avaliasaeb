<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends Private_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Exibe lista de perfis de acesso
	 *
	 * @param 	none
	 * @return 	void
	 */
	public function index(){
		$this->_setPageTitle( $this->lang->line('page_title_roles') );
    $this->load->model('roles_model');
		$this->data['items'] = $this->roles_model->getRoles();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('roles_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}

}
