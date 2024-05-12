<div class="modal fade" id="newsletter-<?= $newsletter['id_newsletter']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center text-white">Detalle del seguidor</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre: </label>
                            <p class="form-control-static"><?= $newsletter['newsletter_name']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Correo electrónico: </label>
                            <p class="form-control-static"><?= $newsletter['newsletter_email']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>IP de registro:</label>
                            <p class="form-control-static"><?= $newsletter['ip_registered_nlt']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                </div>
            </div>
            <div class="modal-footer bg-black">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>