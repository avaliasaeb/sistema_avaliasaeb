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
			  		<form class="ajax" action="<?= site_url('profile/profile/update') ?>" method="post">
							<div class="row">
								<div class="col-md-6">
					  			<div class="form-floating mb-3">
									  <input type="text" name="input_nome" class="form-control" id="input_nome" value="<?= $item['nome'] ?>" autofocus required autocomplete="off">
									  <label for="input_nome"><?= $this->lang->line('form_nome_completo') ?></label>
									</div>
								</div>
			      		<div class="col-lg-6">
					  			<div class="form-floating mb-3">
									  <select name="input_necessidade" class="form-control" id="input_necessidade" required autocomplete="off">
									    <option selected value=""><?= $this->lang->line('form_selecione') ?></option>
									    <?php if( false !== $list_3 && is_array( $list_3 ) ){ ?>
									    <?php foreach( $list_3 as $obj ){ ?>
									    <option <?= $obj['id'] == $item['id_necessidade'] ? 'selected' : '' ?> value="<?= $obj['id'] ?>"><?= $obj['necessidade'] ?></option>
									    <?php } } ?>
									  </select>
									  <label for="input_necessidade"><?= $this->lang->line('form_necessidade') ?></label>
									</div>
								</div>
								<div class="col-lg-6">
					  			<div class="form-floating mb-3">
									  <input type="email" name="input_email" class="form-control" id="input_email" value="<?= $item['email'] ?>" required autocomplete="off">
									  <label for="input_email"><?= $this->lang->line('form_email') ?></label>
									</div>
								</div>
			      		<div class="col-lg-6">
					  			<div class="form-floating mb-3">
									  <select name="input_idioma" class="form-control" id="input_idioma" required autocomplete="off">
									    <?php foreach ( $idiomas as $key => $idioma ){ ?>
									    <option value="<?= $key ?>" <?= $key == $item['idioma'] ? 'selected' : '' ?>><?= $this->lang->line('form_idioma_' . $idioma ) ?></option>
											<?php } ?>
									  </select>
									  <label for="input_idioma"><?= $this->lang->line('form_idioma') ?></label>
									</div>
								</div>
			      		<div class="col-lg-6">
					  			<div class="form-floating mb-3">
									  <input type="text" class="form-control" id="input_perfil" value="<?= $item['perfil'] ?>" readonly>
									  <label for="input_perfil"><?= $this->lang->line('form_perfil_acesso') ?></label>
									</div>
								</div>
			      		<div class="col-lg-6">
					  			<div class="form-floating mb-3">
									  <input type="date" class="form-control" id="input_dt_cadastro" value="<?= date( 'Y-m-d', strtotime( $item['dt_cadastro'] ) ) ?>" readonly>
									  <label for="input_dt_cadastro"><?= $this->lang->line('form_dtcadastro') ?></label>
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
									  <input type="date" class="form-control" id="input_dt_atualizacao" value="<?= null !== $item['dt_alteracao'] ? date( 'Y-m-d', strtotime( $item['dt_alteracao'] ) ) : '' ?>" readonly>
									  <label for="input_dt_atualizacao"><?= $this->lang->line('form_dtatualizacao') ?></label>
									</div>
								</div>
								<div class="col-md-6">
					  			<div class="form-floating mb-3">
									  <input type="date" class="form-control" id="input_dt_login" value="<?= null !== $item['dt_login'] ? date( 'Y-m-d', strtotime( $item['dt_login'] ) ) : '' ?>" readonly>
									  <label for="input_dt_login"><?= $this->lang->line('form_dtacesso') ?></label>
									</div>
								</div>
							</div>
							<div class="d-flex justify-content-end">
								<button class="btn btn-lg btn-dark" type="submit"><i class="fa-solid fa-check"></i> <?= $this->lang->line('form_salvar') ?></button>
							</div>
			  		</form>
			  	</div>
			  </div>

			  <div class="tab-pane card" id="login-senha-tab-pane" role="tabpanel" aria-labelledby="login-senha-tab" tabindex="0">
			  	<div class="card-body">
			  		<form class="ajax" action="<?= site_url('profile/profile/updatelogin') ?>" method="post">
			  			<div class="form-floating mb-3">
							  <input type="text" name="input_login" class="form-control" id="input_login" value="<?= $item['login'] ?>" autofocus required autocomplete="off">
							  <label for="input_login"><?= $this->lang->line('form_login') ?></label>
							  <div id="emailHelp" class="form-text"><?= $this->lang->line('page_profile_3') ?></div>
							</div>
			  			<div class="form-floating mb-3">
							  <input type="password" name="input_senha" class="form-control strength" id="input_senha" required autocomplete="off">
							  <label for="input_senha"><?= $this->lang->line('form_senha') ?></label>
							</div>
			  			<div class="form-floating mb-3">
							  <input type="password" name="input_confirma_senha" class="form-control" id="input_confirma_senha" required autocomplete="off">
							  <label for="input_confirma_senha"><?= $this->lang->line('form_confirma_senha') ?></label>
							</div>
							<div class="d-flex justify-content-end">
								<button class="btn btn-lg btn-dark" type="submit"><i class="fa-solid fa-check"></i> <?= $this->lang->line('form_salvar') ?></button>
							</div>
			  		</form>
			  	</div>
			  </div>
			</div>

		</div>
	</div>
</div>
