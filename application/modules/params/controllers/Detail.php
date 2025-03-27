<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends Private_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Visualiza os detalhes do parâmetro
	 *
	 * @param 	int | default null - $intID (ID do parâmetro)
	 * @return 	void
	 */
	public function index( $intID = null ){
		if( null == $intID ){
			redirect( site_url( $this->router->fetch_module() ) );
		}

    $this->load->model('params_model');
		$this->data['list'] = $this->params_model->getParam( $intID );
		$this->data['items'] = $this->params_model->getParamDetails( $intID );

		$this->_setPageTitle( $this->lang->line('page_title_param_detail') . $this->data['list']['parametro'] );

		$this->load->view('main/header_view', $this->data);
		$this->load->view('param_datail_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Exibe formulário para incluir detalhes do parâmetro
	 *
	 * @param 	int | default null - $intID (ID do parâmetro)
	 * @param 	post
	 * @return 	json
	 */
	public function insert( $intID = null ){
		if( null == $intID ){
			redirect( site_url( $this->router->fetch_module() ) );
		}

    $this->load->model('params_model');
		$this->data['list'] = $this->params_model->getParam( $intID );

		$this->_setPageTitle( $this->lang->line('page_title_param_detail_add') . $this->data['list']['parametro'] );

		$this->load->view('main/header_view', $this->data);
		$this->load->view('add_detail_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Exibe formulário para alterar detalhes do parâmetro
	 *
	 * @param 	int | default null - $intIDParametro (ID do parâmetro)
	 * @param 	int | default null - $intID (ID do detalhe do parâmetro)
	 * @return 	void
	 */
	public function edit( $intIDParametro = null , $intID = null ){
		if( null == $intID ){
			redirect( site_url( $this->router->fetch_module() ) );
		}

    $this->load->model('params_model');
		$this->data['list'] = $this->params_model->getParam( $intIDParametro );

		$arrData['id'] = $intID;
		$arrData['id_parametro'] = $intIDParametro;
		$this->data['item'] = $this->params_model->getParamDetail( $arrData );

		$this->_setPageTitle( $this->lang->line('page_title_param_detail_edt') . $this->data['list']['parametro'] );

		$this->load->view('main/header_view', $this->data);
		$this->load->view('edt_detail_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Efetua processo para incluir detalhes do parâmetro
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function save(){
    $arrData['id_parametro'] = $this->_input('input_id');
    $arrData['parametro'] = $this->_input('input_parametro');

    $this->load->model('params_model');
    $bolInseriu = $this->params_model->setParamDetail( $arrData );

    if( false === $bolInseriu ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_4')
	    );

	  }else{
	    $output = array(
	       'status'	=> true
	      ,'msg' 		=> $this->lang->line('ajax_5')
	      ,'href' 	=> site_url( $this->router->fetch_module() . '/' . $this->router->fetch_class() . '/' . $arrData['id_parametro'] )
	    );

	  }

    $this->_output( $output );
	}






	/**
	 * Efetua processo para atualizar detalhes do parâmetro
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function update(){
    $arrData['id'] = $this->_input('input_id');
    $arrData['id_parametro'] = $this->_input('input_id_param');
    $arrData['parametro'] = $this->_input('input_parametro');
    $arrData['status'] = $this->_input('input_status');
    $arrData['dt_alteracao'] = date( 'Y-m-d H:i:s', time() );

    $this->load->model('params_model');
    $bolInseriu = $this->params_model->updateParamDetail( $arrData );

    if( false === $bolInseriu ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_4')
	    );

	  }else{
	    $output = array(
	       'status'	=> true
	      ,'msg' 		=> $this->lang->line('ajax_6')
	      ,'href' 	=> site_url( $this->router->fetch_module() . '/' . $this->router->fetch_class() . '/' . $arrData['id_parametro'] )
	    );

	  }

    $this->_output( $output );
	}






	/**
	 * Efetua processo para habilitar detalhes do parâmetro
	 *
	 * @param 	int | default null - $intIDParametro (ID do parâmetro)
	 * @param 	int | default null - $intID (ID do detalhe do parâmetro)
	 * @return 	json
	 */
	public function enable( $intIDParametro = null , $intID = null ){
    $arrData['id'] = $intID;
    $arrData['id_parametro'] = $intIDParametro;
    $arrData['status'] = 1;
    $arrData['data'] = date( 'Y-m-d H:i:s', time() );

    $this->load->model('params_model');
    if( true === $this->params_model->udpateDetailStatus( $arrData ) ){
	    $output = array(
	       'status'	=> true
	      ,'msg' 		=> $this->lang->line('ajax_6')
	      ,'href' 	=> site_url( $this->router->fetch_module() . '/' . $this->router->fetch_class() . '/' . $arrData['id_parametro'] )
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
	 * Efetua processo para desabilitar detalhes do parâmetro
	 *
	 * @param 	int | default null - $intIDParametro (ID do parâmetro)
	 * @param 	int | default null - $intID (ID do detalhe do parâmetro)
	 * @return 	json
	 */
	public function disable( $intIDParametro = null , $intID = null ){
    $arrData['id'] = $intID;
    $arrData['id_parametro'] = $intIDParametro;
    $arrData['status'] = 0;

    $this->load->model('params_model');
    if( true === $this->params_model->udpateDetailStatus( $arrData ) ){
	    $output = array(
	       'status'	=> true
	      ,'msg' 		=> $this->lang->line('ajax_6')
	      ,'href' 	=> site_url( $this->router->fetch_module() . '/' . $this->router->fetch_class() . '/' . $arrData['id_parametro'] )
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