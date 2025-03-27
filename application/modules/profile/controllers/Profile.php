<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Private_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Exibe os dados do perfil do usuário logado
	 *
	 * @param 	none
	 * @return 	void
	 */
	public function index(){
		$this->_setPageTitle( $this->lang->line('page_title_profile') );

    $this->load->model('profile_model');
    $this->load->model('params/params_model');
		$this->data['item'] = $this->profile_model->getUserProfile( $this->data['user']['id'] );
		$this->data['list_3'] = $this->params_model->getDisabilities();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('profile_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Atualiza os dados cadastrais do perfil do usuário logado
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function update(){
    $arrData['id'] = $this->data['user']['id'];
    $arrData['nome'] = $this->_input('input_nome');
    $arrData['id_necessidade'] = $this->_input('input_necessidade');
    $arrData['email'] = mb_strtolower( $this->_input('input_email') );
    $arrData['idioma'] = $this->_input('input_idioma');
    $arrData['dt_alteracao'] = date( 'Y-m-d H:i:s', time() );

    $this->load->model('profile_model');
    $bolAtualizou = $this->profile_model->updateProfile( $arrData );

    if( false === $bolAtualizou ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_4')
	    );

	  }else{
	    $this->load->model('users/users_model');
	    $arrUsuario = $this->users_model->getAutenticatedUser( $arrData );
	  	$this->_setSessionItem( 'usuario_logado', $arrUsuario );

	    $output = array(
	       'status'	=> true
	      ,'msg' 		=> $this->lang->line('ajax_6')
	      ,'href' 	=> site_url( $this->router->fetch_module() )
	    );

	  }

    $this->_output( $output );
	}






	/**
	 * Atualiza usuário e senha do perfil do usuário logado
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function updatelogin(){
    $this->load->helper('password');

    $arrData['id'] = $this->data['user']['id'];
    $arrData['login'] = $this->_input('input_login');
    $arrData['senha'] = encryptPassword( $this->_input('input_senha') );
    $arrData['nova_senha'] = $this->_input('input_senha');
    $arrData['confirma_senha'] = $this->_input('input_confirma_senha');
    $arrData['dt_alteracao'] = date( 'Y-m-d H:i:s', time() );

    if( $arrData['nova_senha'] !== $arrData['confirma_senha'] ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_7')
	    );

	    $this->_output( $output );
    }

    $this->load->model('profile_model');
    $this->load->model('users/users_model');
    if( true === $this->users_model->anotherLoginAlreadyExists( $arrData ) ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_8')
	    );

	    $this->_output( $output );
    }

    $bolAtualizou = $this->profile_model->updateProfileLogin( $arrData );

    if( false === $bolAtualizou ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_4')
	    );

	  }else{
	    $output = array(
	       'status'	=> true
	      ,'msg' 		=> $this->lang->line('ajax_6')
	      ,'href' 	=> site_url( $this->router->fetch_module() )
	    );

	  }

    $this->_output( $output );
	}


}