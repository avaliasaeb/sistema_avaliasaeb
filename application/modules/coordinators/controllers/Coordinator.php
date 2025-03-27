<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinator extends Private_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Visualiza os dados do usuário selecionado
	 *
	 * @param 	int | default null - $intID (ID do usuário)
	 * @return 	void
	 */
	public function index( $intID = null ){
		if( null == $intID ){
			redirect( site_url( $this->router->fetch_module() ) );
		}

		$this->_setPageTitle( $this->lang->line('page_title_coordinator') );
    $this->load->model('coordinators_model');
		$this->data['item'] = $this->coordinators_model->getCoordinator( $intID );
		$this->load->view('main/header_view', $this->data);
		$this->load->view('coordinator_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Exibe formulário para incluir novo usuário
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function insert(){
		$this->_setPageTitle( $this->lang->line('page_title_coordinators_add') );
    $this->load->model('coordinators_model');
    $this->load->model('roles/roles_model');
    $this->load->model('params/params_model');
		$this->data['list_4'] = $this->params_model->getDisabilities();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('add_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Exibe formulário para alterar usuário
	 *
	 * @param 	int | default null - $intID (ID do perfil)
	 * @return 	void
	 */
	public function edit( $intID = null ){
		if( null == $intID || $intID == $this->data['user']['id'] ){
			redirect( site_url( $this->router->fetch_module() ) );
		}

		$this->_setPageTitle( $this->lang->line('page_title_coordinators_edt') );
    $this->load->model('coordinators_model');
    $this->load->model('roles/roles_model');
    $this->load->model('params/params_model');
		$this->data['item'] = $this->coordinators_model->getCoordinator( $intID );
		$this->data['list_4'] = $this->params_model->getDisabilities();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('edt_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Efetua processo para incluir novo usuário
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function save(){
    $this->load->helper('password');

    $arrData['nome'] = $this->_input('input_nome');
    $arrData['email'] = mb_strtolower( $this->_input('input_email') );
    $arrData['id_perfil'] = $this->config->item('perfil_coordenador');
    $arrData['id_necessidade'] = $this->_input('input_necessidade');
    $arrData['login'] = $this->_input('input_login');
    $arrData['senha'] = encryptPassword( $this->_input('input_senha') );
    $arrData['idioma'] = $this->_input('input_idioma');
    $arrData['status'] = $this->_input('input_status');
    $arrData['dt_ativacao'] = date( 'Y-m-d H:i:s', time() );

    $this->load->model('coordinators_model');
    if( true === $this->coordinators_model->loginAlreadyExists( $arrData['login'] ) ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_8')
	    );

	    $this->_output( $output );
    }

    $bolInseriu = $this->coordinators_model->setCoordinator( $arrData );

    if( false === $bolInseriu ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_4')
	    );

	  }else{
	    $output = array(
	       'status'	=> true
	      ,'msg' 		=> $this->lang->line('ajax_5')
	      ,'href' 	=> site_url( $this->router->fetch_module() )
	    );

	  }

    $this->_output( $output );
	}






	/**
	 * Efetua processo para atualizar usuário
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function update(){
    $arrData['id'] = $this->_input('input_id');
    $arrData['nome'] = $this->_input('input_nome');
    $arrData['email'] = mb_strtolower( $this->_input('input_email') );
    $arrData['idioma'] = $this->_input('input_idioma');
    $arrData['id_perfil'] = $this->config->item('perfil_coordenador');
    $arrData['id_necessidade'] = $this->_input('input_necessidade');
    $arrData['dt_alteracao'] = date( 'Y-m-d H:i:s', time() );

		if( null == $arrData['id'] || $arrData['id'] == $this->data['user']['id'] ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_9')
	    );
		}

    $this->load->model('coordinators_model');
    $bolAtualizou = $this->coordinators_model->updateUser( $arrData );

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






	/**
	 * Atualiza usuário e senha do perfil do usuário
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function updatelogin(){
    $this->load->helper('password');

    $arrData['id'] = $this->_input('input_id');
    $arrData['login'] = $this->_input('input_login');
    $arrData['senha'] = encryptPassword( $this->_input('input_senha') );
    $arrData['nova_senha'] = $this->_input('input_senha');
    $arrData['confirma_senha'] = $this->_input('input_confirma_senha');
    $arrData['dt_alteracao'] = date( 'Y-m-d H:i:s', time() );

		if( null == $arrData['id'] || $arrData['id'] == $this->data['user']['id'] ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_9')
	    );
		}

    if( $arrData['nova_senha'] !== $arrData['confirma_senha'] ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_7')
	    );

	    $this->_output( $output );
    }

    $this->load->model('coordinators_model');
    if( true === $this->coordinators_model->anotherLoginAlreadyExists( $arrData ) ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_8')
	    );

	    $this->_output( $output );
    }

    $bolAtualizou = $this->coordinators_model->updateUserLogin( $arrData );

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






	/**
	 * Efetua processo para habilitar usuário
	 *
	 * @param 	int | default null - $intID (ID do perfil)
	 * @return 	json
	 */
	public function enable( $intID = null ){
		if( null == $intID || $intID == $this->data['user']['id'] ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_9')
	    );
		}

    $arrData['id'] = $intID;
    $arrData['status'] = 1;
    $arrData['data'] = date( 'Y-m-d H:i:s', time() );

    $this->load->model('coordinators_model');
    if( true === $this->coordinators_model->udpateStatus( $arrData ) ){
	    $output = array(
	       'status'	=> true
	      ,'msg' 		=> $this->lang->line('ajax_6')
	      ,'href'		=> site_url( $this->router->fetch_module() )
	    );

    }else{
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_4')
	    );

	  }

    $this->_output( $output );

	}






	/**
	 * Efetua processo para desabilitar usuário
	 *
	 * @param 	int | default null - $intID (ID do perfil)
	 * @return 	json
	 */
	public function disable( $intID = null ){
		if( null == $intID || $intID == $this->data['user']['id'] ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_9')
	    );
		}

    $arrData['id'] = $intID;
    $arrData['status'] = 0;
    $arrData['data'] = date( 'Y-m-d H:i:s', time() );

    $this->load->model('coordinators_model');
    if( true === $this->coordinators_model->udpateStatus( $arrData ) ){
	    $output = array(
	       'status'	=> true
	      ,'msg' 		=> $this->lang->line('ajax_6')
	      ,'href'		=> site_url( $this->router->fetch_module() )
	    );

    }else{
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_4')
	    );

	  }

    $this->_output( $output );
	}

}