<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>

	  <?php if( $controller->_hasUserPermission('classrooms/classroom/insert') ){ ?>
	  <a class="btn btn-dark" href="<?= site_url('classrooms/classroom/insert') ?>"><i class="fa-solid fa-plus"></i></a>
	  <?php } ?>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card shadow-sm mb-4">
			  <div class="card-body">
					<table id="classTable" class="table table-borderless table-hover table-sm table-striped w-100">
						<thead>
					    <tr>
				        <th></th>
				        <th><?= $this->lang->line('table_turma') ?></th>
				        <th></th>
					    </tr>
						</thead>
						<tbody>
							<?php if( false !== $items && is_array( $items ) ){ ?>
							<?php foreach( $items as $item ){ ?>
					    <tr data-id="<?= $item['id'] ?>">
					    	<td><?= $item['status'] == 1 ? '<i class="fa-solid fa-circle text-success" title="'.$this->lang->line('table_ativo').'"></i><span class="d-none">'.$this->lang->line('table_ativo').'</span>' : '<i class="fa-solid fa-circle text-danger" title="'.$this->lang->line('table_inativo').'"></i><span class="d-none">'.$this->lang->line('table_inativo').'</span>'; ?></td>
					    	<td><?= $item['turma'] ?></td>
				        <td class="ajax-ations">
				        	<?php if( $controller->_hasUserPermission('classrooms/classroom/index') || $controller->_hasUserPermission('classrooms/classroom/edit') || $controller->_hasUserPermission('params/detail/index') ){ ?>
				        	<div class="btn-group" role="group">
								    <button type="button" class="btn btn-sm btn-outline-dark dropdown-toggle no-arrow py-0" data-bs-toggle="dropdown" aria-expanded="false">
								    	<i class="fa-solid fa-ellipsis-vertical"></i>
								    </button>

								    <ul class="dropdown-menu dropdown-menu-end shadow py-0">
								    	<?php if( $controller->_hasUserPermission('classrooms/classroom/index') ){ ?>
								      <li><a class="dropdown-item py-2" href="<?= site_url('classrooms/classroom/') ?><?= $item['id'] ?>"><i class="fa-regular fa-eye mr-1"></i> <?= $this->lang->line('form_visualizar') ?></a></li>
								      <?php } ?>
								      <?php if( $controller->_hasUserPermission('classrooms/classroom/edit') ){ ?>
								      <li><a class="dropdown-item py-2" href="<?= site_url('classrooms/classroom/edit/') ?><?= $item['id'] ?>"><i class="fa-regular fa-pen-to-square mr-1"></i> <?= $this->lang->line('form_editar') ?></a></li>
								      <?php } ?>
								      <?php if( $item['status'] == 1 ){ ?>
								      <li><a class="dropdown-item py-2 ajax" href="<?= site_url('classrooms/classroom/disable/') ?><?= $item['id'] ?>"><i class="fa-solid fa-circle text-danger mr-1"></i> <?= $this->lang->line('form_inativar') ?></a></li>
								      <?php }else{ ?>
								      <li><a class="dropdown-item py-2 ajax" href="<?= site_url('classrooms/classroom/enable/') ?><?= $item['id'] ?>"><i class="fa-solid fa-circle text-success mr-1"></i> <?= $this->lang->line('form_ativar') ?></a></li>
								      <?php } ?>									    </ul>
								    
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