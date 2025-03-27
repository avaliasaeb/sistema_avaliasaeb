<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

		<div class="card">
	  	<div class="card-body">
	  		<form action="<?= site_url('exams/exam/save') ?>" method="post" class="ajax">
	  			<input type="hidden" name="input_questao[]" value="">
	  			<div class="row">
	  				<div class="col-lg-5">
	  					<div class="row">
			  				<div class="col-12">
					  			<div class="form-floating mb-3">
									  <input type="text" name="input_titulo" class="form-control" id="input_titulo" required autocomplete="off">
									  <label for="input_titulo"><?= $this->lang->line('form_titulo') ?></label>
									</div>
								</div>
								<div class="col-12">
					  			<div class="form-floating mb-3">
					  				<textarea name="input_descricao" class="form-control" id="input_descricao" style="height: 300px"></textarea>
									  <label for="input_descricao"><?= $this->lang->line('form_descricao') ?></label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="input-group mb-3">
				  			<div class="form-floating">
								  <select name="select_add_questao" class="form-control select2" id="select_add_questao"autocomplete="off">
								    <option selected value=""><?= $this->lang->line('form_selecione') ?></option>
								    <?php if( false !== $items && is_array( $items ) ){ ?>
								    <?php foreach( $items as $obj ){ ?>
								    <option value="<?= $obj['id'] ?>">[<?= $obj['descritor'] ?>] <?= $obj['enunciado'] ?></option>
								    <?php } } ?>
								  </select>
								  <label for="select_add_questao"><?= $this->lang->line('inserir_questao') ?></label>
								</div>
								<button id="input_add_questao" class="btn btn-outline-secondary" type="button" id="button-addon2">
									<i class="fa-solid fa-plus"></i>
								</button>
							</div>

							<table id="listaQuestoes" class="table">
							  <thead>
							    <tr>
							      <th scope="col" style="width: 50px;">#</th>
							      <th scope="col">Questão</th>
							      <th scope="col" style="width: 90px;"></th>
							    </tr>
							  </thead>
							  <tbody></tbody>
							</table>


						</div>
					</div>
					<div class="d-flex justify-content-between">
						<a class="btn btn-lg btn-outline-dark" href="<?= site_url('exams') ?>"><i class="fa-solid fa-xmark"></i> <?= $this->lang->line('form_cancelar') ?></a>
						<button class="btn btn-lg btn-dark" type="submit"><i class="fa-solid fa-check"></i> <?= $this->lang->line('form_salvar') ?></button>
					</div>
	  		</form>
	  	</div>
	  </div>

</div>
