<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Param extends Private_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Visualiza os dados do parâmetro
	 *
	 * @param 	int | default null - $intID (ID do parâmetro)
	 * @return 	void
	 */
	public function index( $intID = null ){
		if( null == $intID ){
			redirect( site_url( $this->router->fetch_module() ) );
		}

		$this->_setPageTitle( $this->lang->line('page_title_param') );
    $this->load->model('params_model');
		$this->data['item'] = $this->params_model->getParam( $intID );

		$this->load->view('main/header_view', $this->data);
		$this->load->view('param_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Exibe formulário para incluir novo parâmetro
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function insert(){
		$this->_setPageTitle( $this->lang->line('page_title_param_add') );
		$this->load->view('main/header_view', $this->data);
		$this->load->view('add_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Exibe formulário para alterar parâmetro
	 *
	 * @param 	int | default null - $intID (ID do parâmetro)
	 * @return 	void
	 */
	public function edit( $intID = null ){
		if( null == $intID ){
			redirect( site_url( $this->router->fetch_module() ) );
		}

		$this->_setPageTitle( $this->lang->line('page_title_param_edt') );
    $this->load->model('params_model');
		$this->data['item'] = $this->params_model->getParam( $intID );

		$this->load->view('main/header_view', $this->data);
		$this->load->view('edt_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Efetua processo para incluir novo parâmetro
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function save(){

    $arrData['parametro'] = $this->_input('input_parametro');

    $this->load->model('params_model');
    $bolInseriu = $this->params_model->setParam( $arrData );

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
	 * Efetua processo para atualizar parâmetro
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function update(){

    $arrData['id'] = $this->_input('input_id');
    $arrData['parametro'] = $this->_input('input_parametro');
    $arrData['dt_alteracao'] = date( 'Y-m-d H:i:s', time() );

    $this->load->model('params_model');
    $bolInseriu = $this->params_model->updateParam( $arrData );

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

}