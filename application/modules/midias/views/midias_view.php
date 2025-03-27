<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">

		<div class="col-md-6 mb-4">
	  	<form action="<?= site_url('midias/midias/upload') ?>" method="post" enctype="multipart/form-data">
	  		<div class="d-flex">
	  			<div class="form-floating">
					  <input type="file" name="input_media" class="form-control" id="input_media" required autocomplete="off">
					  <label for="input_media"><?= $this->lang->line('form_evento_media') ?></label>
					</div>
					<button class="btn btn-primary" type="submit"><i class="fa-solid fa-check"></i> <?= $this->lang->line('form_salvar') ?></button>
				</div>
		  </form>
		</div>

		<div class="col-12">
			<div class="card shadow-sm mb-4">
			  <div class="card-body">
					<table class="table table-borderless table-hover table-sm table-striped w-100">
						<thead>
					    <tr>
				        <th style="width:275px"></th>
				        <th></th>
					    </tr>
						</thead>
						<tbody>
							<?php if( false !== $items && is_array( $items ) ){ ?>
							<?php foreach( $items as $item ){ ?>
					    <tr data-id="<?= $item['file'] ?>">
				        <td><img src="<?= $item['path'] ?>" width="275"></td>
				        <td>
				        	<input type="text" class="form-control" readonly value="<?= $item['path'] ?>">
					    <?php } } ?>
						</tbody>
					</table>
			  </div>
			  
			</div>
		</div>
	</div>
	
</div>