<h1 class="page-header">Ver película</h1>
<div class="row">
    <?php
        if ($movie->num_rows() > 0) {
            $this->load->view('components/movies/view', ['movie' => $movie->row_array()]);
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>