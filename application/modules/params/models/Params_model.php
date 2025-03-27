<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Params_model extends MY_Model{

  public function __construct() {
    parent::__construct();
  }

  /**
   * Obtém lista dos itens do parâmetro
   *
   * @param   none
   * @return  array/false
   */
  public function getParams(){
    $this->db->select( 'id' );
    $this->db->select( 'parametro' );
    $this->db->from( 'parametro' );
    $this->db->order_by( 'parametro' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }






  /**
   * Obtém dados de um parâmetro
   *
   * @param   int - $intID (ID do parametro)
   * @return  array/false
   */
  public function getParam( $intID ){
    $this->db->select( 'id' );
    $this->db->select( 'parametro' );
    $this->db->from( 'parametro' );
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
  public function setParam( $arrData ){
    $arrNovo['parametro'] = $arrData['parametro'];
    $this->db->insert( 'parametro', $arrNovo );
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
  public function updateParam( $arrData ){

    $this->db->set( 'dt_alteracao', $arrData['dt_alteracao'] ); 
    $this->db->set( 'parametro', $arrData['parametro'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'parametro' );
    return 0 !== $this->db->affected_rows();
  }






  /**
   * Obtém lista com os detalhes do parâmetro
   *
   * @param   int  - $intID (ID do parametro)
   * @return  array/false
   */
  public function getParamDetails( $intID ){
    $this->db->select( 'id' );
    $this->db->select( 'id_parametro' );
    $this->db->select( 'status' );
    $this->db->select( 'parametro' );
    $this->db->from( 'parametro_detalhe' );
    $this->db->where( 'id_parametro', $intID );
    $this->db->order_by( 'parametro' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }






  /**
   * Inclui dados com os detalhes de um parâmetro
   *
   * @param   int  - $arrData[id_parametro] (ID do parâmetro)
   * @param   str  - $arrData[parametro] (Nome do parâmetro)
   * @return  bool
   */
  public function setParamDetail( $arrData ){
    $arrNovo['id_parametro'] = $arrData['id_parametro'];
    $arrNovo['parametro'] = $arrData['parametro'];
    $this->db->insert( 'parametro_detalhe', $arrNovo );
    $intId = $this->db->insert_id();
    return is_numeric( $intId );
  }






  /**
   * Obtém dados do detalhe de um parâmetro
   *
   * @param   int - $arrData[id] (ID do parametro)
   * @param   int - $arrData[id_parametro] (ID do parametro mestre)
   * @return  array/false
   */
  public function getParamDetail( $arrData ){
    $this->db->select( 'id' );
    $this->db->select( 'id_parametro' );
    $this->db->select( 'parametro' );
    $this->db->select( 'status' );
    $this->db->from( 'parametro_detalhe' );
    $this->db->where( 'id',  $arrData['id'] );
    $this->db->where( 'id_parametro',  $arrData['id_parametro'] );
    $q = $this->db->get();
    return $q->num_rows() === 1 ? $q->result_array()[0] : false;
  }  






  /**
   * Atualiza dados do detalhe de um parâmetro
  *
   * @param   int  - $arrData[id] (ID do parametro)
   * @param   int  - $arrData[id_parametro] (ID do parâmetro)
   * @param   date - $arrData[dt_alteracao] (Data da alteração do parametro)
   * @param   bool - $arrData[parametro] (Nome do parametro)
   * @return  bool
   */
  public function updateParamDetail( $arrData ){

    $this->db->set( 'dt_alteracao', $arrData['dt_alteracao'] ); 
    $this->db->set( 'parametro', $arrData['parametro'] );
    $this->db->set( 'status', $arrData['status'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->where( 'id_parametro', $arrData['id_parametro'] );
    $this->db->update( 'parametro_detalhe' );
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
  public function udpateDetailStatus( $arrData ){
    $this->db->set( 'status', $arrData['status'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->where( 'id_parametro', $arrData['id_parametro'] );
    $this->db->update( 'parametro_detalhe' );
    return 0 !== $this->db->affected_rows();
  } 






  /**
   * Obtém lista de necessidades especiais
   *
   * @param   int  - $arrData[id] (ID do parâmetro)
   * @return  array/false
   */
  public function getDisabilities(){
    $this->db->select( 'id' );
    $this->db->select( 'parametro as necessidade' );
    $this->db->from( 'parametro_detalhe' );
    $this->db->where( 'id_parametro', $this->config->item('nec_especiais') );
    $this->db->where( 'status', '1' );
    $this->db->order_by( 'id' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  } 






  /**
   * Obtém lista de necessidades especiais
   *
   * @param   int  - $arrData[id] (ID do parâmetro)
   * @return  array/false
   */
  public function getDescritors(){
    $this->db->select( 'id' );
    $this->db->select( 'parametro as descritor' );
    $this->db->from( 'parametro_detalhe' );
    $this->db->where( 'id_parametro', $this->config->item('descritores') );
    $this->db->where( 'status', '1' );
    $this->db->order_by( 'id' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  } 
    
}