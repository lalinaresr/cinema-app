<div class="col-md-4">
    <div class="form-group">
        <label>Estatus:</label>
        <p class="form-control-static"><?= $quality['status_name']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Nombre:</label>
        <p class="form-control-static"><?= $quality['quality_name']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Alias:</label>
        <p class="form-control-static"><?= $quality['quality_slug']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de registro:</label>
        <p class="form-control-static"><?= $quality['date_registered_qlt']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>IP de registro:</label>
        <p class="form-control-static"><?= $quality['ip_registered_qlt']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de modificación:</label>
        <p class="form-control-static"><?= $quality['date_modified_qlt']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>IP de modificación:</label>
        <p class="form-control-static"><?= $quality['ip_modified_qlt']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de registro:</label>
        <p class="form-control-static"><?= $quality['client_registered_qlt']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de modificación:</label>
        <p class="form-control-static"><?= $quality['client_modified_qlt']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <a href="<?= site_url('qualities'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
    <a href="<?= site_url("qualities/edit/{$quality['id_quality']}"); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
    <button class="btn btn-danger quality-delete-btn" data-element="<?= $quality['id_quality']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
</div>