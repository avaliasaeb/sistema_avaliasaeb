<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Exams_model extends MY_Model{

  public function __construct() {
    parent::__construct();
  }

  /**
   * Obtém lista com todos os usuários
   *
   * @param   none
   * @return  array/false
   */
  public function getExams(){
    $this->db->select( 'p.id' );
    $this->db->select( 'p.id_usuario' );
    $this->db->select( 'p.dt_cadastro' );
    $this->db->select( 'p.dt_alteracao' );
    $this->db->select( 'p.alteravel' );
    $this->db->select( 'p.status' );
    $this->db->select( 'p.titulo' );
    $this->db->select( 'p.descricao' );
    $this->db->from( 'prova p' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }

  /**
   * Obtém lista com todos os usuários
   *
   * @param   none
   * @return  array/false
   */
  public function getMyExams( $intID ){
    $this->db->select( 'p.id as id_prova' );
    $this->db->select( 'a.id as id_agenda' );
    $this->db->select( 'd.id as id_detalhe' );
    $this->db->select( 'p.id_usuario' );
    $this->db->select( 'p.dt_cadastro' );
    $this->db->select( 'p.dt_alteracao' );
    $this->db->select( 'p.alteravel' );
    $this->db->select( 'a.status' );
    $this->db->select( 'p.titulo' );
    $this->db->select( 'p.descricao' );
    $this->db->select( 'a.dt_inicio' );
    $this->db->select( 'a.dt_fim' );
    $this->db->select( 'd.dt_realizado' );
    $this->db->from( 'prova p' );
    $this->db->join( 'agenda a', 'a.id_prova = p.id' );
    $this->db->join( 'agenda_detalhe d', 'd.id_agenda = a.id' );
    $this->db->where( 'd.id_aluno', $intID );
    $this->db->where( 'p.status', '1' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }




  /**
   * Obtém lista com todos os usuários
   *
   * @param   none
   * @return  array/false
   */
  public function getMyExam( $usuario, $agenda, $prova, $detalhe ){
    $this->db->select( 'u.id as id_usuario' );
    $this->db->select( 'p.id as id_prova' );
    $this->db->select( 'a.id as id_agenda' );
    $this->db->select( 'd.id as id_detalhe' );
    $this->db->select( 'q.id as id_questao' );
    $this->db->select( 'q.titulo' );
    $this->db->select( 'q.enunciado' );
    $this->db->select( 'q.imagem' );
    $this->db->select( 'q.resposta_1' );
    $this->db->select( 'q.resposta_2' );
    $this->db->select( 'q.resposta_3' );
    $this->db->select( 'q.resposta_4' );
    $this->db->from( 'agenda_detalhe d' );
    $this->db->join( 'agenda a', 'a.id = d.id_agenda' );
    $this->db->join( 'prova p', 'p.id = a.id_prova' );
    $this->db->join( 'prova_detalhe e', 'p.id = e.id_prova' );
    $this->db->join( 'questao q', 'q.id = e.id_questao' );
    $this->db->join( 'usuario u', 'u.id = d.id_aluno' );
    $this->db->where( 'd.id_aluno', $usuario );
    $this->db->where( 'd.id_agenda', $agenda );
    $this->db->where( 'd.id', $detalhe );
    $this->db->where( 'p.id', $prova );
    $this->db->where( 'a.status', '1' );
    $this->db->where( 'u.status', '1' );
    $this->db->where( 'p.status', '1' );
    $this->db->where( 'd.dt_realizado is NULL', NULL, FALSE );
    $this->db->order_by( 'e.id' );

    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }


  /**
   * Obtém lista com todos os usuários
   *
   * @param   none
   * @return  array/false
   */
  public function getActiveExams(){
    $this->db->select( 'p.id' );
    $this->db->select( 'p.id_usuario' );
    $this->db->select( 'p.dt_cadastro' );
    $this->db->select( 'p.dt_alteracao' );
    $this->db->select( 'p.alteravel' );
    $this->db->select( 'p.status' );
    $this->db->select( 'p.titulo' );
    $this->db->select( 'p.descricao' );
    $this->db->from( 'prova p' );
    $this->db->where( 'p.status', '1' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }





  /**
   * Obtém dados de um usuário
   *
   * @param   int - $intID (ID do usuário)
   * @return  array/false
   */
  public function getExam( $intID ){
    $this->db->select( 'p.id' );
    $this->db->select( 'p.id_usuario' );
    $this->db->select( 'p.dt_cadastro' );
    $this->db->select( 'p.dt_alteracao' );
    $this->db->select( 'p.alteravel' );
    $this->db->select( 'p.status' );
    $this->db->select( 'p.titulo' );
    $this->db->select( 'p.descricao' );
    $this->db->from( 'prova p' );
    $this->db->where( 'p.id', $intID );
    $q = $this->db->get();
    return $q->num_rows() === 1 ? $q->result_array()[0] : false;
  }





  public function getExamQuestions( $intID ){
    $this->db->select( 'i.id' );
    $this->db->select( 'i.id_prova' );
    $this->db->select( 'i.id_questao' );
    $this->db->select( 'q.titulo' );
    $this->db->select( 'q.enunciado' );
    $this->db->select( 'q.imagem' );
    $this->db->select( 'd.parametro as descritor' );
    $this->db->from( 'prova_detalhe i' );
    $this->db->join( 'questao q', 'i.id_questao = q.id' );
    $this->db->join( 'parametro_detalhe d', 'q.id_descritor = d.id', 'left' ); 
    $this->db->where( 'i.id_prova', $intID );
    $this->db->order_by( 'i.id' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }





  public function setExam( $arrData ){
    $arrNovo['id_usuario'] = $arrData['id_usuario'];
    $arrNovo['titulo'] = $arrData['titulo'];
    $arrNovo['descricao'] = $arrData['descricao'];
    $arrQuest['questoes'] = $arrData['questoes'];

    $this->db->trans_begin();
    
    $this->db->insert( 'prova', $arrNovo );
    $intProva = $this->db->insert_id();

    foreach( $arrQuest['questoes'] as $item ){

      if( $item !== '' ){
        $arrDet['id_prova'] = $intProva;
        $arrDet['id_questao'] = $item;
        $this->db->insert( 'prova_detalhe', $arrDet );
      }
    }

    if( $this->db->trans_status() === FALSE ){
      $this->db->trans_rollback();
      return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }

  }





  public function setMyExam( $arrData ){
    $this->db->trans_begin();


    $this->db->set( 'dt_realizado', $arrData['dt_realizado'] );
    $this->db->where( 'id', $arrData['id_detalhe'] );
    $this->db->update( 'agenda_detalhe' );

    $this->db->set( 'alteravel', '0' );
    $this->db->where( 'id', $arrData['id_prova'] );
    $this->db->update( 'prova' );

    foreach( $arrData['questao'] as $key => $item ){
      if( $item !== '' ){
        $arrDet['id_agenda_detalhe '] = $arrData['id_detalhe'];
        $arrDet['id_questao'] = $item;
        $arrDet['id_resposta'] = $arrData['resposta'][$key];
        $this->db->insert( 'prova_realizada', $arrDet );
      }
    }

    if( $this->db->trans_status() === FALSE ){
      $this->db->trans_rollback();
      return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }

  }





  public function updateExam( $arrData ){

    $this->db->trans_begin();

    $this->db->set( 'id_usuario', $arrData['id_usuario'] ); 
    $this->db->set( 'titulo', $arrData['titulo'] );
    $this->db->set( 'descricao', $arrData['descricao'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'prova' );

    $this->db->where( 'id_prova ', $arrData['id'] );
    $this->db->delete('prova_detalhe');

    foreach( $arrData['questoes'] as $item ){

      if( $item !== '' ){
        $arrDet['id_prova'] = $arrData['id'];
        $arrDet['id_questao'] = $item;
        $this->db->insert( 'prova_detalhe', $arrDet );
      }
    }

    if( $this->db->trans_status() === FALSE ){
      $this->db->trans_rollback();
      return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }

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
    $this->db->update( 'prova' );
    return 0 !== $this->db->affected_rows();
  }


}