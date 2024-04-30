<div class="row mb-3">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2 class="text-info"><span class="glyphicon glyphicon-film"></span> <?= $category['category_name']; ?></h2>
	</div>
	<?php if ($results->num_rows() > 0) : ?>
		<?php foreach ($results->result_array() as $key => $value) : $id_movie_encryp = cryp($value['id_movie']); ?>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 my-thumbnail">
				<div class="thumbnail bg-black">
					<img src="<?= encryp_image_base64(base_url() . $value['movie_cover']); ?>" class="img-responsive img-rounded">
					<div class="caption">
						<h4 class="text-white"><?= $value['movie_name']; ?></h4>
						<p class="text-justify text-white">
							<?= generate_extract($value['movie_description'], 100); ?>
						</p>
						<p>
							<a href="<?= site_url('welcome/watch/') . $id_movie_encryp . '/'; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-film"></span> Ver</a>
							<?php if (
								$this->session->userdata('is_admin') ||
								$this->session->userdata('is_guest')
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
			<?= $paginator; ?>
		</div>
	<?php else : ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="alert alert-danger">
				<strong>¡Aviso!</strong> No se encontraron registros de este tipo en estos momentos.
			</div>
		</div>
	<?php endif ?>
</div>