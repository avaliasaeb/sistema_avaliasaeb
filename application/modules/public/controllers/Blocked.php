<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blocked extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Exibe tela de bloqueio de usuário
	 *
	 * @param 	none
	 * @return 	void
	 */
	public function index(){
		$this->_setPageTitle( $this->lang->line('page_title_blocked') );
		$this->load->view('header_view', $this->data);
		$this->load->view('blocked_view', $this->data);
		$this->load->view('footer_view', $this->data);
    $this->session->sess_destroy();
	}

}
