<div class="row">
    <div class="col-md-12">
        <h2 class="text-info"><span class="glyphicon glyphicon-calendar"></span> Películas más nuevas</h2>
        <section id="newest-carousel">
            <?php foreach ($get_new_movies->result() as $key => $value) : $id_movie_encryp = cryp($value->id_movie); ?>
                <article class="item">
                    <a href="<?= site_url('welcome/watch/') . $id_movie_encryp . '/'; ?>">
                        <figure>
                            <img src="<?= encryp_image_base64(base_url() . $value->movie_cover); ?>" alt="<?= $value->movie_name; ?>" title="<?= $value->movie_name; ?>" class="img-responsive">
                            <figcaption class="bg-info-blue text-white text-center"><?= $value->movie_name; ?></figcaption>
                        </figure>
                    </a>
                </article>
            <?php endforeach ?>
        </section>
    </div>
</div>