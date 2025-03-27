<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Classroom extends Private_Controller {

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
    $this->load->model('classrooms_model');
		$this->data['item'] = $this->classrooms_model->getClassroom( $intID );

		$this->load->view('main/header_view', $this->data);
		$this->load->view('classroom_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Exibe formulário para incluir novo parâmetro
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function insert(){
		$this->_setPageTitle( $this->lang->line('page_title_classrooms_add') );
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

		$this->_setPageTitle( $this->lang->line('page_title_classrooms_edt') );
    $this->load->model('classrooms_model');
		$this->data['item'] = $this->classrooms_model->getClassroom( $intID );

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

    $arrData['turma'] = $this->_input('input_turma');

    $this->load->model('classrooms_model');
    $bolInseriu = $this->classrooms_model->setClassroom( $arrData );

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
    $arrData['turma'] = $this->_input('input_turma');
    $arrData['dt_alteracao'] = date( 'Y-m-d H:i:s', time() );

    $this->load->model('classrooms_model');
    $bolInseriu = $this->classrooms_model->updateClassroom( $arrData );

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
	 * Efetua processo para habilitar detalhes do parâmetro
	 *
	 * @param 	int | default null - $intIDParametro (ID do parâmetro)
	 * @param 	int | default null - $intID (ID do detalhe do parâmetro)
	 * @return 	json
	 */
	public function enable( $intID = null ){
    $arrData['id'] = $intID;
    $arrData['status'] = 1;
    $arrData['data'] = date( 'Y-m-d H:i:s', time() );

    $this->load->model('classrooms_model');
    if( true === $this->classrooms_model->udpateClassroomStatus( $arrData ) ){
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
	 * Efetua processo para desabilitar detalhes do parâmetro
	 *
	 * @param 	int | default null - $intIDParametro (ID do parâmetro)
	 * @param 	int | default null - $intID (ID do detalhe do parâmetro)
	 * @return 	json
	 */
	public function disable( $intID = null ){
    $arrData['id'] = $intID;
    $arrData['status'] = 0;

    $this->load->model('classrooms_model');
    if( true === $this->classrooms_model->udpateClassroomStatus( $arrData ) ){
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