<div class="col-md-4">
    <div class="form-group">
        <label>Rol:</label>
        <p class="form-control-static"><?= $session['rol_name']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Estatus:</label>
        <p class="form-control-static"><?= $session['status_name']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Usuario:</label>
        <p class="form-control-static"><?= $session['user_username']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Navegador usado:</label>
        <p class="form-control-static"><?= $session['session_browser_used']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Sis. Ope. usado:</label>
        <p class="form-control-static"><?= $session['session_os_used']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Versión del navegador:</label>
        <p class="form-control-static"><?= $session['session_browser_version']; ?></p>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>IP de registro:</label>
        <p class="form-control-static"><?= $session['ip_registered_ses']; ?></p>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Fecha de registro:</label>
        <p class="form-control-static"><?= $session['date_registered_ses']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de registro:</label>
        <p class="form-control-static"><?= $session['client_registered_ses']; ?></p>
    </div>
</div>
<div class="col-md-4">
    <a href="<?= site_url('sessions'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
</div>