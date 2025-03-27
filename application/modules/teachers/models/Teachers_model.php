<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Teachers_model extends MY_Model{

  public function __construct() {
    parent::__construct();
  }

  /**
   * Obtém lista com todos os usuários
   *
   * @param   none
   * @return  array/false
   */
  public function getTeachers(){
    $this->db->select( 'u.id' );
    $this->db->select( 'u.nome' );
    $this->db->select( 'u.email' );
    $this->db->select( 'u.login' );
    $this->db->select( 'u.idioma' );
    $this->db->select( 'u.status' );
    $this->db->select( 'u.id_perfil' );
    $this->db->select( 'p.perfil' );
    $this->db->select( 'u.id_necessidade' );
    $this->db->select( 'n.parametro as necessidade' );
    $this->db->from( 'usuario u' );
    $this->db->where( 'u.id_perfil !=', '1' );
    $this->db->where( 'u.id_perfil =', $this->config->item('perfil_professor') );
    $this->db->join( 'perfil p', 'u.id_perfil = p.id' );
    $this->db->join( 'parametro_detalhe n', 'u.id_necessidade = n.id', 'left' ); 
    $this->db->order_by( 'u.id' );
    $q = $this->db->get();
    return $q->num_rows() > 0 ? $q->result_array() : false;
  }






  /**
   * Obtém dados de um usuário
   *
   * @param   int - $intID (ID do usuário)
   * @return  array/false
   */
  public function getTeacher( $intID ){
    $this->db->select( 'u.id' );
    $this->db->select( 'u.status' );
    $this->db->select( 'u.nome' );
    $this->db->select( 'u.email' );
    $this->db->select( 'u.login' );
    $this->db->select( 'u.idioma' );
    $this->db->select( 'u.dt_cadastro' );
    $this->db->select( 'u.dt_alteracao' );
    $this->db->select( 'u.dt_ativacao' );
    $this->db->select( 'u.dt_inativacao' );
    $this->db->select( 'u.dt_login' );
    $this->db->select( 'u.id_perfil' );
    $this->db->select( 'p.perfil' );
    $this->db->select( 'p.permissoes' );
    $this->db->select( 'u.id_necessidade' );
    $this->db->select( 'n.parametro as necessidade' );
    $this->db->from( 'usuario u' );
    $this->db->join( 'perfil p', 'u.id_perfil = p.id' );
    $this->db->join( 'parametro_detalhe n', 'u.id_necessidade = n.id', 'left' ); 
    $this->db->where( 'u.id', $intID );
    $this->db->where( 'u.id_perfil =', $this->config->item('perfil_professor') );
    $q = $this->db->get();
    return $q->num_rows() === 1 ? $q->result_array()[0] : false;
  }





  /**
   * Inclui dados de um usuário
   *
   * @param   str  - $arrData[nome] (Nome do usuário)
   * @param   str  - $arrData[email] (Email do usuário)
   * @param   str  - $arrData[telefone] (Telefone do usuário)
   * @param   str  - $arrData[login] (Login do usuário)
   * @param   str  - $arrData[senha] (Senha do usuário)
   * @param   str  - $arrData[idioma] (Idioma do usuário)
   * @param   bool - $arrData[status] (Status do usuário)
   * @param   int  - $arrData[id_perfil] (ID do perfil de acesso do usuário)
   * @param   int  - $arrData[id_pais] (ID do país do usuário)
   * @param   int  - $arrData[empresa] (Nome da empresa do usuário)
   * @param   int  - $arrData[id_tipo_documento] (ID do tipo do documento do usuário)
   * @param   str  - $arrData[documento] (Número do documento do usuário)
   * @param   str  - $arrData[cargo] (Cargo do usuário)
   * @return  bool
   */
  public function setTeacher( $arrData ){
    $arrNovo['nome'] = $arrData['nome']; 
    $arrNovo['email'] = $arrData['email'];
    $arrNovo['login'] = $arrData['login'];
    $arrNovo['senha'] = $arrData['senha'];
    $arrNovo['idioma'] = $arrData['idioma'];
    $arrNovo['status'] = $arrData['status'];
    $arrNovo['id_perfil'] = $arrData['id_perfil'];
    $arrNovo['id_necessidade'] = $arrData['id_necessidade'];
    $arrNovo['dt_ativacao'] = $arrData['dt_ativacao'];
    $this->db->insert( 'usuario', $arrNovo );
    $intId = $this->db->insert_id();
    return is_numeric( $intId );
  }






  /**
   * Atualiza dados de um usuário
   *
   * @param   int  - $arrData[id] (ID do usuário)
   * @param   date - $arrData[dt_alteracao] (Data da alteração do usuário)
   * @param   str  - $arrData[nome] (Nome do usuário)
   * @param   str  - $arrData[email] (Email do usuário)
   * @param   str  - $arrData[telefone] (Telefone do usuário)
   * @param   str  - $arrData[idioma] (Idioma do usuário)
   * @param   bool - $arrData[status] (Status do usuário)
   * @param   int  - $arrData[id_perfil] (ID do perfil de acesso do usuário)
   * @param   int  - $arrData[id_pais] (ID do país do usuário)
   * @param   int  - $arrData[empresa] (Nome da empresa do usuário)
   * @param   int  - $arrData[id_tipo_documento] (ID do tipo do documento do usuário)
   * @param   str  - $arrData[documento] (Número do documento do usuário)
   * @param   str  - $arrData[cargo] (Cargo do usuário)
   * @return  bool
   */
  public function updateUser( $arrData ){
    $this->db->set( 'dt_alteracao', $arrData['dt_alteracao'] ); 
    $this->db->set( 'nome', $arrData['nome'] );
    $this->db->set( 'email', $arrData['email'] );
    $this->db->set( 'idioma', $arrData['idioma'] );
    $this->db->set( 'id_perfil', $arrData['id_perfil'] );
    $this->db->set( 'id_necessidade', $arrData['id_necessidade'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'usuario' );
    return 0 !== $this->db->affected_rows();
  }






  /**
   * Atualiza dados de login de um usuário
   *
   * @param   int  - $arrData[id] (ID do usuário)
   * @param   date - $arrData[dt_alteracao] (Data da alteração do usuário)
   * @param   str  - $arrData[login] (Login do usuário)
   * @param   str  - $arrData[senha] (Senha do usuário)
   * @return  bool
   */
  public function updateUserLogin( $arrData ){
    $this->db->set( 'dt_alteracao', $arrData['dt_alteracao'] ); 
    $this->db->set( 'login', $arrData['login'] );
    $this->db->set( 'senha', $arrData['senha'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'usuario' );
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
    if( 1 == $arrData['status'] ){
      $this->db->set( 'dt_ativacao', $arrData['data'] ); 
    }else{
      $this->db->set( 'dt_inativacao', $arrData['data'] ); 
    }

    $this->db->set( 'status', $arrData['status'] );
    $this->db->where( 'id', $arrData['id'] );
    $this->db->update( 'usuario' );
    return 0 !== $this->db->affected_rows();
  }







  /**
   * Verifica se já existe algum usuário com o login informado
   *
   * @param   str - $strLogin (Login do usuário)
   * @return  bool
   */
  public function loginAlreadyExists( $strLogin ){
    $this->db->select( 'id' );
    $this->db->from( 'usuario' );
    $this->db->where( 'login', $strLogin );
    $q = $this->db->get();
    return $q->num_rows() > 0;
  }






  /**
   * Verifica se já existe outro usuário com o login informado
   * utilizado no momento de alterar um usuário
   *
   * @param   int - $arrData[id] (ID do usuário)
   * @param   str - $arrData[login] (Login do usuário)
   * @return  array/false
   */
  public function anotherLoginAlreadyExists( $arrData ){
    $this->db->select( 'id' );
    $this->db->from( 'usuario' );
    $this->db->where( 'id != ', $arrData['id'] );
    $this->db->where( 'login', $arrData['login'] );
    $q = $this->db->get();
    return $q->num_rows() > 0;
  }

}