<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

		<div class="card">
	  	<div class="card-body">
	  		<form>
	  			<div class="row">
	  				<div class="col-lg-5">
	  					<div class="row">
			  				<div class="col-12">
					  			<div class="form-floating mb-3">
									  <input type="text" name="input_titulo" class="form-control" id="input_titulo" required autocomplete="off" value="<?= $item['titulo'] ?>">
									  <label for="input_titulo"><?= $this->lang->line('form_titulo') ?></label>
									</div>
								</div>
								<div class="col-12">
					  			<div class="form-floating mb-3">
					  				<textarea name="input_descricao" class="form-control" id="input_descricao" style="height: 300px"><?= $item['descricao'] ?></textarea>
									  <label for="input_descricao"><?= $this->lang->line('form_descricao') ?></label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<table id="listaQuestoes" class="table">
							  <thead>
							    <tr>
							      <th scope="col" style="width: 50px;">#</th>
							      <th scope="col">Questão</th>
							    </tr>
							  </thead>
							  <tbody>
						  	<?php if( false !== $list && is_array( $list ) ){ $count = 1; ?>
							    <?php foreach( $list as $que ){ ?>
    							<tr>
      							<th scope="row">
      								<span class="item-count"><?= $count++ ?></span>
      								<input type="hidden" name="input_questao[]" value="<?= $que['id_questao'] ?>">
							      </th>
							      <td>
      								<div style="max-height: 150px; overflow-x: auto;">
      									[<?= $que['descritor'] ?>] <?= $que['enunciado'] ?>
      								</div>
      							</td>
      						</tr>
							  <?php } } ?>
							  </tbody>
							</table>

						</div>
					</div>
					<div class="d-flex justify-content-between">
						<a class="btn btn-lg btn-outline-dark" href="<?= site_url('exams') ?>"><i class="fa-solid fa-chevron-left"></i> <?= $this->lang->line('form_voltar') ?></a>
						<?php if( $controller->_hasUserPermission('exams/exam/edit') ){ ?>
						<a class="btn btn-lg btn-dark" href="<?= site_url('exams/exam/edit/') ?><?= $item['id'] ?>"><i class="far fa-edit"></i> <?= $this->lang->line('form_editar') ?></a>
						<?php } ?>
					</div>
	  		</form>
	  	</div>
	  </div>

</div>
