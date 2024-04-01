<div class="row mb-20">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2 class="text-info tx"><span class="glyphicon glyphicon-asterisk"></span> Todas las películas</h2>
	</div>
	<?php if ($results_paginated != FALSE) : ?>
		<?php foreach ($results_paginated as $key => $value) : $id_movie_encryp = cryp($value->id_movie); ?>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 my-thumbnail">
				<div class="thumbnail bg-black">
					<img src="<?= encryp_image_base64(base_url() . $value->movie_cover); ?>" class="img-responsive img-rounded">
					<div class="caption">
						<h4 class="tx-white"><?= $value->movie_name; ?></h4>
						<p class="text-justify tx-white">
							<?= generate_extract($value->movie_description, 100); ?>
						</p>
						<p>
							<a href="<?= site_url('movies/watch/') . $id_movie_encryp . '/'; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-film"></span> Ver</a>
							<?php if (
								$this->session->userdata('is_admin_logged_in') ||
								$this->session->userdata('is_guest_logged_in')
							) : ?>
								<a href="<?= site_url('movies/view/') . $id_movie_encryp . '/'; ?>" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
								<a href="<?= site_url('movies/edit/') . $id_movie_encryp . '/'; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
							<?php endif ?>
						</p>
					</div>
				</div>
			</div>
		<?php endforeach ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?= $links_created; ?>
		</div>
	<?php else : ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="alert alert-danger">
				<strong>¡Aviso!</strong> No se encontraron datos de películas para mostrar en estos momentos.
			</div>
		</div>
	<?php endif ?>
</div>