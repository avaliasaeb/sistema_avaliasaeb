<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Private_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 *	Exibe a tela do painel principal para o usuário
	 *
	 * @param none
	 * @return void
	 */
	public function index(){
		$this->_setPageTitle( $this->lang->line('page_title_reports') );
		$this->load->view('main/header_view', $this->data);

    $this->load->model('classrooms/classrooms_model');
		$this->data['list_1'] = $this->classrooms_model->getClassrooms();

    $this->load->model('schedules/schedules_model');
		$this->data['list_2'] = $this->schedules_model->getSchedules();

    $this->load->model('exams/exams_model');
		$this->data['list_3'] = $this->exams_model->getExams();

    $this->load->model('students/students_model');
    $this->data['list_4'] = $this->students_model->getStudents();

		$this->load->view('reports_view', $this->data);
		$this->load->view('main/footer_view', $this->data);
	}


	public function syntheticclass(){

    $arrData['id_turma'] = $this->_input('input_turma');
    $arrData['id_agenda'] = $this->_input('input_agenda');
    $arrData['id_prova'] = $this->_input('input_prova');

    $this->load->model('reports_model');
    $this->data['lista'] = $this->reports_model->getSyntheticclass( $arrData );
    
    if( false !== $this->data['lista'] ){
    	$this->load->helper('file');
    	
      $filename =  'sintetico_turma_' . date('YmdHis').'.csv';
      $filepath = $this->config->item('upload_path') . $filename;
      $file = fopen($filepath, 'w');
      
      $header = array(
        $this->lang->line('form_turma_nome'),
        $this->lang->line('form_dtinicio'),
        $this->lang->line('form_titulo'),
        $this->lang->line('form_descricao'),
        $this->lang->line('form_descritor'),
        $this->lang->line('total'),
        $this->lang->line('corretas'),
        $this->lang->line('percentual')
      ); 

      fputcsv( $file, $header, ';' );
      
      foreach( $this->data['lista'] as $item ){
        $dados = array( 
          $item["turma"],
          $item["data"],
          $item["titulo"],
          $item["descricao"],
          $item["descritor"],
          $item["total"],
          $item["corretas"],
          $item["percentual"]
        );

        fputcsv( $file, $dados, ';' );
      }

      fclose( $file );

      $this->exportCSV( $filename, $filepath );

    }else{
      echo 'Nenhuma informação a ser exportada!';
    }		
	}


  public function syntheticstudent(){

    $arrData['id_turma'] = $this->_input('input_turma');
    $arrData['id_agenda'] = $this->_input('input_agenda');
    $arrData['id_prova'] = $this->_input('input_prova');
    $arrData['id_aluno'] = $this->_input('input_aluno');

    $this->load->model('reports_model');
    $this->data['lista'] = $this->reports_model->getSyntheticstudent( $arrData );
    
    if( false !== $this->data['lista'] ){
      $this->load->helper('file');
      
      $filename =  'sintetico_aluno_' . date('YmdHis').'.csv';
      $filepath = $this->config->item('upload_path') . $filename;
      $file = fopen($filepath, 'w');
      
      $header = array(
        $this->lang->line('form_turma_nome'),
        $this->lang->line('form_nome_completo'),
        $this->lang->line('form_dtinicio'),
        $this->lang->line('form_dtrealizacao'),
        $this->lang->line('form_titulo'),
        $this->lang->line('form_descricao'),
        $this->lang->line('total'),
        $this->lang->line('corretas'),
        $this->lang->line('percentual')
      ); 

      fputcsv( $file, $header, ';' );
      
      foreach( $this->data['lista'] as $item ){
        $dados = array( 
          $item["turma"],
          $item["nome"],
          $item["data"],
          $item["dt_realizado"],
          $item["titulo"],
          $item["descricao"],
          $item["total"],
          $item["corretas"],
          $item["percentual"]
        );

        fputcsv( $file, $dados, ';' );
      }

      fclose( $file );

      $this->exportCSV( $filename, $filepath );

    }else{
      echo 'Nenhuma informação a ser exportada!';
    }    
  }



  public function datailstudent(){

    $arrData['id_turma'] = $this->_input('input_turma');
    $arrData['id_agenda'] = $this->_input('input_agenda');
    $arrData['id_prova'] = $this->_input('input_prova');
    $arrData['id_aluno'] = $this->_input('input_aluno');

    $this->load->model('reports_model');
    $this->data['lista'] = $this->reports_model->getDatailstudent( $arrData );
    
    if( false !== $this->data['lista'] ){
      $this->load->helper('file');
      
      $filename =  'detalhado_aluno_' . date('YmdHis').'.csv';
      $filepath = $this->config->item('upload_path') . $filename;
      $file = fopen($filepath, 'w');
      
      $header = array(
        $this->lang->line('form_nome_completo'),
        $this->lang->line('form_titulo'),
        $this->lang->line('form_descricao'),
        $this->lang->line('form_turma_nome'),
        $this->lang->line('form_dtinicio'),
        $this->lang->line('form_dtrealizacao'),
        $this->lang->line('form_descritor'),
        $this->lang->line('page_title_question'),
        $this->lang->line('form_enunciado'),
        $this->lang->line('form_idresposta'),
        $this->lang->line('form_alternativa')
      ); 

      fputcsv( $file, $header, ';' );
      
      foreach( $this->data['lista'] as $item ){
        $dados = array( 
          $item["nome"],
          $item["titulo"],
          $item["descricao"],
          $item["turma"],
          $item["data"],
          $item["dt_realizado"],
          $item["descritor"],
          $item["questao"],
          $item["enunciado"],
          $item["id_resposta"],
          $item["resposta"]
        );

        fputcsv( $file, $dados, ';' );
      }

      fclose( $file );

      $this->exportCSV( $filename, $filepath );

    }else{
      echo 'Nenhuma informação a ser exportada!';
    }    
  }


  protected function exportCSV( $filename, $filepath ){
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; charset=UTF-8");
    header('Pragma: no-cache');
    header('Expires: 0');
    readfile($filepath);
    do_delete($filepath);
    exit;
  }	

}
