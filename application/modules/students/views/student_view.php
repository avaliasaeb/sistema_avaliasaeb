<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">
		<div class="col-lg-8">

			<ul class="nav nav-tabs" id="meuPerfil" role="tablist">
			  <li class="nav-item" role="presentation">
			    <a class="nav-link active" id="meus-dados-tab" data-bs-toggle="tab" data-bs-target="#meus-dados-tab-pane" type="button" role="tab" aria-controls="meus-dados-tab-pane" aria-selected="true">
			    	<?= $this->lang->line('page_profile_1') ?>
			    </a>
			  </li>
			  <li class="nav-item" role="presentation">
			    <a class="nav-link" id="login-senha-tab" data-bs-toggle="tab" data-bs-target="#login-senha-tab-pane" type="button" role="tab" aria-controls="login-senha-tab-pane" aria-selected="false">
			    	<?= $this->lang->line('page_profile_2') ?>
			    </a>
			  </li>
			</ul>

			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane card show active" id="meus-dados-tab-pane" role="tabpanel" aria-labelledby="meus-dados-tab" tabindex="0">
			  	<div class="card-body">
			  		<p><?= $item['status'] == 1 ? '<i class="fa-solid fa-circle text-success" title="'.$this->lang->line('table_ativo').'"></i> '.$this->lang->line('table_ativo').'' : '<i class="fa-solid fa-circle text-danger" title="'.$this->lang->line('table_inativo').'"></i> '.$this->lang->line('table_inativo'); ?></p>
			  		<form>
			  			<div class="row">
			  				<div class="col-md-6">
					  			<div class="form-floating mb-3">
									  <input type="text" name="input_nome" class="form-control" id="input_nome" value="<?= $item['nome'] ?>" readonly>
									  <label for="input_nome"><?= $this->lang->line('form_nome_completo') ?></label>
									</div>
								</div>
			  				<div class="col-md-6">
					  			<div class="form-floating mb-3">
									  <input type="text" name="input_necessidade" class="form-control" id="input_necessidade" value="<?= $item['necessidade'] ?>" readonly>
									  <label for="input_necessidade"><?= $this->lang->line('form_necessidade') ?></label>
									</div>
								</div>
								<div class="col-lg-6">
					  			<div class="form-floating mb-3">
									  <input type="email" name="input_email" class="form-control" id="input_email" value="<?= $item['email'] ?>" readonly>
									  <label for="input_email"><?= $this->lang->line('form_email') ?></label>
									</div>
								</div>
								<div class="col-lg-6">
					  			<div class="form-floating mb-3">
									  <input type="text" class="form-control" id="input_turma" value="<?= $item['turma'] ?>" readonly>
									  <label for="input_turma"><?= $this->lang->line('form_turma') ?></label>
									</div>
								</div>
								<div class="col-lg-6">
					  			<div class="form-floating mb-3">
									  <input type="text" class="form-control" id="input_idioma" value="<?= $this->lang->line('form_idioma_' . $idiomas[$item['idioma']] ) ?>" readonly>
									  <label for="input_idioma"><?= $this->lang->line('form_idioma') ?></label>
									</div>
								</div>
								<div class="col-md-6">
					  			<div class="form-floating mb-3">
									  <input type="date" class="form-control" id="input_dt_cadastro" value="<?= date( 'Y-m-d', strtotime( $item['dt_cadastro'] ) ) ?>" readonly>
									  <label for="input_dt_cadastro"><?= $this->lang->line('form_dtcadastro') ?></label>
									</div>
								</div>
								<div class="col-md-6">
					  			<div class="form-floating mb-3">
									  <input type="date" class="form-control" id="input_dt_atualizacao" value="<?= null !== $item['dt_alteracao'] ? date( 'Y-m-d', strtotime( $item['dt_alteracao'] ) ) : '' ?>" readonly>
									  <label for="input_dt_atualizacao"><?= $this->lang->line('form_dtatualizacao') ?></label>
									</div>
								</div>
								<div class="col-md-6">
					  			<div class="form-floating mb-3">
									  <input type="date" class="form-control" id="input_dt_ativacao" value="<?= null !== $item['dt_ativacao'] ? date( 'Y-m-d', strtotime( $item['dt_ativacao'] ) ) : '' ?>" readonly>
									  <label for="input_dt_ativacao"><?= $this->lang->line('form_dtativacao') ?></label>
									</div>
								</div>
								<div class="col-md-6">
					  			<div class="form-floating mb-3">
									  <input type="date" class="form-control" id="input_dt_inativacao" value="<?= null !== $item['dt_inativacao'] ? date( 'Y-m-d', strtotime( $item['dt_ativacao'] ) ) : '' ?>" readonly>
									  <label for="input_dt_inativacao"><?= $this->lang->line('form_dtinativacao') ?></label>
									</div>
								</div>
								<div class="col-md-6">
					  			<div class="form-floating mb-3">
									  <input type="date" class="form-control" id="input_dt_login" value="<?= null !== $item['dt_login'] ? date( 'Y-m-d', strtotime( $item['dt_login'] ) ) : '' ?>" readonly>
									  <label for="input_dt_login"><?= $this->lang->line('form_dtacesso') ?></label>
									</div>
								</div>
							</div>
							<div class="d-flex justify-content-between">
								<a class="btn btn-lg btn-outline-dark" href="<?= site_url('students') ?>"><i class="fa-solid fa-chevron-left"></i> <?= $this->lang->line('form_voltar') ?></a>
								<?php if( $controller->_hasUserPermission('student/student/edit') ){ ?>
								<?php //o usuário não pode editar a si mesmo
						      if( $item['id'] !== $user['id'] ){ ?>
								<a class="btn btn-lg btn-dark" href="<?= site_url('students/student/edit/') ?><?= $item['id'] ?>"><i class="far fa-edit"></i> <?= $this->lang->line('form_editar') ?></a>
								<?php } ?>
								<?php } ?>
							</div>
			  		</form>
			  	</div>
			  </div>

			  <div class="tab-pane card" id="login-senha-tab-pane" role="tabpanel" aria-labelledby="login-senha-tab" tabindex="0">
			  	<div class="card-body">
			  		<p><?= $item['status'] == 1 ? '<i class="fa-solid fa-circle text-success" title="Ativo"></i> Ativo' : '<i class="fa-solid fa-circle text-danger" title="Inativo"></i> Inativo'; ?></p>
			  		<form>
			  			<div class="form-floating mb-3">
							  <input type="text" name="input_login" class="form-control" id="input_login" value="<?= $item['login'] ?>" readonly>
							  <label for="input_login">Usuário</label>
							</div>
							<div class="d-flex justify-content-between">
								<a class="btn btn-lg btn-dark" href="<?= site_url('students') ?>"><i class="fa-solid fa-chevron-left"></i> <?= $this->lang->line('form_voltar') ?></a>
								<?php if( $controller->_hasUserPermission('students/student/edit') ){ ?>
								<?php //o usuário não pode editar a si mesmo
						      if( $item['id'] !== $user['id'] ){ ?>
								<a class="btn btn-lg btn-outline-dark" href="<?= site_url('students/student/edit/') ?><?= $item['id'] ?>"><i class="far fa-edit"></i> <?= $this->lang->line('form_editar') ?></a>
								<?php } ?>
								<?php } ?>
							</div>
			  		</form>
			  	</div>
			  </div>
			</div>

		</div>
	</div>
</div>
