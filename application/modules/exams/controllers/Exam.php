<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends Private_Controller {

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
		$this->_setPageTitle( $this->lang->line('page_title_exam') );
    $this->load->model('exams_model');
		$this->data['item'] = $this->exams_model->getExam( $intID );
		$this->data['list'] = $this->exams_model->getExamQuestions( $intID );
		$this->load->view('main/header_view', $this->data);
		$this->load->view('exam_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Exibe formulário para incluir novo usuário
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function insert(){
		$this->_setPageTitle( $this->lang->line('page_title_exams_add') );
    $this->load->model('questions/questions_model');
		$this->data['items'] = $this->questions_model->getActiveQuestions();
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
    $this->load->model('exams_model');
		$this->data['item'] = $this->exams_model->getExam( $intID );

		if( $this->data['item']['alteravel'] != 1 ){
			site_url( $this->router->fetch_module() );
		}

		$this->data['list'] = $this->exams_model->getExamQuestions( $intID );
    $this->load->model('questions/questions_model');
		$this->data['items'] = $this->questions_model->getActiveQuestions();
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
    $arrData['id_usuario'] = $this->data['user']['id'];
    $arrData['titulo'] = $this->_input('input_titulo');
    $arrData['descricao'] = $this->_input('input_descricao');
    $arrData['questoes'] = $this->_input('input_questao');

    $this->load->model('exams_model');
    $bolInseriu = $this->exams_model->setExam( $arrData );

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
    $arrData['id_usuario'] = $this->data['user']['id'];
    $arrData['titulo'] = $this->_input('input_titulo');
    $arrData['descricao'] = $this->_input('input_descricao');
    $arrData['questoes'] = $this->_input('input_questao');

    $this->load->model('exams_model');
    $bolAtualizou = $this->exams_model->updateExam( $arrData );

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

    $this->load->model('exams_model');
    if( true === $this->exams_model->udpateStatus( $arrData ) ){
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

    $this->load->model('exams_model');
    if( true === $this->exams_model->udpateStatus( $arrData ) ){
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