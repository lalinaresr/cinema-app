<div class="row">
    <div class="col-md-12">
        <h2 class="text-info"><span class="glyphicon glyphicon-<?= $icon ?>"></span> <?= $title; ?></h2>
        <section id="<?= $carousel_id; ?>">
            <?php
                foreach ($data->result_array() as $movie) {
                    $this->load->view('components/welcome/carousel-movie-detail', compact('movie'));
                }
            ?>
        </section>
    </div>
</div>