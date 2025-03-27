<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">
		<?php if( $controller->_hasUserPermission('reports/reports/syntheticclass') ){ ?>
		<div class="col-md-4 col-sm-6">
			<div class="card shadow-sm mb-4">
			  <div class="card-header bg-gradient-dark py-3">
			    <h6 class="m-0 font-weight-bold">
			    	<i class="fa-solid fa-users-rectangle"></i> <?= $this->lang->line('sintetico_turma') ?>
			    </h6>
			  </div>
			  <div class="card-body">
		    	<form action="<?= site_url('reports/reports/syntheticclass') ?>" method="post" target="_blank">
		  			
		  			<div class="form-floating mb-3">
						  <select name="input_turma" class="form-control select2" id="input_turma" autocomplete="off">
						    <option selected value=""><?= $this->lang->line('form_todos') ?></option>
						    <?php if( false !== $list_1 && is_array( $list_1 ) ){ ?>
						    <?php foreach( $list_1 as $obj ){ ?>
						    <option value="<?= $obj['id'] ?>"><?= $obj['turma'] ?></option>
						    <?php } } ?>
						  </select>
						  <label for="input_turma"><?= $this->lang->line('page_title_classrooms') ?></label>
						</div>
		  			
		  			<div class="form-floating mb-3">
						  <select name="input_agenda" class="form-control select2" id="input_agenda" autocomplete="off">
						    <option selected value=""><?= $this->lang->line('form_todos') ?></option>
						    <?php if( false !== $list_2 && is_array( $list_2 ) ){ ?>
						    <?php foreach( $list_2 as $obj ){ ?>
						    <option value="<?= $obj['id'] ?>"><?= date( 'd/m/Y', strtotime( $obj['dt_inicio'] ) ) ?></option>
						    <?php } } ?>
						  </select>
						  <label for="input_agenda"><?= $this->lang->line('page_title_schedules') ?></label>
						</div>

		  			<div class="form-floating mb-3">
						  <select name="input_prova" class="form-control select2" id="input_prova" autocomplete="off">
						    <option selected value=""><?= $this->lang->line('form_todos') ?></option>
						    <?php if( false !== $list_3 && is_array( $list_3 ) ){ ?>
						    <?php foreach( $list_3 as $obj ){ ?>
						    <option value="<?= $obj['id'] ?>"><?= $obj['titulo'] ?></option>
						    <?php } } ?>
						  </select>
						  <label for="input_prova"><?= $this->lang->line('page_title_exams') ?></label>
						</div>

						<button class="btn btn-lg btn-primary" type="submit"><i class="fa-solid fa-file-export"></i></button>

					</form>

			  </div>
			</div>
		</div>
		<?php } ?>


	<?php if( $controller->_hasUserPermission('reports/reports/syntheticstudent') ){ ?>
		<div class="col-md-4 col-sm-6">
			<div class="card shadow-sm mb-4">
			  <div class="card-header bg-gradient-dark py-3">
			    <h6 class="m-0 font-weight-bold">
			    	<i class="fa-solid fa-book-open-reader"></i> <?= $this->lang->line('sintetico_aluno') ?>
			    </h6>
			  </div>
			  <div class="card-body">
		    	<form action="<?= site_url('reports/reports/syntheticstudent') ?>" method="post" target="_blank">
		  			
		  			<div class="form-floating mb-3">
						  <select name="input_turma" class="form-control select2" id="input_turma" autocomplete="off">
						    <option selected value=""><?= $this->lang->line('form_todos') ?></option>
						    <?php if( false !== $list_1 && is_array( $list_1 ) ){ ?>
						    <?php foreach( $list_1 as $obj ){ ?>
						    <option value="<?= $obj['id'] ?>"><?= $obj['turma'] ?></option>
						    <?php } } ?>
						  </select>
						  <label for="input_turma"><?= $this->lang->line('page_title_classrooms') ?></label>
						</div>
		  			
		  			<div class="form-floating mb-3">
						  <select name="input_agenda" class="form-control select2" id="input_agenda" autocomplete="off">
						    <option selected value=""><?= $this->lang->line('form_todos') ?></option>
						    <?php if( false !== $list_2 && is_array( $list_2 ) ){ ?>
						    <?php foreach( $list_2 as $obj ){ ?>
						    <option value="<?= $obj['id'] ?>"><?= date( 'd/m/Y', strtotime( $obj['dt_inicio'] ) ) ?></option>
						    <?php } } ?>
						  </select>
						  <label for="input_agenda"><?= $this->lang->line('page_title_schedules') ?></label>
						</div>

		  			<div class="form-floating mb-3">
						  <select name="input_prova" class="form-control select2" id="input_prova" autocomplete="off">
						    <option selected value=""><?= $this->lang->line('form_todos') ?></option>
						    <?php if( false !== $list_3 && is_array( $list_3 ) ){ ?>
						    <?php foreach( $list_3 as $obj ){ ?>
						    <option value="<?= $obj['id'] ?>"><?= $obj['titulo'] ?></option>
						    <?php } } ?>
						  </select>
						  <label for="input_prova"><?= $this->lang->line('page_title_exams') ?></label>
						</div>

		  			<div class="form-floating mb-3">
						  <select name="input_aluno" class="form-control select2" id="input_aluno" autocomplete="off">
						    <option selected value=""><?= $this->lang->line('form_todos') ?></option>
						    <?php if( false !== $list_4 && is_array( $list_4 ) ){ ?>
						    <?php foreach( $list_4 as $obj ){ ?>
						    <option value="<?= $obj['id'] ?>"><?= $obj['nome'] ?></option>
						    <?php } } ?>
						  </select>
						  <label for="input_aluno"><?= $this->lang->line('page_title_students') ?></label>
						</div>

						<button class="btn btn-lg btn-primary" type="submit"><i class="fa-solid fa-file-export"></i></button>

					</form>

			  </div>
			</div>
		</div>
		<?php } ?>


	<?php if( $controller->_hasUserPermission('reports/reports/datailstudent') ){ ?>
		<div class="col-md-4 col-sm-6">
			<div class="card shadow-sm mb-4">
			  <div class="card-header bg-gradient-dark py-3">
			    <h6 class="m-0 font-weight-bold">
			    	<i class="fa-solid fa-book-open-reader"></i> <?= $this->lang->line('detalhado_aluno') ?>
			    </h6>
			  </div>
			  <div class="card-body">
		    	<form action="<?= site_url('reports/reports/datailstudent') ?>" method="post" target="_blank">
		  			
		  			<div class="form-floating mb-3">
						  <select name="input_turma" class="form-control select2" id="input_turma" autocomplete="off">
						    <option selected value=""><?= $this->lang->line('form_todos') ?></option>
						    <?php if( false !== $list_1 && is_array( $list_1 ) ){ ?>
						    <?php foreach( $list_1 as $obj ){ ?>
						    <option value="<?= $obj['id'] ?>"><?= $obj['turma'] ?></option>
						    <?php } } ?>
						  </select>
						  <label for="input_turma"><?= $this->lang->line('page_title_classrooms') ?></label>
						</div>
		  			
		  			<div class="form-floating mb-3">
						  <select name="input_agenda" class="form-control select2" id="input_agenda" autocomplete="off">
						    <option selected value=""><?= $this->lang->line('form_todos') ?></option>
						    <?php if( false !== $list_2 && is_array( $list_2 ) ){ ?>
						    <?php foreach( $list_2 as $obj ){ ?>
						    <option value="<?= $obj['id'] ?>"><?= date( 'd/m/Y', strtotime( $obj['dt_inicio'] ) ) ?></option>
						    <?php } } ?>
						  </select>
						  <label for="input_agenda"><?= $this->lang->line('page_title_schedules') ?></label>
						</div>

		  			<div class="form-floating mb-3">
						  <select name="input_prova" class="form-control select2" id="input_prova" autocomplete="off">
						    <option selected value=""><?= $this->lang->line('form_todos') ?></option>
						    <?php if( false !== $list_3 && is_array( $list_3 ) ){ ?>
						    <?php foreach( $list_3 as $obj ){ ?>
						    <option value="<?= $obj['id'] ?>"><?= $obj['titulo'] ?></option>
						    <?php } } ?>
						  </select>
						  <label for="input_prova"><?= $this->lang->line('page_title_exams') ?></label>
						</div>

		  			<div class="form-floating mb-3">
						  <select name="input_aluno" class="form-control select2" id="input_aluno" autocomplete="off">
						    <option selected value=""><?= $this->lang->line('form_todos') ?></option>
						    <?php if( false !== $list_4 && is_array( $list_4 ) ){ ?>
						    <?php foreach( $list_4 as $obj ){ ?>
						    <option value="<?= $obj['id'] ?>"><?= $obj['nome'] ?></option>
						    <?php } } ?>
						  </select>
						  <label for="input_aluno"><?= $this->lang->line('page_title_students') ?></label>
						</div>

						<button class="btn btn-lg btn-primary" type="submit"><i class="fa-solid fa-file-export"></i></button>

					</form>

			  </div>
			</div>
		</div>
		<?php } ?>
		
	</div>

</div>