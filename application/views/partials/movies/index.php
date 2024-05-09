<h1 class="page-header">Gestión de películas</h1>
<?php if ($movies->num_rows() > 0) : ?>
    <div class="table-responsive">
        <table id="movies-table" class="table table-bordered table-condensed table-hover" style="width: 100%;">
            <thead>
                <tr>
                    <th>Estatus</th>
                    <th>Título</th>
                    <th>Alias</th>
                    <th>Reproducciones</th>
                    <th>Fecha de registro</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movies->result_array() as $movie) : ?>
                    <tr class="<?= $movie['id_status'] == 1 ? 'success' : 'danger';  ?>">
                        <td><span class="label label-<?= $movie['id_status'] == 1 ? 'success' : 'danger';  ?>"><?= $movie['status_name']; ?></span></td>
                        <td><a href="#cover-<?= $movie['id_movie']; ?>-view" data-toggle="modal"><?= $movie['movie_name']; ?></a></td>
                        <td><?= $movie['movie_slug']; ?></td>
                        <td><?= $movie['movie_reproductions']; ?></td>
                        <td><?= $movie['date_registered_mov']; ?></td>
                        <td>
                            <a href="<?= site_url("welcome/watch/{$movie['movie_slug']}"); ?>" class="btn btn-primary btn-sm" target="_blank"><span class="glyphicon glyphicon-play"></span></a>
                            <a href="<?= site_url("movies/view/{$movie['id_movie']}"); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="<?= site_url("movies/edit/{$movie['id_movie']}"); ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                            <button class="btn btn-danger btn-sm movie-delete-btn" data-element="<?= $movie['id_movie']; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php
        foreach ($movies->result_array() as $movie) :
            $this->load->view('components/movies/view-cover-modal', compact('movie'));
        endforeach;
    ?>

<?php else : ?>
    <div class="alert alert-danger">
        <strong>¡Aviso!</strong> No se encontraron datos de películas para mostrar en estos momentos.
    </div>
<?php endif; ?>
<a href="<?= site_url('movies/create'); ?>" class="btn btn-custom"><span class="glyphicon glyphicon-plus"></span> Crear</a>