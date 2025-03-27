<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model{	
  function __construct(){
		parent::__construct();
	}

  /**
   * Registra logo do sistema
   *
   * @param   str  - $arrData[user] (Dados do usuário)
   * @param   str  - $arrData[uri] (URI acessada)
   * @param   str  - $arrData[input] (Dados enviados de formulário)
   * @return  bool
   */
  public function setLog( $arrData ){
    $arrNovo['user'] = $arrData['user']; 
    $arrNovo['uri'] = $arrData['uri'];
    $arrNovo['input'] = $arrData['input'];
    $this->db->insert( 'log', $arrNovo );
    $intId = $this->db->insert_id();
    return is_numeric( $intId );
  }


  public function getLanguage( $idioma ){
    $this->db->select( 'chave' );
    $this->db->select( $idioma );
    $this->db->from( 'idioma' );
    $this->db->order_by( 'chave' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }
}