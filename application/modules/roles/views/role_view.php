<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">
		<div class="col-lg-8">
		  <div class="card">
		  	<div class="card-body">
		  		<p><?= $item['status'] == 1 ? '<i class="fa-solid fa-circle text-success" title="'.$this->lang->line('table_ativo').'"></i> '.$this->lang->line('table_ativo').'' : '<i class="fa-solid fa-circle text-danger" title="'.$this->lang->line('table_inativo').'"></i> '.$this->lang->line('table_inativo').''; ?></p>
		    	<form>
		      	<div class="row">
		      		<div class="col-12">
				  			<div class="form-floating mb-3">
								  <input type="text" class="form-control" id="input_nome" value="<?= $item['perfil'] ?>" readonly>
								  <label for="input_nome"><?= $this->lang->line('form_nome_perfil') ?></label>
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
											  <input class="custom-control-input" type="checkbox" role="switch" <?= in_array( $obj['id'], $item['permissoes'] ) ? 'checked' : '' ?> id="input_permission_<?= $obj['id'] ?>" disabled>
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
							<a class="btn btn-lg btn-outline-dark" href="<?= site_url('roles') ?>"><i class="fa-solid fa-chevron-left"></i> <?= $this->lang->line('form_voltar') ?></a>
							<?php if( $controller->_hasUserPermission('roles/role/edit') ){ ?>
							<a class="btn btn-lg btn-dark" href="<?= site_url('roles/role/edit/') ?><?= $item['id'] ?>"><i class="far fa-edit"></i> <?= $this->lang->line('form_editar') ?></a>
							<?php } ?>
						</div>
				  </form>
		  	</div>
		  </div>

		</div>
	</div>
</div>
