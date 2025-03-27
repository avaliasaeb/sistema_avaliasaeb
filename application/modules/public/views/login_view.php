<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-6">
  <div class="card border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <div class="p-5">      
        <div class="text-center">
        	<img src="<?= site_url('files/public/img/logo-principal.png') ?>" class="mb-5 logo">
          <h1 class="h4 text-gray-900 mb-4"><?= $this->lang->line('page_login_1') ?></h1>
        </div>
        <form class="user ajax" method="post" action="<?= site_url('public/login/auth') ?>">

          <div class="form-floating mb-3">
            <input type="text" name="input_login" class="form-control" id="input_login" autofocus required autocomplete="off">
            <label for="input_login"><?= $this->lang->line('form_login') ?></label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="input_senha" class="form-control" id="input_senha" required autocomplete="off">
            <label for="input_senha"><?= $this->lang->line('form_senha') ?></label>
          </div>
          <div class="form-group">
          	<button type="submit" class="btn btn-lg btn-dark w-100"><?= $this->lang->line('form_entrar') ?></button>
          </div>
        </form>
        <hr>
        <div class="text-center">
          <a href="<?= site_url('public/recover') ?>"><?= $this->lang->line('page_login_2') ?></a>
          <hr>
          <?php foreach ( $idiomas as $key => $val ){ ?>
          <a href="<?= site_url('public/login/changelanguage') ?>/<?= $key ?>" class="ajax btn">
            <img src="<?= site_url('files/public/img/flag-'. $val .'.png') ?>" width="30">
          </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>