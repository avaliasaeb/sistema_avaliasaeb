<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends Private_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Visualiza os dados do perfil de acesso selecionado
	 *
	 * @param 	int | default null - $intID (ID do perfil)
	 * @return 	void
	 */
	public function index( $intID = null ){
		if( null == $intID ){
			redirect( site_url( $this->router->fetch_module() ) );
		}

		$this->_setPageTitle( $this->lang->line('page_title_role') );
    $this->load->model('roles_model');
		$this->data['item'] = $this->roles_model->getRole( $intID );
		$this->data['item']['permissoes'] = explode( ',', $this->data['item']['permissoes'] );
		$this->data['list'] = $this->roles_model->getPermissions();

		$this->load->view('main/header_view', $this->data);
		$this->load->view('role_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Exibe formulário para incluir novo perfil de acesso
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function insert(){
		$this->_setPageTitle( $this->lang->line('page_title_role_add') );
    $this->load->model('roles_model');
		$this->data['list'] = $this->roles_model->getPermissions();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('add_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Exibe formulário para alterar perfil de acesso
	 *
	 * @param 	int | default null - $intID (ID do perfil)
	 * @return 	void
	 */
	public function edit( $intID = null ){
		if( null == $intID ){
			redirect( site_url( $this->router->fetch_module() ) );
		}

		$this->_setPageTitle( $this->lang->line('page_title_role_edt') );
    $this->load->model('roles_model');
		$this->data['item'] = $this->roles_model->getRole( $intID );
		$this->data['item']['permissoes'] = explode( ',', $this->data['item']['permissoes'] );
		$this->data['list'] = $this->roles_model->getPermissions();

		$this->load->view('main/header_view', $this->data);
		$this->load->view('edt_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Efetua processo para incluir novo perfil de acesso
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function save(){

    $arrData['status'] = $this->_input('input_status');
    $arrData['perfil'] = $this->_input('input_nome');
    $arrData['permissoes'] = $this->_input('input_permission');

    $this->load->model('roles_model');
    $arrPermissoes = $this->roles_model->getPermissions();

    //obtém a lista de regras das permissões selecionadas
    //concatena tudo em uma string
    if( is_array( $arrData['permissoes'] ) ){
    	$arrData['permissoes'] = implode( ',', array_unique( $arrData['permissoes'] ) );
    }

    $bolInseriu = $this->roles_model->setRole( $arrData );

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
	 * Efetua processo para atualizar perfil de acesso
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function update(){
    $arrData['id'] = $this->_input('input_id');
    $arrData['status'] = $this->_input('input_status');
    $arrData['perfil'] = $this->_input('input_nome');
    $arrData['permissoes'] = $this->_input('input_permission');
    $arrData['dt_alteracao'] = date( 'Y-m-d H:i:s', time() );

    $this->load->model('roles_model');
    $arrPermissoes = $this->roles_model->getPermissions();

    //obtém a lista de regras das permissões selecionadas
    //concatena tudo em uma string
    if( is_array( $arrData['permissoes'] ) ){
    	$arrData['permissoes'] = implode( ',', array_unique( $arrData['permissoes'] ) );
    }

    $bolInseriu = $this->roles_model->updateRole( $arrData );

    if( false === $bolInseriu ){
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
	 * Efetua processo para habilitar perfil de acesso
	 *
	 * @param 	int | default null - $intID (ID do perfil)
	 * @return 	json
	 */
	public function enable( $intID = null ){
    $arrData['id'] = $intID;
    $arrData['status'] = 1;

    $this->load->model('roles_model');
    if( true === $this->roles_model->udpateStatus( $arrData ) ){
	    $output = array(
	       'status'	=> true
	      ,'msg' 		=> $this->lang->line('ajax_6')
	      ,'href'		=> site_url( $this->router->fetch_module() )
	    );

    }else{
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_4')
	      ,'eval'		=> ''
	    );

	  }

    $this->_output( $output );
	}






	/**
	 * Efetua processo para desabilitar perfil de acesso
	 *
	 * @param 	int | default null - $intID (ID do perfil)
	 * @return 	json
	 */
	public function disable( $intID = null ){
    $arrData['id'] = $intID;
    $arrData['status'] = 0;

    $this->load->model('roles_model');
    if( true === $this->roles_model->udpateStatus( $arrData ) ){
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