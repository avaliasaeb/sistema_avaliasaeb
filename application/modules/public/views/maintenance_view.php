<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-6">
  <div class="card border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <div class="p-5">      
				<div class="text-center">
					<img src="<?= site_url('files/public/img/logo-principal.png') ?>" class="mb-5 logo">
				  <h1 class="h4 text-gray-900 mb-4"><?= $this->lang->line('page_maintenance_1') ?></h1>
				</div>
				<img src="<?= site_url('files/public/img/maintenance.png') ?>" class="w-100">
				<hr>
				<div class="text-center">
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