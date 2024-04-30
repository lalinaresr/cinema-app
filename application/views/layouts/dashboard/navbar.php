<nav class="navbar navbar-inverse navbar-dashboard navbar-fixed-top" role="navigation">
   <div class="container-fluid">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand navbar-title" href="<?= site_url('dashboard/'); ?>"><?= constant('APP_NAME'); ?></a>
      </div>
      <div class="collapse navbar-collapse navbar-ex1-collapse">
         <ul class="nav navbar-nav visible-xs">
            <li class="active"><a href="<?= site_url('dashboard/'); ?>"><span class="glyphicon glyphicon-home"></span> Panel</a></li>
            <?php if ($this->session->userdata('is_admin')) { ?>
               <li><a href="<?= site_url('sessions/'); ?>"><span class="glyphicon glyphicon-list-alt"></span> Sesiones</a></li>
               <li><a href="<?= site_url('users/'); ?>"><span class="glyphicon glyphicon-user"></span> Usuarios</a></li>
               <li><a href="<?= site_url('qualities/'); ?>"><span class="glyphicon glyphicon-flag"></span> Calidades</a></li>
               <li><a href="<?= site_url('categories/'); ?>"><span class="glyphicon glyphicon-tags"></span> Categorías</a></li>
               <li><a href="<?= site_url('genders/'); ?>"><span class="glyphicon glyphicon-globe"></span> Géneros</a></li>
               <li><a href="<?= site_url('productors/'); ?>"><span class="glyphicon glyphicon-film"></span> Productores</a></li>
               <li><a href="<?= site_url('movies/'); ?>"><span class="glyphicon glyphicon-cd"></span> Películas</a></li>
               <!--<li><a href="<?= site_url('suggestions/'); ?>"><span class="glyphicon glyphicon-envelope"></span> Sugerencias</a></li>-->
               <li><a href="<?= site_url('newsletters/'); ?>"><span class="glyphicon glyphicon-heart"></span> Seguidores</a></li>
            <?php } else if ($this->session->userdata('is_guest')) { ?>
               <li><a href="<?= site_url('qualities/'); ?>"><span class="glyphicon glyphicon-flag"></span> Calidades</a></li>
               <li><a href="<?= site_url('categories/'); ?>"><span class="glyphicon glyphicon-tags"></span> Categorías</a></li>
               <li><a href="<?= site_url('genders/'); ?>"><span class="glyphicon glyphicon-globe"></span> Géneros</a></li>
               <li><a href="<?= site_url('productors/'); ?>"><span class="glyphicon glyphicon-film"></span> Productores</a></li>
               <li><a href="<?= site_url('movies/'); ?>"><span class="glyphicon glyphicon-cd"></span> Películas</a></li>
               <!--<li><a href="<?= site_url('suggestions/'); ?>"><span class="glyphicon glyphicon-envelope"></span> Sugerencias</a></li>-->
               <li><a href="<?= site_url('newsletters/'); ?>"><span class="glyphicon glyphicon-heart"></span> Seguidores</a></li>
            <?php } ?>
         </ul>
         <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= site_url(); ?>" target="_blank"><span class="glyphicon glyphicon-globe"></span> Ver sitio</a></li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= $avatar; ?>" class="profile-image img-circle" style="width: 20px; height: 20px;"> <?= $this->session->userdata('user_username'); ?> <b class="caret"></b>
               </a>
               <ul class="dropdown-menu">
                  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mi perfil</a></li>
                  <li><a href="<?= site_url('users/edit_avatar/') . cryp($this->session->userdata('id_user')) . '/'; ?>"><span class="glyphicon glyphicon-picture"></span> Editar avatar</a></li>
                  <li class="divider"></li>
                  <li><a href="<?= site_url('auth/logout/'); ?>" class="btn-logout"><span class="glyphicon glyphicon-off"></span> Cerrar sesión</a></li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</nav>