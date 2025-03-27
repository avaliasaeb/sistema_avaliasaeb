<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends MY_Controller {

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
    $this->session->sess_destroy();
		$this->_setPageTitle( $this->lang->line('page_title_erro404') );
		$this->load->view('header_view', $this->data);
		$this->load->view('error404_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

}
