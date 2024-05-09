<form action="<?= site_url('productors/update_logo'); ?>" method="POST" id="logo-update-form" enctype="multipart/form-data">
    <input type="hidden" name="productor" value="<?= $productor['id_productor']; ?>">
    <div class="col-md-12">
        <div class="form-group">
            <label>Logo:</label>
            <input type="file" id="logo" name="logo" class="form-control" required>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <img src="<?= base_url(($productor['productor_image_logo'] == 'NO-IMAGE' ? FOLDER_PRODUCTORS . '/default.png' : $productor['productor_image_logo'])); ?>" id="logo-preview-image" class="img-rounded center-block" style="width: 35%;">
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-custom" id="logo-update-btn"><span class="glyphicon glyphicon-upload"></span> Subir</button>
        <a href="<?= site_url('productors'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
    </div>
</form>