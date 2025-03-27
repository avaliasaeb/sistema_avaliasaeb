<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-6">
  <div class="card border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <div class="p-5">      
				<div class="text-center">
					<img src="<?= site_url('files/public/img/logo-principal.png') ?>" class="mb-5 logo">
				</div>
				<div class="text-center">
					<p><?= $this->lang->line('page_logout_1') ?></p>
					<a href="<?= site_url('public/login') ?>" title="<?= $this->lang->line('page_logout_2') ?>" class="btn btn-outline-dark"><?= $this->lang->line('page_logout_3') ?></a>
				</div>
			</div>
		</div>
	</div>
</div>