<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Roles_model extends MY_Model{

  public function __construct() {
    parent::__construct();
  }

  /**
   * Obtém lista com todos os perfis de acesso que sejam editáveis
   *
   * @param   none
   * @return  array/false
   */
  public function getRoles(){
    $this->db->select( 'id' );
    $this->db->select( 'perfil' );
    $this->db->select( 'permissoes' );
    $this->db->select( 'status' );
    $this->db->from( 'perfil' );
    $this->db->where( 'editavel', 1 );
    $this->db->order_by( 'perfil' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }





  /**
   * Obtém lista com todos os perfis de acesso que sejam editáveis e ativos
   *
   * @param   none
   * @return  array/false
   */
  public function getActiveRoles(){
    $this->db->select( 'id' );
    $this->db->select( 'perfil' );
    $this->db->select( 'permissoes' );
    $this->db->select( 'status' );
    $this->db->from( 'perfil' );
    $this->db->where( 'editavel', 1 );
    $this->db->order_by( 'perfil' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }






  /**
   * Obtém dados de um perfil
   *
   * @param   int - $intID (ID do perfil)
   * @return  array/false
   */
  public function getRole( $intID ){
    $this->db->select( 'id' );
    $this->db->select( 'perfil' );
    $this->db->select( 'permissoes' );
    $this->db->select( 'status' );
    $this->db->from( 'perfil' );
    $this->db->where( 'editavel', 1 );
    $this->db->where( 'id', $intID );
    $this->db->order_by( 'perfil' );
    $q = $this->db->get();
    return $q->num_rows() === 1 ? $q->result_array()[0] : false;
  }






  /**
   * Inclui dados de um perfil
   *
   * @param   bool - $arrData[status] (Status do perfil)
   * @param   str  - $arrData[perfil] (Nome do perfil)
   * @param   str  - $arrData[roles] (IDs das permissões)
   * @param   str  - $arrData[permissoes] (Permissões do perfil)
   * @return  bool
   */
  public function setRole( $arrData ){
    $arrNovo['status'] = $arrData['status'];
    $arrNovo['perfil'] = $arrData['perfil']; 
    $arrNovo['permissoes'] = $arrData['permissoes'];
    $this->db->insert( 'perfil', $arrNovo );
    $intId = $this->db->insert_id();
    return is_numeric( $intId );
  }  






  /**
   * Atualiza dados do perfil de acesso
   *
   * @param   int  - $arrData[id] (ID do perfil)
   * @param   date - $arrData[dt_alteracao] (Data da alteração do perfil)
   * @param   bool - $arrData[status] (Status do perfil)
   * @param   str  - $arrData[perfil] (Nome do perfil)
   * @param   str  - $arrData[roles] (IDs das regras de permissão)
   * @param   str  - $arrData[permissoes] (Regras do perfil)
   * @param   int  - $arrData[id_perfil] (ID do perfil de acesso do usuário)
   * @return  bool
   */
  public function updateRole( $arrData ){

    $this->db->set( 'dt_alteracao', $arrData['dt_alteracao'] ); 
    $this->db->set( 'status', $arrData['status'] );
    $this->db->set( 'perfil', $arrData['perfil'] );
    $this->db->set( 'permissoes', $arrData['permissoes'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'perfil' );
    return 0 !== $this->db->affected_rows();
  }






  /**
   * Atualiza status do perfil de acesso
   *
   * @param   int  - $arrData[id] (ID do perfil de acesso)
   * @param   bool - $arrData[status] (Status do perfil de acesso)
   */
  public function udpateStatus( $arrData ){
    $this->db->set( 'status', $arrData['status'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'perfil' );
    return 0 !== $this->db->affected_rows();
  }  






  /**
   * Obtém lista com todos as permissões dispóníveis
   *
   * @param   none
   * @return  array/false
   */
  public function getPermissions(){
    $this->db->select( 'id' );
    $this->db->select( 'descricao' );
    $this->db->select( 'permissao' );
    $this->db->from( 'permissao' );
    $this->db->where( 'status', 1 );
    $this->db->order_by( 'id' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }
}