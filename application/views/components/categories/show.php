<div class="col-md-4">
    <div class="form-group">
        <label>Estatus:</label>
        <p class="form-control-static"><?= $category['status_name']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Nombre:</label>
        <p class="form-control-static"><?= $category['category_name']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Alias:</label>
        <p class="form-control-static"><?= $category['category_slug']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de registro:</label>
        <p class="form-control-static"><?= $category['date_registered_cat']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>IP de registro:</label>
        <p class="form-control-static"><?= $category['ip_registered_cat']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de modificación:</label>
        <p class="form-control-static"><?= $category['date_modified_cat']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>IP de modificación:</label>
        <p class="form-control-static"><?= $category['ip_modified_cat']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de registro:</label>
        <p class="form-control-static"><?= $category['client_registered_cat']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de modificación:</label>
        <p class="form-control-static"><?= $category['client_modified_cat']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <a href="<?= site_url('categories'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
    <a href="<?= site_url("categories/{$category['id_category']}/edit"); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
    <button class="btn btn-danger category-delete-btn" data-element="<?= $category['id_category']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
</div>