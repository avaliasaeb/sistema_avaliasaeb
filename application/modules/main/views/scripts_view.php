<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- 
 =========================================================================
   /\       ____   ____   ____ _______ _____ _______       _____ _______ 
  /  \     |  _ \ / __ \ / __ \__   __/ ____|__   __|/\   |  __ \__   __|
 /    \    | |_) | |  | | |  | | | | | (___    | |  /  \  | |__) | | |   
 \    /    |  _ <| |  | | |  | | | |  \___ \   | | / /\ \ |  _  /  | |   
 /\  /\    | |_) | |__| | |__| | | |  ____) |  | |/ ____ \| | \ \  | |   
 \ \/ /    |____/ \____/ \____/  |_| |_____/   |_/_/    \_\_|  \_\ |_|   
  \  /                                                                   
   \/                                                                     
 ========================== bootstart.com.br =============================
-->

<script src="<?= site_url('files/public/js/lang-'. $idioma .'.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/jquery.min.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/jquery.easing.min.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/popper.min.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/bootstrap.min.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/dataTables.jquery.min.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/dataTables.searchHighlight.min.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/dataTables.highlight.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/dataTables.bootstrap5.min.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/dataTables.jszip.min.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/dataTables.buttons.min.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/dataTables.buttons.html5.min.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/dataTables.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/select2.min.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/slimScroll.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/toastr.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/strength.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/jquery.inputmask.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/inputmask.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/jquery.richtext.min.js') ?>?v=<?= $version; ?>"></script>
<script src="<?= site_url('files/public/js/template.js') ?>?v=<?= $version; ?>"></script>
<?php if( $controller->_isUserLoggedIn() ){ ?>
<script>
window.setTimeout(function(){
  window.location.href = "<?= site_url('public/logout'); ?>";
}, <?= $this->config->item('sess_time_to_update') * 1000; ?> );  
</script> 
<?php } ?>