<div class="modal fade" id="suggestion-<?= $suggestion['id_suggestion']; ?>-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center text-white">Detalle de la sugerencia</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre: </label>
                            <p class="form-control-static"><?= $suggestion['suggestion_name']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Correo electrónico: </label>
                            <p class="form-control-static"><?= $suggestion['suggestion_email']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descripción:</label>
                            <p class="form-control-static"><?= $suggestion['suggestion_description']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>IP de registro:</label>
                            <p class="form-control-static"><?= $suggestion['ip_registered_sug']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha de registro:</label>
                            <p class="form-control-static"><?= $suggestion['date_registered_sug']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Dispositivo de registro:</label>
                            <p class="form-control-static"><?= $suggestion['client_registered_sug']; ?></p>
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