<h1 class="page-header">Crear categoría</h1>
<div class="row">
    <?php
        $this->load->view('components/categories/form', [
            'form_action' => site_url('categories/store'),
            'form_id' => 'category-store-form',
            'btn_id' => 'category-store-btn',
            'btn_text' => '<span class="glyphicon glyphicon-floppy-disk"></span> Guardar'
        ]);
    ?>
</div>