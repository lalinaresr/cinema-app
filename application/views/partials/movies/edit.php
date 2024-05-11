<h1 class="page-header">Editar película</h1>
<div class="row">
    <?php
        if ($movie->num_rows() > 0) {
            $this->load->view('components/movies/form', [
                'movie' => $movie->row_array(),
                'form_id' => 'movie-update-form',
                'btn_id' => 'movie-update-btn',
                'btn_text' => '<span class="glyphicon glyphicon-refresh"></span> Actualizar'
            ]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>