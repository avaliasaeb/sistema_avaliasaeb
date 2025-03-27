<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Recover extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Exibe tela de recuperação de senha
	 *
	 * @param 	none
	 * @return 	void
	 */
	public function index(){
		$this->_setPageTitle( $this->lang->line('page_title_recover') );
		$this->load->view('header_view', $this->data);
		$this->load->view('recover_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}






	/**
	 * Efetua processo de recuperação de senha
	 *
	 * @param 	post
	 * @return 	json
	 */
	public function process(){
		$this->_setPageTitle();

    $this->load->helper('password');
    $strSenha = generatePassword();
    $arrData['login'] = $this->_input('input_login');
    $arrData['senha'] = encryptPassword( $strSenha );

    $this->load->model('public_model');
    $bolAtualizouSenha = $this->public_model->updatePassword( $arrData );

    if( true === $bolAtualizouSenha ){
    	$this->data['senha'] = $strSenha;

	    $arrData['email'] = $this->public_model->getUserEmail( $arrData );

      $arrData['to'] = $arrData['email'];
      $arrData['subject'] = $this->lang->line('email_recover_title');
      $arrData['body'] = $this->load->view( 'email/recupera_view', $this->data, true);
      $this->_sendMail( $arrData );
    }

    // exibe mensagem padrão mesmo que o login não exista.
    // isso evita que pessoas mal intencionadas tentem burlar o sistema
    if( ENVIRONMENT !== 'development' ){
	    $output = array(
	       'status' => true
	      ,'msg' => $this->lang->line('ajax_3')
	    );

	  }else{
	    $output = array(
	       'status' => true
	      ,'msg' => 'DEV: Nova Senha -> ' . $strSenha
	    );

	  }

    $this->_output( $output );
	}

	public function email(){
		 $this->load->view( 'email/recupera_view', $this->data );
	}

}