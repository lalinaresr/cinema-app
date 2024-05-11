<h1 class="page-header">Crear película</h1>
<div class="row">
    <?php
        $this->load->view('components/movies/form', [
            'form_id' => 'movie-store-form',
            'btn_id' => 'movie-store-btn',
            'btn_text' => '<span class="glyphicon glyphicon-floppy-disk"></span> Guardar'
        ]);
    ?>
</div>