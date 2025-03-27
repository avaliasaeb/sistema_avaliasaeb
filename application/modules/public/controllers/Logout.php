<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Exibe tela de logout
	 *
	 * @param 	none
	 * @return 	void
	 */
	public function index(){
		$strIdioma = $this->_getSessionItem( 'idioma' );
    $this->session->sess_destroy();

		$this->_setPageTitle( $this->lang->line('page_title_logout') );
		$this->load->view('header_view', $this->data);
		$this->load->view('logout_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

}
