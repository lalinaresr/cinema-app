<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-xs-12">			
			<div class="bg-black">
				<iframe src="<?= $watch_movie->movie_play; ?>" class="video-movie center-block"></iframe>					
			</div>			
			<h3 class="text-info pull-left" style="word-wrap: break-word;"><span class="glyphicon glyphicon-play"></span> <?= $watch_movie->movie_name; ?></h3>					
			<h3 class="text-info pull-right"><span class="glyphicon glyphicon-stats"></span> <?= $watch_movie->movie_reproductions; ?> views</h3>					
		</div>
		
	</div>

	<div class="row mt-25">
		<div class="col-md-9">
			<div class="fb-comments" data-href="<?= site_url("movies/watch/{$watch_movie->id_movie}"); ?>" data-numposts="100" data-colorscheme="dark" data-width="100%"></div>
			<div id="fb-root"></div>
			<script>
				(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
				  	if (d.getElementById(id)) return;
				  	js = d.createElement(s); js.id = id;
				  	js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10";
				  	fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			</script>
		</div>
		<div class="col-md-3">
			<a class="twitter-timeline" data-lang="en" data-height="400" data-dnt="true" data-theme="dark" href="https://twitter.com/php_net">Tweets by php_net</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
	</div>

	<div class="row mt-25">
		<div class="col-md-12">
			<h2 class="text-info tx"><span class="glyphicon glyphicon-list"></span> Movies Recommended </h2>
			<div id="carousel-new-movies">			          
				<?php foreach ($get_new_movies->result() as $key => $value): $id_movie_encryp = cryp($value->id_movie); ?>
					<div class="item">
						<div class="nw_movie"> 
							<a href="<?= site_url('movies/watch/') . $id_movie_encryp . '/' ; ?>" class="a-none-line">
								<div class="nw_movie_img">
									<img src="<?= encryp_image_base64(base_url() . $value->movie_cover); ?>" alt="<?= $value->movie_name; ?>" title="<?= $value->movie_name; ?>" class="img-responsive">
								</div>
								<div class="nw_movie_title bg-m-info text-center">
									<h1 class="mt-5 mb-5 tx-14"><?= $value->movie_name; ?></h1>
								</div> 
							</a>
						</div>
					</div>	
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>


