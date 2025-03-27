<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends MX_Controller{	

  protected $data;

	function __construct(){
		parent::__construct();

		//fix callback form_validation		
		//https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
    $this->data['controller'] = $this;

    //mantém o formato dos dados
    $this->db->conn_id->options( MYSQLI_OPT_INT_AND_FLOAT_NATIVE, TRUE );

    //versão do sistema
    $this->data['version'] = $this->config->item('version');

    //pega usuário logado da sessão
    $this->data['user'] = $this->_getSessionItem( 'usuario_logado' );

    //inicializa idioma
    $this->_setLanguage();

    //Direciona o usuário para página de manutenção
    //quanto o modo manutenção estiver ativo
    //ver atributo $config['maintenance'] no arquivo
    // application/config/config.php
    if( true == $this->config->item('maintenance') ){
      redirect( site_url( 'public/maintenance') );
    }

    //registra log
    $this->_log();

	}






  /**
   * Inicializa o idioma do sistema
   * Verifica se há usuário logado
   *
   * @param   none
   * @return  void
   */
  protected function _setLanguage(){
    $this->data['idiomas']['portuguese-brazilian'] = 'pt';
    $this->data['idiomas']['spanish'] = 'es';
    $this->data['idiomas']['english'] = 'en';

    $this->data['idioma'] = $this->_getSessionItem( 'idioma' );

    if( true === $this->_isUserLoggedIn() ){
      $this->data['idioma'] = $this->data['user']['idioma'];
    }else{
      if( null == $this->data['idioma'] ){
        $this->data['idioma'] = $this->config->item('language');
      }
    }
    $this->_setSessionItem( 'idioma', $this->data['idioma'] );

    //obtendo idioma do banco de dados
    $this->load->model('my_model');
    $lines = $this->my_model->getLanguage( $this->data['idioma'] );

    $lang = $this->lang->language;
    if( false != $lines ){
      foreach ( $lines as $line ){
        $lang[$line['chave']] = $line[$this->data['idioma']];
      }
    }
    $this->lang->language = $lang;

  }





  /**
   * Atualiza os dados cadastrais do perfil do usuário logado
   *
   * @param   str  - $strPageTitle (Título da página)
   * @return  void
   */
	protected function _setPageTitle( $strPageTitle = false ){
    $this->data['page_title'] = '';

    if( false !== $strPageTitle ){
      $this->data['page_title'] = $strPageTitle . ' | ';
      $this->data['view_title'] = $strPageTitle;
    }

		$this->data['page_title'] .= $this->config->item('page_title');
	}






  /**
   * Obtém e trata o tipo input enviado no formulário
   * - se a requisição é ajax e do tipo POST, então input_stream, senão, método enviado
   * - se o dado enviado não for vazio e não for nulo, retorna dado, senão null
   *
   * @param   str  - $strInput (Nome do input [name])
   * @return 	any/null
   */
  protected function _input( $strInput ) {
    $strTipo = $this->input->is_ajax_request() === true && $this->input->method() === 'post' ? 'input_stream' : $this->input->method();
    $input = $this->input->$strTipo( $strInput, FALSE );
    $count = is_array($input) ? count($input) : strlen( $input );
    return $count !== 0 && null !== $input ? $input : null;
  }






  /**
   * Obtém e trata o tipo input enviado no formulário
   * - se a requisição é ajax e do tipo POST, então input_stream, senão, método enviado
   * - se o dado enviado não for vazio e não for nulo, retorna dado, senão null
   *
   * @param   arr  - $output (Array contando a saída json)
   * @return  any/null
   */
  protected function _output( $output ){
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode( $output, JSON_UNESCAPED_UNICODE );
    die();
  }






  /**
   * Insere informação na sessão
   * - se a requisição é ajax e do tipo POST, então input_stream, senão, método enviado
   * - se o dado enviado não for vazio e não for nulo, retorna dado, senão null
   *
   * @param   str  - $strItemName (Nome do item)
   * @param   any  - $anyValue (Valor do item)
   * @return  void
   */
  protected function _setSessionItem( $strItemName, $anyValue ){
    $this->session->set_userdata( $this->config->item('sess_prefix') . $strItemName, $anyValue );
  }






  /**
   * Retorna informação na sessão
   * - se a requisição é ajax e do tipo POST, então input_stream, senão, método enviado
   * - se o dado enviado não for vazio e não for nulo, retorna dado, senão null
   *
   * @param   str  - $strItemName (Nome do item)
   * @return  any
   */
  protected function _getSessionItem( $strItemName ){
    return $this->session->userdata( $this->config->item('sess_prefix') . $strItemName );        
  }






  /**
   * Verifica se há usuário logado
   *
   * @param   none
   * @return  bool
   */
  public function _isUserLoggedIn(){
    return null !== $this->data['user'] ? true : false;
  }






  /**
   * Verifica se usuário tem permissão para o módulo/controlador/método
   *
   * @param   str | default null - $strURI (Módulo/Controlador/Método)
   * @return  bool
   */
  public function _hasUserPermission( $strURI = null ){

    //se o usuário é super admin
    if( '*' === $this->data['user']['roles'] ){
      return true;
    }

    //caso não seja informado URI, obtém diretamente do CI
    if( null == $strURI ){
      $strModule = $this->router->fetch_module();
      $strController = $this->router->fetch_class();
      $strMethod = $this->router->fetch_method();
      $strURI = $strModule . '/' . $strController . '/' . $strMethod;
    }

    //testa permissões do usuário
    $arrPermissoes = explode( ';', $this->data['user']['roles'] );
    $bolvalidacao = in_array( $strURI, $arrPermissoes );

    //se a requisição é ajax/post e o usuário não tem permissão
    if( ( true === $this->input->is_ajax_request() || $this->input->method() === 'post' ) && false === $bolvalidacao ){
      $output = array(
         'status' => false
        ,'msg'    => $this->lang->line('ajax_9')
      );
      $this->_output( $output );
    }

    return $bolvalidacao;
  }






  /**
   * Efetua envio de email
   *
   * @param   str  - $arrData[to] (Email do destinatário)
   * @param   str  - $arrData[subject] (Assunto do e-mail)
   * @param   str  - $arrData[body] (Corpo do e-mail)
   * @return  bool
   */
  protected function _sendMail($arrData){
    if(ENVIRONMENT !== 'development'){

      $config['charset'] = 'UTF-8';
      $config['mailtype'] = 'html';
      $config['crlf'] = "\n";
      $config['priority'] = 2;
      $config['validate'] = FALSE;
      $config['protocol'] = 'smtp';
      $config['smtp_crypto'] = 'ssl';

      $config['smtp_port'] = $this->config->item('smtp_port');
      $config['smtp_host'] = $this->config->item('smtp_host');
      $config['smtp_user'] = $this->config->item('smtp_user');
      $config['smtp_pass'] = $this->config->item('smtp_pass');
      
      $this->load->library('email');
      $this->email->initialize($config);
      $this->email->from( $this->config->item('smtp_replyto'), $this->config->item('page_title') );
      $this->email->to( $arrData['to'] );
      $this->email->subject( $arrData['subject'] );
      $this->email->message( $arrData['body'] );
      return $this->email->send();
    }
  }






  /**
   * REgistra log do sistema
   *
   * @param   none
   * @return   void
   */
  protected function _log(){

    $this->load->model('my_model');

    $arrData['user'] = json_encode( $this->data['user'], JSON_UNESCAPED_UNICODE );

    $strModule = $this->router->fetch_module();
    $strController = $this->router->fetch_class();
    $strMethod = $this->router->fetch_method();
    $strParam = $this->uri->segment(4);
    $arrData['uri'] = $strModule . '/' . $strController . '/' . $strMethod . '/' . $strParam;

    // $arrData['uri'] =  $this->uri->uri_string();
    
    $strTipo = $this->input->is_ajax_request() === true && $this->input->method() === 'post' ? 'input_stream' : $this->input->method();
    $arrData['input'] = $strTipo ? json_encode( $this->input->$strTipo(), JSON_UNESCAPED_UNICODE ) : null;

    $this->my_model->setLog( $arrData );
  }

  /**
   * Efetua o processo de validação de credenciais
   * para acessar o sistema
   *
   * @param   post
   * @return  json
   */
  public function changelanguage( $strIdiom = 'portuguese-brazilian' ){
    $this->_setSessionItem( 'idioma', $strIdiom );

    $output = array(
       'status' => true
      ,'href'   => ''
    );

    $this->_output( $output );
  }  

}






