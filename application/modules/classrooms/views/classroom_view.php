<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">
		<div class="col-lg-8">
		  <div class="card">
		  	<div class="card-body">
		    	<form>
		      	<div class="row">
		      		<div class="col-12">
				  			<div class="form-floating mb-3">
								  <input type="text" class="form-control" id="input_turma" value="<?= $item['turma'] ?>" readonly>
								  <label for="input_turma"><?= $this->lang->line('form_turma_nome') ?></label>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-between">
							<a class="btn btn-lg btn-outline-dark" href="<?= site_url('classrooms') ?>"><i class="fa-solid fa-chevron-left"></i> <?= $this->lang->line('form_voltar') ?></a>
							<?php if( $controller->_hasUserPermission('classrooms/classroom/edit') ){ ?>
							<a class="btn btn-lg btn-dark" href="<?= site_url('classrooms/classroom/edit/') ?><?= $item['id'] ?>"><i class="far fa-edit"></i> <?= $this->lang->line('form_editar') ?></a>
							<?php } ?>
						</div>
				  </form>
		  	</div>
		  </div>

		</div>
	</div>
</div>
