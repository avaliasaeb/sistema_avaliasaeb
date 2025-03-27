<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pb-4">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <h1 class="h4 text-gray-800"><?= $view_title ?></h1>
	</div>

	<div class="row">

	  <?php foreach( $menu as $item){ ?>
		<div class="col-xl-2 col-lg-3 col-md-4 col-6 mb-4">
			<div class="card">
				<a href="<?= site_url( $item['module'] . '/' . $item['module'] . '/index' ) ?>">
				  <div class="row no-gutters">
				    <div class="col-3 text-center bg-gradient-dark text-white align-self-center h-100">
				      <span class="h2"><i class="<?= $item['icon'] ?> py-3 m-0"></i></span>
				    </div>
				    <div class="col-8 card-body p-0 align-self-center">
			        <h6 class="card-title m-0 pl-2">
			      	  <?= $this->lang->line( $item['desc'] ) ?>
			      	</h6>
				    </div>
				  </div>
				</a>
			</div>
		</div>
		<?php } ?>

	</div>
</div>