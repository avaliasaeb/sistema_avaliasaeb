<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends Private_Controller {

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
		$this->_setPageTitle( $this->lang->line('page_title_schedule') );
    $this->load->model('schedules_model');
		$this->data['lista'] = $this->schedules_model->getSchedule( $intID );
		$this->data['items'] = $this->schedules_model->getScheduleDetail( $intID );
		$this->load->view('main/header_view', $this->data);
		$this->load->view('schedule_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Exibe formulário para incluir novo usuário
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function insert(){
		$this->_setPageTitle( $this->lang->line('page_title_schedule_add') );
    $this->load->model('exams/exams_model');
		$this->data['lista'] = $this->exams_model->getActiveExams();
    $this->load->model('students/students_model');
		$this->data['items'] = $this->students_model->getStudents();
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
		$this->_setPageTitle( $this->lang->line('page_title_exams_edt') );
    $this->load->model('schedules_model');
		$this->data['item'] = $this->schedules_model->getSchedule( $intID );
		$this->data['list'] = $this->schedules_model->getScheduleStudents( $intID );
    $this->load->model('exams/exams_model');
		$this->data['lista'] = $this->exams_model->getActiveExams();
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
    $arrData['id_prova'] = $this->_input('input_prova');
    $arrData['dt_inicio'] = $this->_input('input_dtinicio');
    $arrData['dt_fim'] = $this->_input('input_dtfim');
    $arrData['alunos'] = $this->_input('input_aluno');

    $this->load->model('schedules_model');
    $bolInseriu = $this->schedules_model->setSchedule( $arrData );

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
    $arrData['id_prova'] = $this->_input('input_prova');
    $arrData['dt_inicio'] = $this->_input('input_dtinicio');
    $arrData['dt_fim'] = $this->_input('input_dtfim');
    $arrData['alunos'] = $this->_input('input_aluno');

    $this->load->model('schedules_model');
    $bolAtualizou = $this->schedules_model->updateSchedule( $arrData );

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

    $this->load->model('schedules_model');
    if( true === $this->schedules_model->udpateStatus( $arrData ) ){
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






	public function disable( $intID = null ){
		if( null == $intID || $intID == $this->data['user']['id'] ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_9')
	    );
		}

    $arrData['id'] = $intID;
    $arrData['status'] = 0;

    $this->load->model('schedules_model');
    if( true === $this->schedules_model->udpateStatus( $arrData ) ){
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