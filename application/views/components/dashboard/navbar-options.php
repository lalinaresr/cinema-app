<li <?= is_active('dashboard'); ?>>
    <a href="<?= site_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span> Panel</a>
</li>

<?php if ($this->session->userdata('is_admin')) : ?>
    <li <?= is_active('sessions'); ?>>
        <a href="<?= site_url('sessions'); ?>"><span class="glyphicon glyphicon-list-alt"></span> Sesiones</a>
    </li>
    <li <?= is_active('users'); ?>>
        <a href="<?= site_url('users'); ?>"><span class="glyphicon glyphicon-user"></span> Usuarios</a>
    </li>    
<?php endif; ?>

<?php if ($this->session->userdata('is_admin') || $this->session->userdata('is_guest')) : ?>
    <li <?= is_active('qualities'); ?>>
        <a href="<?= site_url('qualities'); ?>"><span class="glyphicon glyphicon-flag"></span> Calidades</a>
    </li>
    <li <?= is_active('categories'); ?>>
        <a href="<?= site_url('categories'); ?>"><span class="glyphicon glyphicon-tags"></span> Categorías</a>
    </li>
    <li <?= is_active('genders'); ?>>
        <a href="<?= site_url('genders'); ?>"><span class="glyphicon glyphicon-globe"></span> Géneros</a>
    </li>
    <li <?= is_active('productors'); ?>>
        <a href="<?= site_url('productors'); ?>"><span class="glyphicon glyphicon-film"></span> Productores</a>
    </li>
    <li <?= is_active('movies'); ?>>
        <a href="<?= site_url('movies'); ?>"><span class="glyphicon glyphicon-cd"></span> Películas</a>
    </li>
    <li <?= is_active('newsletters'); ?>>
        <a href="<?= site_url('newsletters'); ?>"><span class="glyphicon glyphicon-heart"></span> Seguidores</a>
    </li>
<?php endif; ?>

<?php if ($this->session->userdata('is_user')) : ?>
    <li>
        <a href="#"><span class="glyphicon glyphicon-list-alt"></span> Historial</a>
    </li>
<?php endif; ?>