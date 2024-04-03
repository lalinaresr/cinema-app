<h1 class="page-header">Panel administrativo de <?= constant('APP_NAME'); ?>.</h1>
<div class="row">
    <div class="col-md-<?= $this->session->userdata('is_admin_logged_in') ? '6' : '12'; ?>">
        <?php $this->load->view('partials/dashboard/suggestions'); ?>
        <?php $this->load->view('partials/dashboard/newsletters'); ?>
    </div>
    <?php if ($this->session->userdata('is_admin_logged_in')) : ?>
        <div class="col-md-6">
            <?php $this->load->view('partials/dashboard/last_connections'); ?>
            <?php $this->load->view('partials/dashboard/my_connections'); ?>
        </div>
    <?php endif ?>
</div>