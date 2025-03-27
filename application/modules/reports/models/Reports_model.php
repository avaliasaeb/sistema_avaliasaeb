<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Reports_model extends MY_Model{

  public function __construct() {
    parent::__construct();
  }

  public function getSyntheticclass( $arrData ){
    $this->db->select( '*' );
    $this->db->from( 'relatorio_sintetico_turma' );

    if( null !== $arrData['id_turma'] ){
      $this->db->where( 'id_turma', $arrData['id_turma'] );
    }

    if( null !== $arrData['id_agenda'] ){
      $this->db->where( 'id_agenda', $arrData['id_agenda'] );
    }

    if( null !== $arrData['id_prova'] ){
      $this->db->where( 'id_prova', $arrData['id_prova'] );
    }

    $this->db->order_by( 'data' );
    $this->db->order_by( 'id_turma' );
    $this->db->order_by( 'id_agenda' );
    $this->db->order_by( 'id_prova' );

    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }



  public function getSyntheticstudent( $arrData ){
    $this->db->select( '*' );
    $this->db->from( 'relatorio_sintetico_aluno' );

    if( null !== $arrData['id_turma'] ){
      $this->db->where( 'id_turma', $arrData['id_turma'] );
    }

    if( null !== $arrData['id_agenda'] ){
      $this->db->where( 'id_agenda', $arrData['id_agenda'] );
    }

    if( null !== $arrData['id_prova'] ){
      $this->db->where( 'id_prova', $arrData['id_prova'] );
    }

    if( null !== $arrData['id_aluno'] ){
      $this->db->where( 'id_aluno', $arrData['id_aluno'] );
    }

    $this->db->order_by( 'data' );
    $this->db->order_by( 'id_turma' );
    $this->db->order_by( 'id_agenda' );
    $this->db->order_by( 'id_prova' );
    $this->db->order_by( 'id_aluno' );

    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }



  public function getDatailstudent( $arrData ){
    $this->db->select( '*' );
    $this->db->from( 'relatorio_detalhado_aluno' );

    if( null !== $arrData['id_turma'] ){
      $this->db->where( 'id_turma', $arrData['id_turma'] );
    }

    if( null !== $arrData['id_agenda'] ){
      $this->db->where( 'id_agenda', $arrData['id_agenda'] );
    }

    if( null !== $arrData['id_prova'] ){
      $this->db->where( 'id_prova', $arrData['id_prova'] );
    }

    if( null !== $arrData['id_aluno'] ){
      $this->db->where( 'id_aluno', $arrData['id_aluno'] );
    }

    $this->db->order_by( 'data' );
    $this->db->order_by( 'id_turma' );
    $this->db->order_by( 'id_agenda' );
    $this->db->order_by( 'id_prova' );
    $this->db->order_by( 'id_aluno' );

    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }
}