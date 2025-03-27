<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Myexam extends Private_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Exibe lista de usuários
	 *
	 * @param 	none
	 * @return 	void
	 */
	public function index( $agenda, $prova, $detalhe ){
		$this->_setPageTitle( $this->lang->line('page_title_myexam') );
    $this->load->model('exams/exams_model');
		$this->data['items'] = $this->exams_model->getMyExam( $this->data['user']['id'], $agenda, $prova, $detalhe );

		if( false === $this->data['items'] ){
			redirect( site_url('myexams') );
		}

		$this->data['item'] = $this->exams_model->getExam( $prova );

		$this->load->view('main/header_view', $this->data);
		$this->load->view('myexam_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}



	/**
	 * Efetua processo para incluir novo usuário
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function save(){
    $arrData['dt_realizado'] = date( 'Y-m-d H:i:s', time() );
    $arrData['id_usuario'] = $this->_input('teste')[0];
    $arrData['id_prova'] = $this->_input('teste')[1];
    $arrData['id_agenda'] = $this->_input('teste')[2];
    $arrData['id_detalhe'] = $this->_input('teste')[3];
    $arrData['questao'] = $this->_input('questao');
    $arrData['resposta'] = [];

    foreach( $arrData['questao'] as $key => $val ){
    	array_push( $arrData['resposta'], $this->_input('resposta_' . $key)[0] );
    }

    $this->load->model('exams/exams_model');
		$validaProva = $this->exams_model->getMyExam( $arrData['id_usuario'], $arrData['id_agenda'], $arrData['id_prova'], $arrData['id_detalhe'] );

		if( false === $validaProva || $arrData['id_usuario'] != $this->data['user']['id'] ){
	    $output = array(
	       'status'	=> false
	      ,'msg' 		=> $this->lang->line('ajax_4')
	      ,'href' 	=> site_url( $this->router->fetch_module() )
	    );
		}

    $bolInseriu = $this->exams_model->setMyExam( $arrData );

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

}