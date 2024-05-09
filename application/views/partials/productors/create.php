<h1 class="page-header">Crear productor</h1>
<div class="row">
    <?php
        $this->load->view('components/productors/form', [
            'form_action' => site_url('productors/store'),
            'form_id' => 'productor-store-form',
            'btn_id' => 'productor-store-btn',
            'btn_text' => '<span class="glyphicon glyphicon-floppy-disk"></span> Guardar'
        ]);
    ?>
</div>