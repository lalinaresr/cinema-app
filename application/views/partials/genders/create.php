<h1 class="page-header">Crear género</h1>
<div class="row">
    <?php
        $this->load->view('components/genders/form', [
            'form_action' => site_url('genders/store'),
            'form_id' => 'gender-store-form',
            'btn_id' => 'gender-store-btn',
            'btn_text' => '<span class="glyphicon glyphicon-floppy-disk"></span> Guardar'
        ]);
    ?>
</div>