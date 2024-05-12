<div class="modal fade" id="session-<?= $session['id_session']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center text-white">Detalle de la sesión</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sis. Ope. usado:</label>
                            <p class="form-control-static"><?= $session['session_os_used']; ?></p>
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
                </div>
            </div>
            <div class="modal-footer bg-black">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>