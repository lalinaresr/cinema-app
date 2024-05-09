<h1 class="page-header">Crear usuario</h1>
<div class="row">
    <?php
        $this->load->view('components/users/form', [
            'form_action' => site_url('users/store'),
            'form_id' => 'user-store-form',
            'btn_id' => 'user-store-btn',
            'btn_text' => '<span class="glyphicon glyphicon-floppy-disk"></span> Guardar'
        ]);
    ?>
</div>