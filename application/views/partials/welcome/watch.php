<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="bg-black">
            <iframe src="<?= $movie['movie_play']; ?>" class="video-movie center-block"></iframe>
        </div>
        <h3 class="text-info pull-left" style="word-wrap: break-word;"><span class="glyphicon glyphicon-play"></span> <?= $movie['movie_name']; ?></h3>
        <h3 class="text-info pull-right"><span class="glyphicon glyphicon-stats"></span> <?= $movie['movie_reproductions']; ?> vistas</h3>
    </div>
</div>

<div class="row my-3">
    <div class="col-md-9">
        <div class="fb-comments" data-href="<?= site_url("welcome/watch/{$movie['movie_slug']}"); ?>" data-numposts="100" data-colorscheme="dark" data-width="100%"></div>
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    </div>
    <div class="col-md-3">
        <a class="twitter-timeline" data-lang="en" data-height="400" data-dnt="true" data-theme="dark" href="https://twitter.com/php_net">Tweets by php_net</a>
        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
</div>