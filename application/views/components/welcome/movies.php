<div class="row mb-3">
    <?php
        $this->load->view('components/welcome/main-title');
        if ($results->num_rows() > 0) {
            foreach ($results->result_array() as $movie) {
                $this->load->view('components/welcome/movie-detail', compact('movie'));
            }
            $this->load->view('components/welcome/paginator');
        } else {
            $this->load->view('components/common/not-found');
        }
    ?>
</div>