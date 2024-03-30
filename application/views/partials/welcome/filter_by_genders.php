<div class="container-fluid">
	<!-- Carousel with the movies most viewed -->
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-info tx"><span class="glyphicon glyphicon-star-empty"></span> Movies Most Viewed</h2>
			<div id="carousel-movies-most-viewed">			          
				<?php foreach ($get_movies_most_viewed->result() as $key => $value): $id_movie_encryp = cryp($value->id_movie); ?>
					<div class="item">
						<div class="mv_movie"> 
							<a href="<?= site_url('movies/watch/') . $id_movie_encryp . '/' ; ?>" class="a-none-line">
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

	<!-- Carousel with the new movies -->
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-info tx"><span class="glyphicon glyphicon-calendar"></span> New Movies</h2>
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
	<!-- END Carousel with the new movies -->

	<!-- Row with all movies -->
	<div class="row mb-20">
		<div class="col-md-12">
			<h2 class="text-info tx"><span class="glyphicon glyphicon-asterisk"></span> Movies of <?= $view_gender->gender_name; ?></h2>
			<?php if ($results_paginated != FALSE): ?>
				<?php foreach ($results_paginated as $key => $value): $id_movie_encryp = cryp($value->id_movie); ?>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 my-thumbnail" >
						<div class="thumbnail bg-black">
							<img src="<?= encryp_image_base64(base_url() . $value->movie_cover); ?>" class="img-responsive img-rounded">
							<div class="caption">
								<h4 class="tx-white"><?= $value->movie_name; ?></h4>
								<p class="text-justify tx-white">
									<?= generate_extract($value->movie_description, 100); ?>
								</p>
								<p>
									<a href="<?= site_url('movies/watch/') . $id_movie_encryp . '/' ; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-film"></span> Watch</a>
									<?php if ($this->session->userdata('is_admin_logged_in') || 
											  $this->session->userdata('is_guest_logged_in')): ?>
										<a href="<?= site_url('movies/view/') . $id_movie_encryp . '/'; ?>" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
										<a href="<?= site_url('movies/edit/') . $id_movie_encryp . '/'; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
									<?php endif ?>

								</p>
							</div>
						</div>
					</div>
				<?php endforeach ?>	
			<?php else: ?>
				<div class="alert alert-warning">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Advertence Message!</strong> No found data movies about of this gender, try again
				</div>
			<?php endif ?>
		</div>
		<div class="col-md-12">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 my-thumbnail" >
				<?= $links_created; ?>
			</div>
		</div>
	</div>
	<!-- END Row with all movies -->	
</div>