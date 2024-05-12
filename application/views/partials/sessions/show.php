<h1 class="page-header">Ver sesión</h1>
<div class="row">
    <?php
        if ($session->num_rows() > 0) {
            $this->load->view('components/sessions/show', ['session' => $session->row_array()]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>