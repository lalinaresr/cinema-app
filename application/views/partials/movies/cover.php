<h1 class="page-header">Editar portada</h1>
<div class="row">
    <?php
        if ($movie->num_rows() > 0) {
            $this->load->view('components/movies/cover-form', ['movie' => $movie->row_array()]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>