<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Questions_model extends MY_Model{

  public function __construct() {
    parent::__construct();
  }

  /**
   * Obtém lista com todos os usuários
   *
   * @param   none
   * @return  array/false
   */
  public function getQuestions(){
    $this->db->select( 'q.id' );
    $this->db->select( 'q.titulo' );
    $this->db->select( 'q.enunciado' );
    $this->db->select( 'q.imagem' );
    $this->db->select( 'q.status' );
    $this->db->select( 'q.resposta_1' );
    $this->db->select( 'q.resposta_2' );
    $this->db->select( 'q.resposta_3' );
    $this->db->select( 'q.resposta_4' );
    $this->db->select( 'q.id_descritor' );
    $this->db->select( 'd.parametro as descritor' );
    $this->db->from( 'questao q' );
    $this->db->join( 'parametro_detalhe d', 'q.id_descritor = d.id', 'left' ); 
    $this->db->order_by( 'q.id' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }

  /**
   * Obtém lista com todos os usuários
   *
   * @param   none
   * @return  array/false
   */
  public function getActiveQuestions(){
    $this->db->select( 'q.id' );
    $this->db->select( 'q.titulo' );
    $this->db->select( 'q.enunciado' );
    $this->db->select( 'q.imagem' );
    $this->db->select( 'q.status' );
    $this->db->select( 'q.resposta_1' );
    $this->db->select( 'q.resposta_2' );
    $this->db->select( 'q.resposta_3' );
    $this->db->select( 'q.resposta_4' );
    $this->db->select( 'q.id_descritor' );
    $this->db->select( 'd.parametro as descritor' );
    $this->db->from( 'questao q' );
    $this->db->join( 'parametro_detalhe d', 'q.id_descritor = d.id', 'left' ); 
    $this->db->where('q.status', 1);
    $this->db->order_by( 'q.id' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }





  /**
   * Obtém dados de um usuário
   *
   * @param   int - $intID (ID do usuário)
   * @return  array/false
   */
  public function getQuestion( $intID ){
    $this->db->select( 'q.id' );
    $this->db->select( 'q.titulo' );
    $this->db->select( 'q.enunciado' );
    $this->db->select( 'q.imagem' );
    $this->db->select( 'q.status' );
    $this->db->select( 'q.resposta_1' );
    $this->db->select( 'q.resposta_2' );
    $this->db->select( 'q.resposta_3' );
    $this->db->select( 'q.resposta_4' );
    $this->db->select( 'q.id_descritor' );
    $this->db->select( 'd.parametro as descritor' );
    $this->db->from( 'questao q' );
    $this->db->join( 'parametro_detalhe d', 'q.id_descritor = d.id', 'left' ); 
    $this->db->where( 'q.id', $intID );
    $q = $this->db->get();
    return $q->num_rows() === 1 ? $q->result_array()[0] : false;
  }






  public function setQuestion( $arrData ){
    $arrNovo['id_descritor'] = $arrData['id_descritor']; 
    $arrNovo['titulo'] = $arrData['titulo'];
    $arrNovo['enunciado'] = $arrData['enunciado'];
    $arrNovo['imagem'] = $arrData['imagem'];
    $arrNovo['resposta_1'] = $arrData['resposta_1'];
    $arrNovo['resposta_2'] = $arrData['resposta_2'];
    $arrNovo['resposta_3'] = $arrData['resposta_3'];
    $arrNovo['resposta_4'] = $arrData['resposta_4'];
    $this->db->insert( 'questao', $arrNovo );
    $intId = $this->db->insert_id();
    return is_numeric( $intId );
  }






  public function updateQuestion( $arrData ){
    $this->db->set( 'dt_alteracao', $arrData['dt_alteracao'] ); 
    $this->db->set( 'id_descritor', $arrData['id_descritor'] );
    $this->db->set( 'titulo', $arrData['titulo'] );
    $this->db->set( 'enunciado', $arrData['enunciado'] );
    $this->db->set( 'imagem', $arrData['imagem'] );
    $this->db->set( 'resposta_1', $arrData['resposta_1'] );
    $this->db->set( 'resposta_2', $arrData['resposta_2'] );
    $this->db->set( 'resposta_3', $arrData['resposta_3'] );
    $this->db->set( 'resposta_4', $arrData['resposta_4'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'questao' );
    return 0 !== $this->db->affected_rows();
  }







  /**
   * Atualiza status do usuário
   *
   * @param   int  - $arrData[id] (ID do usuário)
   * @param   date - $arrData[data] (Data da ativação/inativação do usuário)
   * @param   bool - $arrData[status] (Status do usuário)
   * @return  bool
   */
  public function udpateStatus( $arrData ){
    $this->db->set( 'status', $arrData['status'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'questao' );
    return 0 !== $this->db->affected_rows();
  }


}