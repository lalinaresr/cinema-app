<div class="modal fade" id="cover-<?= $movie['id_movie']; ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center text-white">Portada de la película</h4>
            </div>
            <div class="modal-body">
                <img src="<?= base_url(($movie['movie_cover'] == 'NO-IMAGE' ? FOLDER_MOVIES . '/default.png' : $movie['movie_cover'])); ?>" class="img-rounded img-responsive center-block">
            </div>
            <div class="modal-footer bg-black">
                <a href="<?= site_url("movies/{$movie['id_movie']}/edit-cover"); ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Editar portada</a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>