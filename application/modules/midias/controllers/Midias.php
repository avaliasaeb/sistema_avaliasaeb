<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Midias extends Private_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Exibe lista de usuários
	 *
	 * @param 	none
	 * @return 	void
	 */
	public function index(){
		$this->_setPageTitle( $this->lang->line('page_title_midias') );

		$this->data['items'] = $this->_midiaList();
		$this->load->view('main/header_view', $this->data);
		$this->load->view('midias_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}



	/**
	 * Efetua processo para enviar arquivos do evento
	 *
	 * @param 	post
	 * @return 	void
	 */
	public function upload(){

		$upload['upload_path'] = $this->config->item('upload_path');
		$upload['allowed_types'] = $this->config->item('allowed_types');
		$upload['encrypt_name'] = TRUE;
		$this->load->library( 'upload', $upload );

		if( false === $this->upload->do_upload('input_media') ){
			redirect( 'midias/midias/' . $arrData['id'] . '/?erro=' . $this->upload->display_errors('','') );
	  }else{
	  	$file = $this->upload->data();
			redirect( 'midias/' );
    }

	}	






	protected function _midiaList(){
		
		$results = array();
		$handler = opendir( $this->config->item('upload_path') );
		
		while ( $file = readdir($handler) ){
			if( $file != '.' && $file != '..' ){
				$results[] = [ 
					'file' => $file, 
					'path' => site_url() . 'files/protected/' . $file 
				];
			};
		}
		closedir( $handler );
		return count( $results ) > 0 ? $results : false ;
		
	}	







}