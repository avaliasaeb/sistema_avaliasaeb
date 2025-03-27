<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">
		<div class="col-lg-8">
		  <div class="card">
		  	<div class="card-body">
		    	<form action="<?= site_url('classrooms/classroom/update') ?>" method="post" class="ajax">
		  			<input type="hidden" name="input_id" value="<?= $item['id'] ?>">
		      	<div class="row">
		      		<div class="col-12">
				  			<div class="form-floating mb-3">
								  <input type="text" name="input_turma" class="form-control" id="input_turma" value="<?= $item['turma'] ?>" required autofocus autocomplete="off">
								  <label for="input_turma"><?= $this->lang->line('form_turma_nome') ?></label>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-between">
							<a class="btn btn-lg btn-outline-dark" href="<?= site_url('params') ?>"><i class="fa-solid fa-xmark"></i> <?= $this->lang->line('form_cancelar') ?></a>
							<button class="btn btn-lg btn-dark" type="submit"><i class="fa-solid fa-check"></i> <?= $this->lang->line('form_salvar') ?></button>
						</div>
				  </form>
		  	</div>
		  </div>

		</div>
	</div>
</div>
