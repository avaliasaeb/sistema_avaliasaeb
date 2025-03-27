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
					<table id="myexamsTable" class="table table-borderless table-hover table-sm table-striped w-100" filename="<?= $this->lang->line('export_user') ?>">
						<thead>
					    <tr>
				        <th><span class="d-none"><?= $this->lang->line('table_status') ?></span></th>
				        <th><?= $this->lang->line('table_titulo') ?><div class="select"></div></th>
				        <th><?= $this->lang->line('form_dtinicio') ?></th>
				        <th><?= $this->lang->line('form_dtafim') ?></th>
				        <th><?= $this->lang->line('form_dtrealizacao') ?></th>
					    </tr>
						</thead>
						<tbody>
							<?php if( false !== $items && is_array( $items ) ){ ?>
							<?php foreach( $items as $item ){ 
								$inicio = strtotime( $item['dt_inicio'] );
								$termino = strtotime( $item['dt_fim'] );
								$realizado = strtotime( $item['dt_realizado'] );
							?>
					    <tr data-id="<?= $item['id_detalhe'] ?>">
					    	<td><?= $item['status'] == 1 ? '<i class="fa-solid fa-circle text-success" title="'.$this->lang->line('table_ativo').'"></i><span class="d-none">'.$this->lang->line('table_ativo').'</span>' : '<i class="fa-solid fa-circle text-danger" title="'.$this->lang->line('table_inativo').'"></i><span class="d-none">'.$this->lang->line('table_inativo').'</span>'; ?></td>
				        <td><?= $item['titulo'] ?></td>
				        <td><?= date( 'd/m/Y', $inicio ) ?></td>
				        <td><?= date( 'd/m/Y', $termino ) ?></td>
				        <td>
				        	<?php if( $item['dt_realizado'] != NULL ){ ?>
				        	<?php echo date( 'd/m/Y H:i:s', $realizado ); ?>
				        	<?php }else{ ?>
			        		<?php if( $item['status'] == 1 ){ ?>
			        		<?php if( time() < date( 'd/m/Y', $inicio ) ){ ?>
			        		<?= $this->lang->line('form_aguarde') ?>
			        		<?php }else{ ?>
			        		<?php if( time() > $termino ){ ?>
			        		<?= $this->lang->line('form_perdido') ?>
				        	<?php }else{ ?>
				        	<a href="<?= site_url('myexams/myexam/') ?><?= $item['id_agenda'] ?>/<?= $item['id_prova'] ?>/<?= $item['id_detalhe'] ?>" class="btn btn-sm btn-success">
				        		<?= $this->lang->line('form_iniciar') ?>
				        	</a>
					        <?php } ?>
					        <?php } ?>
					        <?php }else{ ?>
					        <?php echo '-'; ?>
					        <?php } ?>
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