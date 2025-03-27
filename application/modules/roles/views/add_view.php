<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">
		<div class="col-lg-8">
		  <div class="card">
		  	<div class="card-body">
		    	<form action="<?= site_url('roles/role/save') ?>" method="post" class="ajax">
		      	<div class="row">
		      		<div class="col-lg-6">
				  			<div class="form-floating mb-3">
								  <input type="text" name="input_nome" class="form-control" id="input_nome" required autocomplete="off">
								  <label for="input_nome"><?= $this->lang->line('form_nome_perfil') ?></label>
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
		      		<div class="col-12">
				  			<div class="form-floating mb-3">
			      			<div class="form-control">
			      				<div class="permission-list">
								    <?php 
								    if( false !== $list && is_array( $list ) ){
									    	$anterior = '';
									    foreach( $list as $obj ){
								    		
								    		$atual = explode( ' ', $obj['descricao'] )[0];
									    	if( $anterior != $atual ){
									    		$anterior = $atual;
									  ?>
							    		<hr class="my-1">
								    <?php } ?>
											<div class="custom-control custom-switch mb-2">
												<input type="hidden" name="input_permission[]" value="1">
											  <input class="custom-control-input" type="checkbox" name="input_permission[]" role="switch" value="<?= $obj['id'] ?>" id="input_permission_<?= $obj['id'] ?>" <?= $obj['id'] == '1' ? 'disabled checked' : '' ?>>
											  <label class="custom-control-label" for="input_permission_<?= $obj['id'] ?>">
											    <?= $obj['descricao'] ?>
											  </label>
											</div>
									  <?php } } ?>
									  </div>
									</div>
  		      			<label><?= $this->lang->line('form_permissoes') ?></label>
  		      		</div>
							</div>
						</div>
						<div class="d-flex justify-content-between">
							<a class="btn btn-lg btn-outline-dark" href="<?= site_url('roles') ?>"><i class="fa-solid fa-xmark"></i> <?= $this->lang->line('form_cancelar') ?></a>
							<button class="btn btn-lg btn-dark" type="submit"><i class="fa-solid fa-check"></i> <?= $this->lang->line('form_salvar') ?></button>
						</div>
				  </form>
		  	</div>
		  </div>

		</div>
	</div>
</div>
