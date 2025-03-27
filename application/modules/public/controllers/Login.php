<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Exibe tela de login
	 *
	 * @param 	none
	 * @return 	void
	 */
	public function index(){
		$this->_setPageTitle( $this->lang->line('page_title_login') );
		$this->load->view('header_view', $this->data);
		$this->load->view('login_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}






	/**
	 * Efetua o processo de validação de credenciais
	 * para acessar o sistema
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function auth(){
    $this->load->helper('password');
    
    $arrData['login'] = $this->_input('input_login');
    $arrData['senha'] = encryptPassword( $this->_input('input_senha') );
    $arrData['dt_login'] = date( 'Y-m-d H:i:s', time() );

    $this->load->model('public_model');
    $this->public_model->updateLoginData( $arrData );
    $this->load->model('users/users_model');
    $arrUsuario = $this->users_model->getAutenticatedUser( $arrData );

    if( false === $arrUsuario ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_1')
	    );

	  }else{
	  	$this->_setSessionItem( 'usuario_logado', $arrUsuario );

	    $output = array(
	       'status'	=> true
	      ,'msg' 		=> $this->lang->line('ajax_2')
	      ,'href' 	=> site_url('main')
	    );

	  }

    $this->_output( $output );
	}

}