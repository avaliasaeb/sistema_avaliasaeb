<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>

	  <?php if( $controller->_hasUserPermission('exams/exam/insert') ){ ?>
	  <a class="btn btn-dark" href="<?= site_url('exams/exam/insert') ?>"><i class="fa-solid fa-plus"></i></a>
	  <?php } ?>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card shadow-sm mb-4">
			  <div class="card-body">
					<table id="examsTable" class="table table-borderless table-hover table-sm table-striped w-100" filename="<?= $this->lang->line('export_user') ?>">
						<thead>
					    <tr>
				        <th><span class="d-none"><?= $this->lang->line('table_status') ?></span></th>
				        <th><?= $this->lang->line('table_titulo') ?><div class="select"></div></th>
				        <th><?= $this->lang->line('form_descricao') ?></th>
				        <th></th>
					    </tr>
						</thead>
						<tbody>
							<?php if( false !== $items && is_array( $items ) ){ ?>
							<?php foreach( $items as $item ){ ?>
					    <tr data-id="<?= $item['id'] ?>">
					    	<td><?= $item['status'] == 1 ? '<i class="fa-solid fa-circle text-success" title="'.$this->lang->line('table_ativo').'"></i><span class="d-none">'.$this->lang->line('table_ativo').'</span>' : '<i class="fa-solid fa-circle text-danger" title="'.$this->lang->line('table_inativo').'"></i><span class="d-none">'.$this->lang->line('table_inativo').'</span>'; ?></td>
				        <td><?= $item['titulo'] ?></td>
				        <td><?= $item['descricao'] ?></td>
				        <td class="ajax-ations">
							    <?php if( $controller->_hasUserPermission('exams/exam/index') || $controller->_hasUserPermission('exams/exam/edit') ){ ?>
				        	<div class="btn-group" role="group">
								    <button type="button" class="btn btn-sm btn-outline-dark dropdown-toggle no-arrow py-0" data-bs-toggle="dropdown" aria-expanded="false">
								    	<i class="fa-solid fa-ellipsis-vertical"></i>
								    </button>

								    <ul class="dropdown-menu dropdown-menu-end shadow py-0">
								    	<?php if( $controller->_hasUserPermission('exams/exam/index') ){ ?>
								      <li><a class="dropdown-item py-2" href="<?= site_url('exams/exam/') ?><?= $item['id'] ?>"><i class="fa-regular fa-eye mr-1"></i> <?= $this->lang->line('form_visualizar') ?></a></li>
								      <?php } ?>

								      <?php if( $controller->_hasUserPermission('exams/exam/edit') && $item['alteravel'] == 1 ){ ?>
								      <li><a class="dropdown-item py-2" href="<?= site_url('exams/exam/edit/') ?><?= $item['id'] ?>"><i class="fa-regular fa-pen-to-square mr-1"></i> <?= $this->lang->line('form_editar') ?></a></li>

								      <?php if( $item['status'] == 1 ){ ?>
								      <li><a class="dropdown-item py-2 ajax" href="<?= site_url('exams/exam/disable/') ?><?= $item['id'] ?>"><i class="fa-solid fa-circle text-danger mr-1"></i> <?= $this->lang->line('form_inativar') ?></a></li>
								      <?php }else{ ?>
								      <li><a class="dropdown-item py-2 ajax" href="<?= site_url('exams/exam/enable/') ?><?= $item['id'] ?>"><i class="fa-solid fa-circle text-success mr-1"></i> <?= $this->lang->line('form_ativar') ?></a></li>
								      <?php } ?>
								      <?php } ?>
								    </ul>
								  </div>
							    <?php } ?>
				        </td>
					    </tr>
					    <?php } } ?>
						</tbody>
					</table>
			  </div>
			  
			</div>
		</div>
	</div>
	
</div>