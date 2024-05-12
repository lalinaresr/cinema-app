<div class="modal fade" id="logo-<?= $productor['id_productor']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center text-white">Logo de <?= $productor['productor_name']; ?></h4>
            </div>
            <div class="modal-body">
                <img src="<?= base_url(($productor['productor_image_logo'] != 'NO-IMAGE' ? $productor['productor_image_logo'] : FOLDER_PRODUCTORS . '/default.png')); ?>" class="img-rounded img-responsive" style="width: 100%; height: 100%;">
            </div>
            <div class="modal-footer bg-black">
                <a href="<?= site_url("productors/{$productor['id_productor']}/edit-logo"); ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Editar logo</a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>