<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="<?= site_url('dashboard/'); ?>"><span class="glyphicon glyphicon-home"></span> Panel</a></li>
                <?php if ($this->session->userdata('is_admin_logged_in')) { ?>
                    <li><a href="<?= site_url('sessions/'); ?>"><span class="glyphicon glyphicon-list-alt"></span> Sesiones</a></li>
                    <li><a href="<?= site_url('users/'); ?>"><span class="glyphicon glyphicon-user"></span> Usuarios</a></li>
                    <li><a href="<?= site_url('qualities/'); ?>"><span class="glyphicon glyphicon-flag"></span> Calidades</a></li>
                    <li><a href="<?= site_url('categories/'); ?>"><span class="glyphicon glyphicon-tags"></span> Categorías</a></li>
                    <li><a href="<?= site_url('genders/'); ?>"><span class="glyphicon glyphicon-globe"></span> Géneros</a></li>
                    <li><a href="<?= site_url('productors/'); ?>"><span class="glyphicon glyphicon-film"></span> Productores</a></li>
                    <li><a href="<?= site_url('movies/'); ?>"><span class="glyphicon glyphicon-cd"></span> Películas</a></li>
                    <!--<li><a href="<?= site_url('suggestions/'); ?>"><span class="glyphicon glyphicon-envelope"></span> Sugerencias</a></li>-->
                    <li><a href="<?= site_url('newsletters/'); ?>"><span class="glyphicon glyphicon-heart"></span> Seguidores</a></li>
                <?php } else if ($this->session->userdata('is_guest_logged_in')) { ?>
                    <li><a href="<?= site_url('qualities/'); ?>"><span class="glyphicon glyphicon-flag"></span> Calidades</a></li>
                    <li><a href="<?= site_url('categories/'); ?>"><span class="glyphicon glyphicon-tags"></span> Categorías</a></li>
                    <li><a href="<?= site_url('genders/'); ?>"><span class="glyphicon glyphicon-globe"></span> Géneros</a></li>
                    <li><a href="<?= site_url('productors/'); ?>"><span class="glyphicon glyphicon-film"></span> Productores</a></li>
                    <li><a href="<?= site_url('movies/'); ?>"><span class="glyphicon glyphicon-cd"></span> Películas</a></li>
                    <!--<li><a href="<?= site_url('suggestions/'); ?>"><span class="glyphicon glyphicon-envelope"></span> Sugerencias</a></li>-->
                    <li><a href="<?= site_url('newsletters/'); ?>"><span class="glyphicon glyphicon-heart"></span> Seguidores</a></li>
                <?php } ?>
                <li><a href="<?= site_url('auth/logout/'); ?>" class="btn-logout"><span class="glyphicon glyphicon-off"></span> Cerrar sesión</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">