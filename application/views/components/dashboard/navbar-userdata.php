<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php if ($this->session->userdata('is_admin')) : ?>
            <img src="<?= $avatar; ?>" class="profile-image img-circle" style="width: 20px; height: 20px;"> <?= $this->session->userdata('user_username'); ?> <b class="caret"></b>
        <?php else : ?>
            <span class="glyphicon glyphicon-user"></span> <?= $this->session->userdata('user_username'); ?> <b class="caret"></b>
        <?php endif; ?>
    </a>
    <ul class="dropdown-menu">
        <?php if ($this->session->userdata('is_admin')) : ?>
            <li><a href="<?= site_url("users/edit_avatar/{$this->session->userdata('id_user')}"); ?>"><span class="glyphicon glyphicon-picture"></span> Editar avatar</a></li>
            <li class="divider"></li>
        <?php endif; ?>
        <li><a href="<?= site_url('auth/logout'); ?>" class="logout-btn"><span class="glyphicon glyphicon-off"></span> Cerrar sesión</a></li>
    </ul>
</li>