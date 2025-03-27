<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">
		<div class="col-lg-8">

			<div class="card">
		  	<div class="card-body">
		  		<form action="<?= site_url('questions/question/save') ?>" method="post" class="ajax">
		  			<div class="row">
		  				<div class="col-12">
				  			<div class="form-floating mb-3">
								  <select name="input_descritor" class="form-control" id="input_descritor" required autocomplete="off">
								    <option selected value=""><?= $this->lang->line('form_selecione') ?></option>
								    <?php if( false !== $list && is_array( $list ) ){ ?>
								    <?php foreach( $list as $obj ){ ?>
								    <option value="<?= $obj['id'] ?>"><?= $obj['descritor'] ?></option>
								    <?php } } ?>
								  </select>
								  <label for="input_descritor"><?= $this->lang->line('form_descritor') ?></label>
								</div>
							</div>
		  				<div class="col-12">
				  			<div class="form-floating mb-3">
				  				<textarea name="input_titulo" class="form-control" id="input_titulo" style="height: 100px"></textarea>
								  <label for="input_titulo"><?= $this->lang->line('form_titulo') ?></label>
								</div>
							</div>
							<div class="col-12">
				  			<div class="mb-3">
								  <label for="input_enunciado"><?= $this->lang->line('form_enunciado') ?></label>
				  				<textarea name="input_enunciado" class="form-control richtext" id="input_enunciado" style="height: 200px"></textarea>
								</div>
							</div>
							<div class="col-12">
				  			<div class="form-floating mb-3">
				  				<input type="url" name="input_imagem" class="form-control" id="input_imagem">
								  <label for="input_imagem"><?= $this->lang->line('form_imagem') ?></label>
								</div>
							</div>
							<div class="col-12 mb-3">
				  			<div class="form-floating">
				  				<textarea name="input_resposta_1" class="form-control" id="input_resposta_1" style="height: 100px"></textarea>
								  <label for="input_resposta_1 text-success"><?= $this->lang->line('form_alternativa') ?> 1 (<?= $this->lang->line('questao_correta') ?>)</label>
								</div>
							</div>
							<div class="col-12">
				  			<div class="form-floating mb-3">
				  				<textarea name="input_resposta_2" class="form-control" id="input_resposta_2" style="height: 100px"></textarea>
								  <label for="input_resposta_2"><?= $this->lang->line('form_alternativa') ?> 2</label>
								</div>
							</div>
							<div class="col-12">
				  			<div class="form-floating mb-3">
				  				<textarea name="input_resposta_3" class="form-control" id="input_resposta_3" style="height: 100px"></textarea>
								  <label for="input_resposta_3"><?= $this->lang->line('form_alternativa') ?> 3</label>
								</div>
							</div>
							<div class="col-12">
				  			<div class="form-floating mb-3">
				  				<textarea name="input_resposta_4" class="form-control" id="input_resposta_4" style="height: 100px"></textarea>
								  <label for="input_resposta_4"><?= $this->lang->line('form_alternativa') ?> 4</label>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-between">
							<a class="btn btn-lg btn-outline-dark" href="<?= site_url('questions') ?>"><i class="fa-solid fa-xmark"></i> <?= $this->lang->line('form_cancelar') ?></a>
							<button class="btn btn-lg btn-dark" type="submit"><i class="fa-solid fa-check"></i> <?= $this->lang->line('form_salvar') ?></button>
						</div>
		  		</form>
		  	</div>
		  </div>

		</div>
	</div>
</div>
