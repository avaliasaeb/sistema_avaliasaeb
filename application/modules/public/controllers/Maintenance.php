<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends MY_Controller {

	function __construct(){
    $this->config->set_item( 'maintenance', FALSE );
		parent::__construct();
	}

	/**
	 * Exibe tela de manutenção
	 *
	 * @param 	none
	 * @return 	void
	 */
	public function index(){
		$this->_setPageTitle( $this->lang->line('page_title_maintenance') );
		$this->load->view('header_view', $this->data);
		$this->load->view('maintenance_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

}
