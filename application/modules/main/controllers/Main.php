<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Private_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 *	Exibe a tela do painel principal para o usuário
	 *
	 * @param none
	 * @return void
	 */
	public function index(){
		$this->_setPageTitle( $this->lang->line('page_title_main') );

		$this->data['atualiza_perfil'] = ! $this->_isUserLoggedInUpdated();
		
		$this->load->view('header_view', $this->data);
		$this->load->view('painel_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

}
