<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
      </div>
      
      <footer class="sticky-footer bg-white shadow-sm">
        <div class="container-fluid">
          <div class="copyright d-inline">
            <span class="small">Copyright © <?= date('Y') ?> [v. <?= $version; ?>]</span>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog shadow-lg p-1" role="document">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel"><?= $this->lang->line('modal_titulo_confirma') ?></h5>
          <button class="close" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><?= $this->lang->line('modal_texto_confirma') ?></div>
        <div class="modal-footer">
          <button class="btn btn-outline-dark" type="button" data-bs-dismiss="modal">
            <i class="fas fa-times"></i> <?= $this->lang->line('form_cancelar') ?>
          </button>
          <a class="btn btn-dark" href="<?= site_url('public/logout') ?>">
            <i class="fas fa-sign-out-alt"></i> <?= $this->lang->line('form_sair') ?>
          </a>
        </div>
      </div>
    </div>
  </div>

  <?php if( isset($atualiza_perfil) && true === $atualiza_perfil ){ ?>
  <div class="modal fade" id="updateModalProfile" tabindex="-1" role="dialog" aria-labelledby="updateModalProfileLabel" aria-hidden="true">
    <div class="modal-dialog shadow-lg p-1" role="document">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalProfileLabel"><?= $this->lang->line('modal_titulo_update') ?></h5>
          <button class="close" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <?= $user['primeiro_nome'] ?><?= $this->lang->line('page_painel_1') ?>
        </div>
        <div class="modal-footer">
          <a class="btn btn-dark" href="<?= site_url('profile') ?>">
            <i class="fa-solid fa-repeat"></i> <?= $this->lang->line('form_atualizar') ?>
          </a>
        </div>
      </div>
    </div>
  </div>  
  <?php } ?>

<?php $this->load->view('main/scripts_view'); ?>
</body>
</html>