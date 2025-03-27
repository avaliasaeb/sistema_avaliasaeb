<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends Private_Controller {

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

		$this->_setPageTitle( $this->lang->line('page_title_question') );
    $this->load->model('questions_model');
		$this->data['item'] = $this->questions_model->getQuestion( $intID );
		$this->load->view('main/header_view', $this->data);
		$this->load->view('question_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}






	/**
	 * Exibe formulário para incluir novo usuário
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function insert(){
		$this->_setPageTitle( $this->lang->line('page_title_questions_add') );
    $this->load->model('questions_model');
    $this->load->model('roles/roles_model');
    $this->load->model('params/params_model');
		$this->data['list'] = $this->params_model->getDescritors();
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
		$this->_setPageTitle( $this->lang->line('page_title_questions_edt') );
    $this->load->model('questions_model');
    $this->load->model('roles/roles_model');
    $this->load->model('params/params_model');
		$this->data['item'] = $this->questions_model->getQuestion( $intID );
		$this->data['list'] = $this->params_model->getDescritors();
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
    $arrData['id_descritor'] = $this->_input('input_descritor');
    $arrData['titulo'] = $this->_input('input_titulo');
    $arrData['enunciado'] = $this->_input('input_enunciado');
    $arrData['imagem'] = $this->_input('input_imagem');
    $arrData['resposta_1'] = $this->_input('input_resposta_1');
    $arrData['resposta_2'] = $this->_input('input_resposta_2');
    $arrData['resposta_3'] = $this->_input('input_resposta_3');
    $arrData['resposta_4'] = $this->_input('input_resposta_4');

    $this->load->model('questions_model');
    $bolInseriu = $this->questions_model->setQuestion( $arrData );

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
    $arrData['id_descritor'] = $this->_input('input_descritor');
    $arrData['titulo'] = $this->_input('input_titulo');
    $arrData['enunciado'] = $this->_input('input_enunciado');
    $arrData['imagem'] = $this->_input('input_imagem');
    $arrData['resposta_1'] = $this->_input('input_resposta_1');
    $arrData['resposta_2'] = $this->_input('input_resposta_2');
    $arrData['resposta_3'] = $this->_input('input_resposta_3');
    $arrData['resposta_4'] = $this->_input('input_resposta_4');
    $arrData['dt_alteracao'] = date( 'Y-m-d H:i:s', time() );

    $this->load->model('questions_model');
    $bolAtualizou = $this->questions_model->updateQuestion( $arrData );

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

    $this->load->model('questions_model');
    if( true === $this->questions_model->udpateStatus( $arrData ) ){
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

    $this->load->model('questions_model');
    if( true === $this->questions_model->udpateStatus( $arrData ) ){
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