//controlador privado
class Private_Controller extends MY_Controller{
  
  function __construct() {
    parent::__construct();

    //verifica se há usuário logado
    if( false === $this->_isUserLoggedIn() ){
      redirect( site_url( 'public/login/') );
    }

    //verifica se o usuário tem permissão
    if( false === $this->_hasUserPermission() ){
      redirect( site_url('public/blocked') );
    }

    if( false === $this->input->is_ajax_request() && $this->input->method() !== 'post' ){
      $this->_getMenu();
    }
  }



  protected function _isUserLoggedInUpdated(){
    if( $this->data['user']['dt_alteracao'] == null ){
      return false;
    }
    return strtotime('-4 month') < strtotime( $this->data['user']['dt_alteracao'] );
  }


  protected function _getMenu(){
    $arrReturn = array();
    $arrMenu = array(
      array(
        'module' => 'main',
        'role' => 'main/main/index',
        'icon' => 'fa-regular fa-futbol',
        'desc' => 'page_title_main',
        'label' => 'menu_1'
      ),
      array(
        'module' => 'params',
        'role' => 'params/params/index',
        'icon' => 'fa-solid fa-gears',
        'desc' => 'page_title_params',
        'label' => 'menu_2'
      ),
      array(
        'module' => 'roles',
        'role' => 'roles/roles/index',
        'icon' => 'fa-solid fa-list-check',
        'desc' => 'page_title_roles',
        'label' => 'menu_3'
      ),
      array(
        'module' => 'users',
        'role' => 'users/users/index',
        'icon' => 'fa-solid fa-users',
        'desc' => 'page_title_users',
        'label' => 'menu_4'
      ),
      array(
        'module' => 'coordinators',
        'role' => 'coordinators/coordinators/index',
        'icon' => 'fa-solid fa-user-tie',
        'desc' => 'page_title_coordinators',
        'label' => 'menu_10'
      ),
      array(
        'module' => 'teachers',
        'role' => 'teachers/teachers/index',
        'icon' => 'fa-solid fa-chalkboard-user',
        'desc' => 'page_title_teachers',
        'label' => 'menu_8'
      ),
      array(
        'module' => 'classrooms',
        'role' => 'classrooms/classrooms/index',
        'icon' => 'fa-solid fa-users-rectangle',
        'desc' => 'page_title_classrooms',
        'label' => 'menu_7'
      ),
      array(
        'module' => 'students',
        'role' => 'students/students/index',
        'icon' => 'fa-solid fa-book-open-reader',
        'desc' => 'page_title_students',
        'label' => 'menu_9'
      ),
      array(
        'module' => 'midias',
        'role' => 'midias/midias/index',
        'icon' => 'fa-solid fa-photo-film',
        'desc' => 'page_title_midias',
        'label' => 'menu_16'
      ),
      array(
        'module' => 'questions',
        'role' => 'questions/questions/index',
        'icon' => 'fa-solid fa-align-left',
        'desc' => 'page_title_questions',
        'label' => 'menu_11'
      ),
      array(
        'module' => 'exams',
        'role' => 'exams/exams/index',
        'icon' => 'fa-solid fa-file',
        'desc' => 'page_title_exams',
        'label' => 'menu_12'
      ),
      array(
        'module' => 'schedules',
        'role' => 'schedules/schedules/index',
        'icon' => 'fa-solid fa-calendar-check',
        'desc' => 'page_title_schedules',
        'label' => 'menu_13'
      ),
      array(
        'module' => 'myexams',
        'role' => 'myexams/myexams/index',
        'icon' => 'fa-solid fa-file-pen',
        'desc' => 'page_title_myexams',
        'label' => 'menu_14'
      ),
      array(
        'module' => 'reports',
        'role' => 'reports/reports/index',
        'icon' => 'fa-regular fa-file-lines',
        'desc' => 'page_title_reports',
        'label' => 'menu_15'
      ),
    );

    foreach( $arrMenu as $menu ){
      if( $this->_hasUserPermission( $menu['role'] ) ){
        array_push( $arrReturn, $menu );
      }
    }
    $this->data['menu'] = $arrReturn;
    return $arrReturn;
  }
  
}