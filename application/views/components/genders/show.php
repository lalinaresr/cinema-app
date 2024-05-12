<div class="col-md-4">
    <div class="form-group">
        <label>Estatus:</label>
        <p class="form-control-static"><?= $gender['status_name']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Nombre:</label>
        <p class="form-control-static"><?= $gender['gender_name']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Alias:</label>
        <p class="form-control-static"><?= $gender['gender_slug']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de registro:</label>
        <p class="form-control-static"><?= $gender['date_registered_gds']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>IP de registro:</label>
        <p class="form-control-static"><?= $gender['ip_registered_gds']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de modificación:</label>
        <p class="form-control-static"><?= $gender['date_modified_gds']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>IP de modificación:</label>
        <p class="form-control-static"><?= $gender['ip_modified_gds']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de registro:</label>
        <p class="form-control-static"><?= $gender['client_registered_gds']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de modificación:</label>
        <p class="form-control-static"><?= $gender['client_modified_gds']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <a href="<?= site_url('genders'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
    <a href="<?= site_url("genders/{$gender['id_gender']}/edit"); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
    <button class="btn btn-danger gender-delete-btn" data-element="<?= $gender['id_gender']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
</div>