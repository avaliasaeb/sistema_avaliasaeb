<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Profile_model extends MY_Model{

  public function __construct() {
    parent::__construct();
  }

  /**
   * Atualiza os dados do perfil
   *
   * @param   int  - $arrData[id] (ID do perfil)
   * @param   date - $arrData[dt_alteracao] (Data de alteração do perfil)
   * @param   str  - $arrData[nome] (Nome do perfil)
   * @param   str  - $arrData[email] (Email do perfil)
   * @param   str  - $arrData[telefone] (Telefone do perfil)
   * @param   str  - $arrData[idioma] (Idioma do perfil)
   * @param   int  - $arrData[id_pais] (ID do país do perfil)
   * @param   int  - $arrData[id_documento] (ID do documento do perfil)
   * @param   str  - $arrData[documento] (Documento do perfil)
   * @param   str  - $arrData[cargo] (Cargo do perfil)
   * @return  bool
   */
  public function updateProfile( $arrData ){

    $this->db->set( 'dt_alteracao', $arrData['dt_alteracao'] ); 
    $this->db->set( 'nome', $arrData['nome'] );
    $this->db->set( 'email', $arrData['email'] );
    $this->db->set( 'idioma', $arrData['idioma'] );
    $this->db->set( 'id_necessidade', $arrData['id_necessidade'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'usuario' );
    return 0 !== $this->db->affected_rows();
  }






  /**
   * Atualiza os dados de login do perfil
   *
   * @param   int  - $arrData[id] (ID do perfil)
   * @param   str  - $arrData[login] (Login do perfil)
   * @param   str  - $arrData[senha] (Senha do perfil)
   * @param   date - $arrData[dt_alteracao] (Data de alteração do perfil)
   * @return  bool
   */
  public function updateProfileLogin( $arrData ){

    $this->db->set( 'dt_alteracao', $arrData['dt_alteracao'] ); 
    $this->db->set( 'login', $arrData['login'] );
    $this->db->set( 'senha', $arrData['senha'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'usuario' );
    return 0 !== $this->db->affected_rows();
  }






  /**
   * Obtém os dados do usuário logado
   *
   * @param   int - $intID (ID do perfil)
   * @return  array/false
   */
  public function getUserProfile( $intID ){
    $this->db->select( 'u.id' );
    $this->db->select( 'u.nome' );
    $this->db->select( 'u.email' );
    $this->db->select( 'u.login' );
    $this->db->select( 'u.idioma' );
    $this->db->select( 'u.id_perfil' );
    $this->db->select( 'u.dt_cadastro' );
    $this->db->select( 'u.dt_alteracao' );
    $this->db->select( 'u.dt_ativacao' );
    $this->db->select( 'u.dt_login' );
    $this->db->select( 'p.perfil' );
    $this->db->select( 'u.id_necessidade' );
    $this->db->select( 'n.parametro as necessidade' );
    $this->db->from( 'usuario u' );
    $this->db->join( 'perfil p', 'u.id_perfil = p.id' ); 
    $this->db->join( 'parametro_detalhe n', 'u.id_necessidade = n.id', 'left' ); 
    $this->db->where( 'u.id', $intID );
    $q = $this->db->get();
    return $q->num_rows() === 1 ? $q->result_array()[0] : false;
  }
  
}