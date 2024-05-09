<div class="col-md-4">
    <div class="form-group">
        <label>Productores:</label>
        <?php if ($productors_by_movie->num_rows()) : ?>
            <p class="form-control-static"><?= implode(', ', array_column($productors_by_movie->result_array(), 'productor_name')); ?></p>
        <?php else : ?>
            <p class="form-control-static">No hay productores asignados a esta película</p>
        <?php endif; ?>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Géneros:</label>
        <?php if ($genders_by_movie->num_rows()) : ?>
            <p class="form-control-static"><?= implode(', ', array_column($genders_by_movie->result_array(), 'gender_name')); ?></p>
        <?php else : ?>
            <p class="form-control-static">No hay géneros asignados a esta película</p>
        <?php endif; ?>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label>Categorías:</label>
        <?php if ($categories_by_movie->num_rows()) : ?>
            <p class="form-control-static"><?= implode(', ', array_column($categories_by_movie->result_array(), 'category_name')); ?></p>
        <?php else : ?>
            <p class="form-control-static">No hay categorías asignadas a esta película</p>
        <?php endif; ?>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Estatus:</label>
        <p class="form-control-static"><?= $movie['status_name']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Calidad:</label>
        <p class="form-control-static"><?= $movie['quality_name']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Título:</label>
        <p class="form-control-static"><?= $movie['movie_name']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Alias:</label>
        <p class="form-control-static"><?= $movie['movie_slug']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de lanzamiento:</label>
        <p class="form-control-static"><?= $movie['movie_release_date']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Duración:</label>
        <p class="form-control-static"><?= $movie['movie_duration']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>País de origen:</label>
        <p class="form-control-static"><?= $movie['movie_country_origin']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Reproducciones:</label>
        <p class="form-control-static"><?= $movie['movie_reproductions']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Enlace:</label>
        <p class="form-control-static"><?= $movie['movie_play']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Descripción:</label>
        <p class="form-control-static"><?= $movie['movie_description']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de registro:</label>
        <p class="form-control-static"><?= $movie['date_registered_mov']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>IP de registro:</label>
        <p class="form-control-static"><?= $movie['ip_registered_mov']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Fecha de modificación:</label>
        <p class="form-control-static"><?= $movie['date_modified_mov']; ?></p>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>IP de modificación:</label>
        <p class="form-control-static"><?= $movie['ip_modified_mov']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de registro:</label>
        <p class="form-control-static"><?= $movie['client_registered_mov']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Dispositivo de modificación:</label>
        <p class="form-control-static"><?= $movie['client_modified_mov']; ?></p>
    </div>
</div>
<div class="col-md-12">
    <a href="<?= site_url('movies'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
    <a href="<?= site_url("welcome/watch/{$movie['movie_slug']}"); ?>" class="btn btn-primary" target="_blank"><span class="glyphicon glyphicon-play"></span> Reproducir</a>
    <a href="<?= site_url("movies/edit_cover/{$movie['id_movie']}"); ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Editar portada</a>
    <a href="<?= site_url("movies/edit/{$movie['id_movie']}"); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
    <button class="btn btn-danger movie-delete-btn" data-element="<?= $movie['id_movie']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
</div>