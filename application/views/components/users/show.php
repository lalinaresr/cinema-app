<div class="col-md-3">
    <div class="form-group">
        <label>Rol:</label>
        <p class="form-control-static"><?= $user['rol_name']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Estatus:</label>
        <p class="form-control-static"><?= $user['status_name']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Nombre(s):</label>
        <p class="form-control-static"><?= $user['contact_firstname']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Apellido(s):</label>
        <p class="form-control-static"><?= $user['contact_lastname']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Usuario:</label>
        <p class="form-control-static"><?= $user['user_username']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Correo electrónico:</label>
        <p class="form-control-static"><?= $user['user_email']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Sexo:</label>
        <p class="form-control-static"><?= $user['contact_sex']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de nacimiento:</label>
        <p class="form-control-static"><?= $user['contact_date_birthday']; ?></p>
    </div>
</div>
<!-- <div class="col-md-4">
    <div class="form-group">
        <label>Avatar:</label>
        <p><a href='#avatar-<?= $user['id_user']; ?>' data-toggle="modal"><span class="glyphicon glyphicon-picture"></span> Ver avatar</a></p>
    </div>
</div> -->
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de registro:</label>
        <p class="form-control-static"><?= $user['date_registered_usr']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>IP de registro:</label>
        <p class="form-control-static"><?= $user['ip_registered_usr']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de modificación:</label>
        <p class="form-control-static"><?= $user['date_modified_usr']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>IP de modificación:</label>
        <p class="form-control-static"><?= $user['ip_modified_usr']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de registro:</label>
        <p class="form-control-static"><?= $user['client_registered_usr']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de modificación:</label>
        <p class="form-control-static"><?= $user['client_modified_usr']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <a href="<?= site_url('users'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
    <a href="<?= site_url("users/{$user['id_user']}/edit-avatar"); ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Editar avatar</a>
    <a href="<?= site_url("users/{$user['id_user']}/edit"); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
    <?php if ($user['id_user'] != $this->session->userdata('id')) : ?>
        <button class="btn btn-danger user-delete-btn" data-element="<?= $user['id_user']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
    <?php endif; ?>
</div>