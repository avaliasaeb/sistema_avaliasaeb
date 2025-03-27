<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Schedules_model extends MY_Model{

  public function __construct() {
    parent::__construct();
  }

  /**
   * Obtém lista com todos os usuários
   *
   * @param   none
   * @return  array/false
   */
  public function getSchedules(){
    $this->db->select( 'a.id' );
    $this->db->select( 'a.dt_cadastro' );
    $this->db->select( 'a.dt_alteracao' );
    $this->db->select( 'a.id_prova' );
    $this->db->select( 'p.titulo' );
    $this->db->select( 'p.descricao' );
    $this->db->select( 'a.dt_inicio' );
    $this->db->select( 'a.dt_fim' );
    $this->db->select( 'a.status' );
    $this->db->from( 'agenda a' );
    $this->db->join( 'prova p', 'a.id_prova = p.id' );
    $this->db->order_by( 'a.dt_inicio' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }





  /**
   * Obtém lista com todos os usuários
   *
   * @param   none
   * @return  array/false
   */
  public function setSchedule( $arrData ){
    $arrNovo['id_prova'] = $arrData['id_prova'];
    $arrNovo['dt_inicio'] = $arrData['dt_inicio'];
    $arrNovo['dt_fim'] = $arrData['dt_fim'];
    $arrAlunos['alunos'] = $arrData['alunos'];

    $this->db->trans_begin();
    
    $this->db->insert( 'agenda', $arrNovo );
    $intAgenda = $this->db->insert_id();

    foreach( $arrAlunos['alunos'] as $item ){

      if( $item !== '' ){
        $arrDet['id_agenda'] = $intAgenda;
        $arrDet['id_aluno'] = $item;
        $this->db->insert( 'agenda_detalhe', $arrDet );
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
   * Obtém dados de um usuário
   *
   * @param   int - $intID (ID do usuário)
   * @return  array/false
   */
  public function getSchedule( $intID ){
    $this->db->select( 'a.id' );
    $this->db->select( 'a.dt_cadastro' );
    $this->db->select( 'a.dt_alteracao' );
    $this->db->select( 'a.id_prova' );
    $this->db->select( 'p.titulo' );
    $this->db->select( 'p.descricao' );
    $this->db->select( 'a.dt_inicio' );
    $this->db->select( 'a.dt_fim' );
    $this->db->select( 'a.status' );
    $this->db->from( 'agenda a' );
    $this->db->join( 'prova p', 'a.id_prova = p.id' );
    $this->db->where( 'a.id', $intID );
    $q = $this->db->get();
    return $q->num_rows() === 1 ? $q->result_array()[0] : false;
  }






  public function getScheduleDetail( $intID ){
    $this->db->select( 'a.id' );
    $this->db->select( 'a.id_agenda' );
    $this->db->select( 'a.id_aluno' );
    $this->db->select( 'u.nome' );
    $this->db->select( 't.turma' );
    $this->db->select( 'a.dt_realizado' );
    $this->db->from( 'agenda_detalhe a' );
    $this->db->join( 'usuario u', 'a.id_aluno = u.id' );
    $this->db->join( 'turma t', 'u.id_turma = t.id', 'left' );
    $this->db->where( 'a.id_agenda', $intID );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }






  public function getScheduleStudents( $intID ){
    $this->db->select( 'u.id' );
    $this->db->select( 'u.nome' );
    $this->db->select( 'u.id_turma' );
    $this->db->select( 't.turma' );
    $this->db->select( 'a.id_agenda' );
    $this->db->select( 'a.dt_realizado' );
    $this->db->from( 'usuario u' );
    $this->db->where( 'u.id_perfil !=', '1' );
    $this->db->where( 'u.id_perfil =', $this->config->item('perfil_aluno') );
    $this->db->join( 'agenda_detalhe a', 'a.id_aluno = u.id AND a.id_agenda = ' . $intID, 'left' );
    $this->db->join( 'turma t', 'u.id_turma = t.id', 'left' );
    $this->db->order_by( 'u.id' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }






  public function updateSchedule( $arrData ){
    $this->db->trans_begin();

    $this->db->set( 'id_prova', $arrData['id_prova'] ); 
    $this->db->set( 'dt_inicio', $arrData['dt_inicio'] );
    $this->db->set( 'dt_fim', $arrData['dt_fim'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'agenda' );

    $this->db->where( 'id_agenda', $arrData['id'] );
    $this->db->where( 'dt_realizado is NULL', NULL, FALSE );
    $this->db->delete('agenda_detalhe');

    foreach( $arrData['alunos'] as $item ){

      if( $item !== '' ){
        $arrDet['id_agenda'] = $arrData['id'];
        $arrDet['id_aluno'] = $item;
        $this->db->insert( 'agenda_detalhe', $arrDet );
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
    $this->db->update( 'agenda' );
    return 0 !== $this->db->affected_rows();
  }


}