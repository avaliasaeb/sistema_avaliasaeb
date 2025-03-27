<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">
		<div class="col-lg-8">
		  <div class="card">
		  	<div class="card-body">
		    	<form action="<?= site_url('students/student/save') ?>" method="post" class="ajax">
		      	<div class="row">
		      		<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <input type="text" name="input_nome" class="form-control" id="input_nome" required autocomplete="off">
								  <label for="input_nome"><?= $this->lang->line('form_nome_completo') ?></label>
								</div>
							</div>
		      		<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <select name="input_necessidade" class="form-control" id="input_necessidade" required autocomplete="off">
								    <option selected value=""><?= $this->lang->line('form_selecione') ?></option>
								    <?php if( false !== $list_4 && is_array( $list_4 ) ){ ?>
								    <?php foreach( $list_4 as $obj ){ ?>
								    <option value="<?= $obj['id'] ?>"><?= $obj['necessidade'] ?></option>
								    <?php } } ?>
								  </select>
								  <label for="input_necessidade"><?= $this->lang->line('form_necessidade') ?></label>
								</div>
							</div>
		      		<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <input type="email" name="input_email" class="form-control" id="input_email" required autocomplete="off">
								  <label for="input_email"><?= $this->lang->line('form_email') ?></label>
								</div>
							</div>
		      		<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <select name="input_idioma" class="form-control" id="input_idioma" required autocomplete="off">
								    <?php foreach ( $idiomas as $key => $idioma ){ ?>
								    <option value="<?= $key ?>" <?= $key == 'portuguese-brazilian' ? 'selected' : '' ?>><?= $this->lang->line('form_idioma_' . $idioma ) ?></option>
										<?php } ?>
								  </select>
								  <label for="input_idioma"><?= $this->lang->line('form_idioma') ?></label>
								</div>
							</div>
		      		<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <input type="text" name="input_login" class="form-control" id="input_login" required autocomplete="off">
								  <label for="input_login"><?= $this->lang->line('form_login') ?></label>
								</div>
							</div>
		      		<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <input type="text" name="input_senha" class="form-control strength" id="input_senha" required autocomplete="off">
								  <label for="input_senha"><?= $this->lang->line('form_senha') ?></label>
								</div>
							</div>
		      		<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <select name="input_turma" class="form-control" id="input_turma" required autocomplete="off">
								    <option selected value=""><?= $this->lang->line('form_selecione') ?></option>
								    <?php if( false !== $list_3 && is_array( $list_3 ) ){ ?>
								    <?php foreach( $list_3 as $obj ){ ?>
								    <option value="<?= $obj['id'] ?>"><?= $obj['turma'] ?></option>
								    <?php } } ?>
								  </select>
								  <label for="input_turma"><?= $this->lang->line('form_turma') ?></label>
								</div>
							</div>
		      		<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <select name="input_status" class="form-control" id="input_status" required autocomplete="off">
								    <option selected value=""><?= $this->lang->line('form_selecione') ?></option>
								    <option value="1"><?= $this->lang->line('form_ativo') ?></option>
								    <option value="0"><?= $this->lang->line('form_inativo') ?></option>
								  </select>
								  <label for="input_status"><?= $this->lang->line('form_status') ?></label>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-between">
							<a class="btn btn-lg btn-outline-dark" href="<?= site_url('students') ?>"><i class="fa-solid fa-xmark"></i> <?= $this->lang->line('form_cancelar') ?></a>
							<button class="btn btn-lg btn-dark" type="submit"><i class="fa-solid fa-check"></i> <?= $this->lang->line('form_salvar') ?></button>
						</div>
				  </form>
		  	</div>
		  </div>

		</div>
	</div>
</div>
