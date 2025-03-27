<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card shadow-sm mb-4">
			  <div class="card-body">
		  		
		  		<form>
			  		<p><?= $lista['status'] == 1 ? '<i class="fa-solid fa-circle text-success" title="'.$this->lang->line('table_ativo').'"></i> '.$this->lang->line('table_ativo').'' : '<i class="fa-solid fa-circle text-danger" title="'.$this->lang->line('table_inativo').'"></i> '.$this->lang->line('table_inativo'); ?></p>

		  			<div class="row">

		  				<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <input type="text" name="input_titulo" class="form-control" id="input_titulo" value="<?= $lista['titulo'] ?>" readonly>
								  <label for="input_titulo"><?= $this->lang->line('table_titulo') ?></label>
								</div>
							</div>
		  				
		  				<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <input type="text" name="input_descricao" class="form-control" id="input_descricao" value="<?= $lista['descricao'] ?>" readonly>
								  <label for="input_descricao"><?= $this->lang->line('form_descricao') ?></label>
								</div>
							</div>

		  				<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <input type="text" name="input_dtinicio" class="form-control" id="input_dtinicio" value="<?= date( 'd/m/Y', strtotime( $lista['dt_inicio'] ) ) ?>" readonly>
								  <label for="input_dtinicio"><?= $this->lang->line('form_dtinicio') ?></label>
								</div>
							</div>							

		  				<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <input type="text" name="input_dtfim" class="form-control" id="input_dtfim" value="<?= date( 'd/m/Y', strtotime( $lista['dt_fim'] ) ) ?>" readonly>
								  <label for="input_dtfim"><?= $this->lang->line('form_dtafim') ?></label>
								</div>
							</div>							

						</div>
		  		</form>

					<p><strong><?= $this->lang->line('page_title_students') ?></strong></p>
					<hr>

					<table class="table table-borderless table-hover table-sm table-striped w-100" filename="<?= $this->lang->line('export_user') ?>">
						<thead class="border-bottom">
					    <tr>
				        <th><?= $this->lang->line('table_nome') ?></th>
				        <th><?= $this->lang->line('table_turma') ?></th>
				        <th><?= $this->lang->line('form_dtrealizacao') ?></th>
					    </tr>
						</thead>
						<tbody>
							<?php if( false !== $items && is_array( $items ) ){ ?>
							<?php foreach( $items as $item ){ ?>
					    <tr data-id="<?= $item['id'] ?>">
				        <td><?= $item['nome'] ?></td>
				        <td><?= $item['turma'] ?></td>
				        <td><?= $item['dt_realizado'] != null ? date( 'd/m/Y H:i:s', strtotime( $item['dt_realizado'] ) ) : '-' ?></td>
					    </tr>
					    <?php } } ?>
						</tbody>
					</table>

					<hr>

					<div class="d-flex justify-content-between">
						<a class="btn btn-lg btn-outline-dark" href="<?= site_url('schedules') ?>"><i class="fa-solid fa-chevron-left"></i> <?= $this->lang->line('form_voltar') ?></a>
						<?php if( $controller->_hasUserPermission('schedules/schedule/edit') ){ ?>
						<a class="btn btn-lg btn-dark" href="<?= site_url('schedules/schedule/edit/') ?><?= $lista['id'] ?>"><i class="far fa-edit"></i> <?= $this->lang->line('form_editar') ?></a>
						<?php } ?>
					</div>

			  </div>
			  
			</div>
		</div>
	</div>
	
</div>