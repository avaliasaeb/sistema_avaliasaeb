<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card shadow-sm mb-4">
			  <div class="card-body">
		  		
		  		<form action="<?= site_url('schedules/schedule/save') ?>" method="post" class="ajax">
		  			<input type="hidden" name="input_aluno[]" value="">

		  			<div class="row">

		  				<div class="col-12">
				  			<div class="form-floating mb-3">
								  <select name="input_prova" class="form-control select2" id="input_prova" required autocomplete="off">
								  	<option selected value="">Selecione</option>
								    <?php foreach ( $lista as $key => $prova ){ ?>
								    <option value="<?= $prova['id'] ?>"><?= $prova['titulo'] ?> | <?= $prova['descricao'] ?></option>
										<?php } ?>
								  </select>
								  <label for="input_prova"><?= $this->lang->line('page_title_exam') ?></label>
								</div>
							</div>

		  				<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <input type="date" name="input_dtinicio" class="form-control" id="input_dtinicio">
								  <label for="input_dtinicio"><?= $this->lang->line('form_dtinicio') ?></label>
								</div>
							</div>							

		  				<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <input type="date" name="input_dtfim" class="form-control" id="input_dtfim">
								  <label for="input_dtfim"><?= $this->lang->line('form_dtafim') ?></label>
								</div>
							</div>							

						</div>

						<p><strong><?= $this->lang->line('page_title_schedules') ?></strong></p>
						<hr>

						<table id="scheduleTable" class="table table-borderless table-hover table-sm table-striped w-100" filename="<?= $this->lang->line('export_user') ?>">
							<thead class="border-bottom">
						    <tr>
					        <th></th>
					        <th><?= $this->lang->line('table_turma') ?><div class="select"></div></th>
					        <th><?= $this->lang->line('table_nome') ?><div class="select"></div></th>
						    </tr>
							</thead>
							<tbody>
								<?php if( false !== $items && is_array( $items ) ){ ?>
								<?php foreach( $items as $item ){ ?>
						    <tr data-id="<?= $item['id'] ?>">
						    	<td>
									  <input type="checkbox" name="input_aluno[]" value="<?= $item['id'] ?>" id="input_aluno_<?= $item['id'] ?>">
						    	</td>
					        <td><?= $item['turma'] ?></td>
					        <td><?= $item['nome'] ?></td>
						    </tr>
						    <?php } } ?>
							</tbody>
						</table>

						<div class="d-flex justify-content-between mt-4">
							<a class="btn btn-lg btn-outline-dark" href="<?= site_url('schedules') ?>"><i class="fa-solid fa-xmark"></i> <?= $this->lang->line('form_cancelar') ?></a>
							<button class="btn btn-lg btn-dark" type="submit"><i class="fa-solid fa-check"></i> <?= $this->lang->line('form_salvar') ?></button>
						</div>

		  		</form>
			  </div>
			  
			</div>
		</div>
	</div>
	
</div>