<h1 class="page-header">¡Bienvenido a <?= constant('APP_NAME'); ?>!</h1>
<div class="row">
    <?php if ($this->session->userdata('is_admin') || $this->session->userdata('is_guest')) : ?>
        <div class="col-md-<?= $this->session->userdata('is_admin') ? '6' : '12'; ?>">
            <?php
                $this->load->view('partials/dashboard/suggestions');
                $this->load->view('partials/dashboard/newsletters');
            ?>
        </div>
        <?php if ($this->session->userdata('is_admin')) : ?>
            <div class="col-md-6">
                <?php
                    $this->load->view('partials/dashboard/others_sessions');
                    $this->load->view('partials/dashboard/my_sessions');
                ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>