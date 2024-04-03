<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-nv1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand tx-20" href="<?= site_url(); ?>"><?= constant('APP_NAME'); ?></a>
		</div>
		<div class="collapse navbar-collapse navbar-nv1-collapse">
			<?php if (
				$this->session->userdata('is_admin_logged_in') ||
				$this->session->userdata('is_user_logged_in') ||
				$this->session->userdata('is_guest_logged_in')
			) : ?>
				<form action="<?= site_url('results/pre_search_query/'); ?>" method="post" class="navbar-form navbar-left" role="search">
					<div class="input-group">
						<input type="text" class="form-control" name="movie_name_search" id="movie_name_search" value="<?= $param_search ?? ''; ?>" placeholder="Buscar..." required autocomplete="off" style="width: 100%;">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
						</span>
					</div>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-globe"></span> Productores <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php foreach ($get_all_productors_activated->result() as $key => $value) : $id_productor_encryp = cryp($value->id_productor); ?>
								<li><a href="<?= site_url('productors/filter_by/') . $id_productor_encryp . '/'; ?>"><?= $value->productor_name; ?></a></li>
							<?php endforeach ?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-globe"></span> Géneros <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php foreach ($get_all_genders_activated->result() as $key => $value) : $id_gender_encryp = cryp($value->id_gender); ?>
								<li><a href="<?= site_url('genders/filter_by/') . $id_gender_encryp . '/'; ?>"><?= $value->gender_name; ?></a></li>
							<?php endforeach ?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-tags"></span> Categorías <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php foreach ($get_all_categorys_activated->result() as $key => $value) : $id_category_encryp = cryp($value->id_category); ?>
								<li><a href="<?= site_url('categorys/filter_by/') . $id_category_encryp . '/'; ?>"><?= $value->category_name ?></a></li>
							<?php endforeach ?>
						</ul>
					</li>
					<li><a href="<?= site_url('dashboard/'); ?>" target="_blank"><span class="glyphicon glyphicon-dashboard"></span> Panel</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?= $user_avatar; ?>" class="profile-image img-circle" style="width: 20px; height: 20px;"> <?= $this->session->userdata('user_username'); ?> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><span class="glyphicon glyphicon-user"></span> Mi perfil</a></li>
							<li><a href="<?= site_url('users/edit_avatar/') . cryp($this->session->userdata('id_user')) . '/'; ?>"><span class="glyphicon glyphicon-picture"></span> Editar avatar</a></li>
							<li class="divider"></li>
							<li><a href="<?= site_url('auth/logout/'); ?>" class="btn-logout"><span class="glyphicon glyphicon-off"></span> Cerrar sesión</a></li>
						</ul>
					</li>
				</ul>
			<?php else : ?>
				<form action="<?= site_url('results/pre_search_query/'); ?>" method="post" class="navbar-form navbar-right" role="search">
					<div class="input-group">
						<input type="text" class="form-control" name="movie_name_search" id="movie_name_search" value="<?= $param_search ?? ''; ?>" placeholder="Buscar..." required autocomplete="off" style="width: 100%;">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
						</span>
					</div>
				</form>

				<ul class="nav navbar-nav navbar-left">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-globe"></span> Productores <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php foreach ($get_all_productors_activated->result() as $key => $value) : $id_productor_encryp = cryp($value->id_productor); ?>
								<li><a href="<?= site_url('productors/filter_by/') . $id_productor_encryp . '/'; ?>"><?= $value->productor_name; ?></a></li>
							<?php endforeach ?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-globe"></span> Géneros <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php foreach ($get_all_genders_activated->result() as $key => $value) : $id_gender_encryp = cryp($value->id_gender); ?>
								<li><a href="<?= site_url('genders/filter_by/') . $id_gender_encryp . '/'; ?>"><?= $value->gender_name; ?></a></li>
							<?php endforeach ?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-tags"></span> Categorías <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php foreach ($get_all_categorys_activated->result() as $key => $value) : $id_category_encryp = cryp($value->id_category); ?>
								<li><a href="<?= site_url('categorys/filter_by/') . $id_category_encryp . '/'; ?>"><?= $value->category_name ?></a></li>
							<?php endforeach ?>
						</ul>
					</li>
				</ul>
			<?php endif ?>
		</div>
	</div>
</nav>

<div class="container-fluid">