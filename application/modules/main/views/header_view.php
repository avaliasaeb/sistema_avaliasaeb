<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('main/css_view'); ?>
  <title><?= $page_title ?></title>
</head>
<body id="page-top" class="sidebar-toggled">
  <div class="loader-container bg-glass"><span class="loader"></span></div>

  <div id="wrapper">
    
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <?php foreach( $menu as $item){ ?>

      <li class="nav-item <?= $this->router->fetch_module() == $item['module'] ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url( $item['module'] ) ?>">
          <i class="<?= $item['icon'] ?>"></i>
          <span><?= $this->lang->line( $item['label'] ) ?></span>
        </a>
      </li>
      <hr class="sidebar-divider">

      <?php } ?>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <img src="<?= site_url('files/public/img/logo-principal.png') ?>" height="30">

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 small"><?= $user['primeiro_nome'] ?></span>
              <span class="img-profile rounded-circle text-center"><i class="fa-solid fa-ellipsis-vertical mt-2"></i></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in p-0" aria-labelledby="userDropdown">

              <?php if( $controller->_hasUserPermission('profile/profile/index') ) { ?>
              <a class="dropdown-item py-3" href="<?= site_url('profile') ?>">
                <i class="fa-solid fa-user mr-2"></i> <?= $this->lang->line('menu_5') ?>
              </a>
              <?php } ?>

              <a class="dropdown-item py-3" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="fa-solid fa-arrow-right-from-bracket text-danger mr-2"></i> <?= $this->lang->line('menu_6') ?>
              </a>

            </div>
          </li>

        </ul>
        
      </nav>
      
      <div id="content">     
