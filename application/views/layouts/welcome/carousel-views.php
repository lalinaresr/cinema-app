<!-- Carousel with the movies most viewed -->
<div class="row">
    <div class="col-md-12">
        <h2 class="text-info tx"><span class="glyphicon glyphicon-star-empty"></span> Películas más vistas</h2>
        <div id="carousel-movies-most-viewed">
            <?php foreach ($get_movies_most_viewed->result() as $key => $value) : $id_movie_encryp = cryp($value->id_movie); ?>
                <div class="item">
                    <div class="mv_movie">
                        <a href="<?= site_url('movies/watch/') . $id_movie_encryp . '/'; ?>" class="a-none-line">
                            <div class="mv_movie_img">
                                <img src="<?= encryp_image_base64(base_url() . $value->movie_cover); ?>" alt="<?= $value->movie_name; ?>" title="<?= $value->movie_name; ?>" class="img-responsive">
                            </div>
                            <div class="mv_movie_title bg-m-info text-center">
                                <h1 class="mt-5 mb-5 tx-14"><?= $value->movie_name; ?></h1>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- END Carousel with the movies most viewed -->