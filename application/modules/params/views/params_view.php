<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>

	  <?php if( $controller->_hasUserPermission('params/param/insert') ){ ?>
	  <a class="btn btn-dark" href="<?= site_url('params/param/insert') ?>"><i class="fa-solid fa-plus"></i></a>
	  <?php } ?>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card shadow-sm mb-4">
			  <div class="card-body">
					<table id="paramsTable" class="table table-borderless table-hover table-sm table-striped w-100">
						<thead>
					    <tr>
				        <th><?= $this->lang->line('table_parametro') ?></th>
				        <th></th>
					    </tr>
						</thead>
						<tbody>
							<?php if( false !== $items && is_array( $items ) ){ ?>
							<?php foreach( $items as $item ){ ?>
					    <tr data-id="<?= $item['id'] ?>">
				        <td><?= $item['parametro'] ?></td>
				        <td class="ajax-ations">
				        	<?php if( $controller->_hasUserPermission('params/param/index') || $controller->_hasUserPermission('params/param/edit') || $controller->_hasUserPermission('params/detail/index') ){ ?>
				        	<div class="btn-group" role="group">
								    <button type="button" class="btn btn-sm btn-outline-dark dropdown-toggle no-arrow py-0" data-bs-toggle="dropdown" aria-expanded="false">
								    	<i class="fa-solid fa-ellipsis-vertical"></i>
								    </button>

								    <ul class="dropdown-menu dropdown-menu-end shadow py-0">
								    	<?php if( $controller->_hasUserPermission('params/param/index') ){ ?>
								      <li><a class="dropdown-item py-2" href="<?= site_url('params/param/') ?><?= $item['id'] ?>"><i class="fa-regular fa-eye mr-1"></i> <?= $this->lang->line('form_visualizar') ?></a></li>
								      <?php } ?>
								      <?php if( $controller->_hasUserPermission('params/param/edit') ){ ?>
								      <li><a class="dropdown-item py-2" href="<?= site_url('params/param/edit/') ?><?= $item['id'] ?>"><i class="fa-regular fa-pen-to-square mr-1"></i> <?= $this->lang->line('form_editar') ?></a></li>
								      <?php } ?>
								      <?php if( $controller->_hasUserPermission('params/detail/index') ){ ?>
								      <li><a class="dropdown-item py-2" href="<?= site_url('params/detail/') ?><?= $item['id'] ?>"><i class="fa-solid fa-list-ul mr-1"></i> <?= $this->lang->line('form_listar') ?></a></li>
								      <?php } ?>
								    </ul>
								    
								  </div>
						    <?php } ?>
				        </td>
					    </tr>
					    <?php } ?>
					    <?php } ?>
						</tbody>
					</table>
			  </div>
			  
			</div>
		</div>
	</div>
	
</div>