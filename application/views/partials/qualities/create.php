<h1 class="page-header">Crear calidad</h1>
<div class="row">
    <?php
        $this->load->view('components/qualities/form', [
            'form_action' => site_url('qualities/store'),
            'form_id' => 'quality-store-form',
            'btn_id' => 'quality-store-btn',
            'btn_text' => '<span class="glyphicon glyphicon-floppy-disk"></span> Guardar'
        ]);
    ?>
</div>