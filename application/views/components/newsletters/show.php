<div class="col-md-3">
    <div class="form-group">
        <label>Nombre: </label>
        <p class="form-control-static"><?= $newsletter['newsletter_name']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Correo electrónico: </label>
        <p class="form-control-static"><?= $newsletter['newsletter_email']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>IP de registro:</label>
        <p class="form-control-static"><?= $newsletter['ip_registered_nlt']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de registro:</label>
        <p class="form-control-static"><?= $newsletter['date_registered_nlt']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de registro:</label>
        <p class="form-control-static"><?= $newsletter['client_registered_nlt']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <a href="<?= site_url('newsletters'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
    <button class="btn btn-danger newsletter-delete-btn" data-element="<?= $newsletter['id_newsletter']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
</div>