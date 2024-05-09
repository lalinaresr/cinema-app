<form action="<?= site_url('movies/update_cover'); ?>" method="POST" id="cover-update-form" enctype="multipart/form-data">
    <input type="hidden" name="movie" value="<?= $movie['id_movie']; ?>">
    <div class="col-md-12">
        <div class="form-group">
            <label for="cover">Portada:</label>
            <input type="file" id="cover" name="cover" class="form-control" required>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <img src="<?= base_url(($movie['movie_cover'] == 'NO-IMAGE' ? FOLDER_MOVIES . '/default.png' : $movie['movie_cover'])); ?>" id="cover-preview-image" class="img-rounded center-block" style="width: 25%;">
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-custom" id="cover-update-btn"><span class="glyphicon glyphicon-upload"></span> Subir</button>
        <a href="<?= site_url('movies'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
    </div>
</form>