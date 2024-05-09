<article class="item">
    <a href="<?= site_url("welcome/watch/{$movie['movie_slug']}"); ?>">
        <figure>
            <img src="<?= base_url(($movie['movie_cover'] == 'NO-IMAGE' ? FOLDER_MOVIES . '/default.png' : $movie['movie_cover'])); ?>" alt="<?= $movie['movie_name']; ?>" title="<?= $movie['movie_name']; ?>" class="img-responsive">
            <figcaption class="bg-info-blue text-white text-center"><?= $movie['movie_name']; ?></figcaption>
        </figure>
    </a>
</article>