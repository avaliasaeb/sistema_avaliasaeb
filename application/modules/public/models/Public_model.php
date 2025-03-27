<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Public_model extends MY_Model{

  public function __construct() {
    parent::__construct();
  }




  /**
   * Atualiza dados de login de um usuário
   *
   * @param   str  - $arrData['login'] (Login)
   * @param   str  - $arrData['senha'] (Senha)
   * @return  bool
   */
  public function updatePassword( $arrData ){
    $this->db->set( 'senha', $arrData['senha'] ); 
    $this->db->where( 'login', $arrData['login'] );
    $this->db->where( 'status', 1 );
    $this->db->update( 'usuario' );
    return 0 !== $this->db->affected_rows();
  }






  /**
   * Atualiza dados de login de um usuário
   *
   * @param   str  - $arrData['login'] (Login)
   * @param   str  - $arrData['senha'] (Senha)
   * @return  bool
   */
  public function updateLoginData( $arrData ){
    $this->db->set( 'dt_login', $arrData['dt_login'] ); 
    $this->db->where( 'login', $arrData['login'] );
    $this->db->where( 'senha', $arrData['senha']  );
    $this->db->update( 'usuario' );
    return 0 !== $this->db->affected_rows();
  }





  /**
   * Obtém email do usuário para envio da nova senha
   *
   * @param   str  - $arrData['login'] (Login)
   * @return  bool
   */
  public function getUserEmail( $arrData ){
    $this->db->select( 'email' );
    $this->db->from( 'usuario' );
    $this->db->where( 'login', $arrData['login'] );
    $this->db->where( 'status', 1 );
    $q = $this->db->get();
    return $q->num_rows() === 1 ? $q->result_array()[0]['email'] : false;
  }

}