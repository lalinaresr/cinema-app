<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 my-thumbnail">
    <div class="thumbnail bg-black">
        <img src="<?= base_url(($movie['movie_cover'] != 'NO-IMAGE' ? $movie['movie_cover'] : FOLDER_MOVIES . '/default.png')); ?>" class="img-responsive img-rounded" alt="<?= $movie['movie_name']; ?>" title="<?= $movie['movie_name']; ?>">
        <div class="caption">
            <h4 class="text-white"><?= $movie['movie_name']; ?></h4>
            <p class="text-white"><?= character_limiter($movie['movie_description'], 100); ?></p>
            <p>
                <a href="<?= site_url("watch/{$movie['movie_slug']}"); ?>" class="btn btn-info"><span class="glyphicon glyphicon-play"></span> Reproducir</a>
                <?php if ($this->session->userdata('is_admin') || $this->session->userdata('is_guest')) : ?>
                    <a href="<?= site_url("movies/{$movie['id_movie']}"); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
                    <a href="<?= site_url("movies/{$movie['id_movie']}/edit-cover"); ?>" class="btn btn-success"><span class="glyphicon glyphicon-picture"></span></a>
                    <a href="<?= site_url("movies/{$movie['id_movie']}/edit"); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                <?php endif; ?>
            </p>
        </div>
    </div>
</div>