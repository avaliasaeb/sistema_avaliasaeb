<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">
		<div class="col-lg-8">
		  <div class="card">
		  	<div class="card-body">
		    	<form action="<?= site_url('params/detail/update') ?>" method="post" class="ajax">
		  			<input type="hidden" name="input_id_param" value="<?= $list['id'] ?>">
		  			<input type="hidden" name="input_id" value="<?= $item['id'] ?>">
		      	<div class="row">
		      		<div class="col-12">
				  			<div class="form-floating mb-3">
								  <input type="text" name="input_parametro" class="form-control" id="input_parametro" value="<?= $item['parametro'] ?>" required autofocus autocomplete="off">
								  <label for="input_parametro"><?= $this->lang->line('form_parametro_nome') ?></label>
								</div>
							</div>
		      		<div class="col-12">
				  			<div class="form-floating mb-3">
								  <select name="input_status" class="form-control" id="input_status" required autocomplete="off">
								    <option selected value="">Selecione um status</option>
								    <option <?= $item['status'] == 1 ? 'selected' : '' ?> value="1"><?= $this->lang->line('form_ativo') ?></option>
								    <option <?= $item['status'] == 0 ? 'selected' : '' ?> value="0"><?= $this->lang->line('form_inativo') ?></option>
								  </select>
								  <label for="input_status"><?= $this->lang->line('form_status') ?></label>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-between">
							<a class="btn btn-lg btn-outline-dark" href="<?= site_url('params/detail/') ?><?= $list['id'] ?>"><i class="fa-solid fa-xmark"></i> <?= $this->lang->line('form_cancelar') ?></a>
							<button class="btn btn-lg btn-dark" type="submit"><i class="fa-solid fa-check"></i> <?= $this->lang->line('form_salvar') ?></button>
						</div>
				  </form>
		  	</div>
		  </div>

		</div>
	</div>
</div>
