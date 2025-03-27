<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">
		<div class="col-lg-8">
			<div class="card">
		  	<div class="card-body">
		  		<p><?= $item['status'] == 1 ? '<i class="fa-solid fa-circle text-success" title="'.$this->lang->line('table_ativo').'"></i> '.$this->lang->line('table_ativo').'' : '<i class="fa-solid fa-circle text-danger" title="'.$this->lang->line('table_inativo').'"></i> '.$this->lang->line('table_inativo'); ?></p>
		  		<form>
		  			<div class="row">
		  				<div class="col-12">
				  			<div class="form-floating mb-3">
								  <input type="text" name="input_descritor" class="form-control" id="input_descritor" value="<?= $item['descritor'] ?>" readonly>
								  <label for="input_descritor"><?= $this->lang->line('form_descritor') ?></label>
								</div>
							</div>
		  				<div class="col-12">
				  			<div class="form-floating mb-3">
				  				<textarea name="input_titulo" class="form-control" id="input_titulo" readonly style="height: 100px"><?= $item['titulo'] ?></textarea>
								  <label for="input_titulo"><?= $this->lang->line('form_titulo') ?></label>
								</div>
							</div>
							<div class="col-12">
				  			<div class="form-floating mb-3">
				  				<textarea name="input_enunciado" class="form-control" id="input_enunciado" readonly style="height: 200px"><?= $item['enunciado'] ?></textarea>
								  <label for="input_enunciado"><?= $this->lang->line('form_enunciado') ?></label>
								</div>
							</div>
							<?php if( ! is_null( $item['imagem'] )){ ?>
							<div class="col-12">
				  			<div class="form-floating mb-3">
				  				<img src="<?= $item['imagem'] ?>" class="img-fluid">
								</div>
							</div>
							<?php } ?>
							<div class="col-12 mb-3">
				  			<div class="form-floating">
				  				<textarea name="input_resposta_1" class="form-control" id="input_resposta_1" readonly style="height: 100px"><?= $item['resposta_1'] ?></textarea>
								  <label for="input_resposta_1"><?= $this->lang->line('form_alternativa') ?> 1 (<?= $this->lang->line('questao_correta') ?>)</label>
								</div>
							</div>
							<div class="col-12">
				  			<div class="form-floating mb-3">
				  				<textarea name="input_resposta_2" class="form-control" id="input_resposta_2" readonly style="height: 100px"><?= $item['resposta_2'] ?></textarea>
								  <label for="input_resposta_2"><?= $this->lang->line('form_alternativa') ?> 2</label>
								</div>
							</div>
							<div class="col-12">
				  			<div class="form-floating mb-3">
				  				<textarea name="input_resposta_3" class="form-control" id="input_resposta_3" readonly style="height: 100px"><?= $item['resposta_3'] ?></textarea>
								  <label for="input_resposta_3"><?= $this->lang->line('form_alternativa') ?> 3</label>
								</div>
							</div>
							<div class="col-12">
				  			<div class="form-floating mb-3">
				  				<textarea name="input_resposta_4" class="form-control" id="input_resposta_4" readonly style="height: 100px"><?= $item['resposta_4'] ?></textarea>
								  <label for="input_resposta_4"><?= $this->lang->line('form_alternativa') ?> 4</label>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-between">
							<a class="btn btn-lg btn-outline-dark" href="<?= site_url('questions') ?>"><i class="fa-solid fa-chevron-left"></i> <?= $this->lang->line('form_voltar') ?></a>
							<?php if( $controller->_hasUserPermission('questions/question/edit') ){ ?>
							<a class="btn btn-lg btn-dark" href="<?= site_url('questions/question/edit/') ?><?= $item['id'] ?>"><i class="far fa-edit"></i> <?= $this->lang->line('form_editar') ?></a>
							<?php } ?>
						</div>
		  		</form>
		  	</div>
  		</div>
		</div>
	</div>
</div>
