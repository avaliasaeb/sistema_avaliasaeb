<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card shadow-sm mb-4">
				<div class="card-body">
	  			<p>
					  <strong><?= $this->lang->line('form_titulo') ?>:</strong><br>
					  <?= $item['titulo'] ?>
					</p>
	  			<p>
					  <strong><?= $this->lang->line('form_descricao') ?>:</strong><br>
					  <?= $item['descricao'] ?>
					</p>
				</div>
			</div>
			  
  		<form action="<?= site_url('myexams/myexam/save') ?>" method="post" class="ajax"> 
  			<input type="hidden" name="teste[]" value="<?= $items[0]['id_usuario'] ?>">
  			<input type="hidden" name="teste[]" value="<?= $items[0]['id_prova'] ?>">
  			<input type="hidden" name="teste[]" value="<?= $items[0]['id_agenda'] ?>">
  			<input type="hidden" name="teste[]" value="<?= $items[0]['id_detalhe'] ?>">

		  	<?php if( false !== $items && is_array( $items ) ){ $count = 1; $resp = [1, 2, 3, 4]; ?>
		    <?php foreach( $items as $que ){ ?>
	    	<div class="card shadow-sm mb-4">
	  			<fieldset class="card-body">
	  				
	  				<input type="hidden" name="questao[]" value="<?= $que['id_questao'] ?>">
		  			<div>
						  <p><strong><?= $count ?>) Enunciado:</strong><br><?= $que['enunciado'] ?></p>
							<?php if( ! is_null( $que['imagem'] ) ){ ?>
								<img src="<?= $que['imagem'] ?>" class="img-fluid my-3">
							<?php } ?>
						  <p><strong>Resposta:</strong><br></p>

						  <?php shuffle( $resp ); ?>
						  <?php foreach( $resp as $r ){ ?>
					  	<div class="bg-light border p-3">
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="resposta_<?= $count -1 ?>[]" id="resposta<?= $count ?><?= $r ?>" value="<?= $r ?>" required>
								  <label class="form-check-label" for="resposta<?= $count ?><?= $r ?>">
								    <?= $que['resposta_' . $r] ?>
								  </label>
								</div>
							</div>
						<?php } ?>

						</div>
	  				
	  			</fieldset>
	  		</div>
			  <?php $count++; } } ?>

				<div class="d-flex justify-content-between">
					<button class="btn btn-lg btn-dark" type="submit"><i class="fa-solid fa-check"></i> <?= $this->lang->line('form_salvar') ?></button>
				</div>

			</form>

		</div>
	</div>
	
</div>