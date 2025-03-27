<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-6">
  <div class="card border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <div class="p-5">      
				<div class="container-fluid">
				  <h1 class="h4 mb-4"><i class="fas fa-exclamation-triangle"></i> <?= $this->lang->line('page_erro404_1') ?></h1>

					<p><?= $this->lang->line('page_erro404_2') ?></p>
					<p><?= $this->lang->line('page_erro404_3') ?></p>
					<ol>
						<li><?= $this->lang->line('page_erro404_4') ?></li>
						<li><?= $this->lang->line('page_erro404_5') ?> <u><a href="<?= site_url('public/login') ?>" title="<?= $this->lang->line('page_erro404_6') ?>"><?= $this->lang->line('page_erro404_7') ?></a></u>.</p>
					</ol>
				  <hr>
				  <div class="text-center">
						<?php foreach ( $idiomas as $key => $val ){ ?>
						<a href="<?= site_url('public/login/changelanguage') ?>/<?= $key ?>" class="ajax btn">
						  <img src="<?= site_url('files/public/img/flag-'. $val .'.png') ?>" width="30">
						</a>
						<?php } ?>
					</div>					
				</div>
			</li>
		</ol>
	</div>
</div>