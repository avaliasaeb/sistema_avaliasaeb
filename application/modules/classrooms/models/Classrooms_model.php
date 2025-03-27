<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Classrooms_model extends MY_Model{

  public function __construct() {
    parent::__construct();
  }

  /**
   * Obtém lista dos itens do parâmetro
   *
   * @param   none
   * @return  array/false
   */
  public function getClassrooms(){
    $this->db->select( 'id' );
    $this->db->select( 'dt_cadastro' );
    $this->db->select( 'dt_alteracao' );
    $this->db->select( 'turma' );
    $this->db->select( 'status' );
    $this->db->from( 'turma' );
    $this->db->order_by( 'turma' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }



  /**
   * Obtém lista dos itens do parâmetro
   *
   * @param   none
   * @return  array/false
   */
  public function getActiveClassrooms(){
    $this->db->select( 'id' );
    $this->db->select( 'dt_cadastro' );
    $this->db->select( 'dt_alteracao' );
    $this->db->select( 'turma' );
    $this->db->select( 'status' );
    $this->db->from( 'turma' );
    $this->db->where( 'status', '1' );
    $this->db->order_by( 'turma' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }





  /**
   * Obtém dados de um parâmetro
   *
   * @param   int - $intID (ID do parametro)
   * @return  array/false
   */
  public function getClassroom( $intID ){
    $this->db->select( 'id' );
    $this->db->select( 'dt_cadastro' );
    $this->db->select( 'dt_alteracao' );
    $this->db->select( 'turma' );
    $this->db->select( 'status' );
    $this->db->from( 'turma' );
    $this->db->where( 'id',  $intID );
    $q = $this->db->get();
    return $q->num_rows() === 1 ? $q->result_array()[0] : false;
  }






  /**
   * Inclui dados de um parâmetro
   *
   * @param   str  - $arrData[parametro] (Nome do parâmetro)
   * @return  bool
   */
  public function setClassroom( $arrData ){
    $arrNovo['turma'] = $arrData['turma'];
    $this->db->insert( 'turma', $arrNovo );
    $intId = $this->db->insert_id();
    return is_numeric( $intId );
  }






  /**
   * Atualiza dados do parâmetro
   *
   * @param   int  - $arrData[id] (ID do parametro)
   * @param   date - $arrData[dt_alteracao] (Data da alteração do parametro)
   * @param   bool - $arrData[parametro] (Nome do parametro)
   * @return  bool
   */
  public function updateClassroom( $arrData ){

    $this->db->set( 'dt_alteracao', $arrData['dt_alteracao'] ); 
    $this->db->set( 'turma', $arrData['turma'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'turma' );
    return 0 !== $this->db->affected_rows();
  }






  /**
   * Atualiza status do detalhe do parâmetro
   *
   * @param   int  - $arrData[id_parametro] (ID do parâmetro)
   * @param   int  - $arrData[id] (ID do detalhe do parâmetro)
   * @param   bool - $arrData[status] (Status do usuário)
   * @return  bool
   */
  public function udpateClassroomStatus( $arrData ){
    $this->db->set( 'status', $arrData['status'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'turma' );
    return 0 !== $this->db->affected_rows();
  } 

}