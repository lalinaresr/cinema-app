<div class="col-md-4">
    <div class="form-group">
        <label>Estatus:</label>
        <p class="form-control-static"><?= $productor['status_name']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Nombre:</label>
        <p class="form-control-static"><?= $productor['productor_name']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Alias:</label>
        <p class="form-control-static"><?= $productor['productor_slug']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de registro:</label>
        <p class="form-control-static"><?= $productor['date_registered_pro']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>IP de registro:</label>
        <p class="form-control-static"><?= $productor['ip_registered_pro']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de modificación:</label>
        <p class="form-control-static"><?= $productor['date_modified_pro']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>IP de modificación:</label>
        <p class="form-control-static"><?= $productor['ip_modified_pro']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de registro:</label>
        <p class="form-control-static"><?= $productor['client_registered_pro']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de modificación:</label>
        <p class="form-control-static"><?= $productor['client_modified_pro']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <a href="<?= site_url('productors'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
    <a href="<?= site_url("productors/edit_logo/{$productor['id_productor']}"); ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Editar logo</a>
    <a href="<?= site_url("productors/edit/{$productor['id_productor']}"); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
    <button class="btn btn-danger productor-delete-btn" data-element="<?= $productor['id_productor']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
</div>