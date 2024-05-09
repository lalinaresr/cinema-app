<form action="<?= $form_action; ?>" method="<?= $form_method ?? 'POST'; ?>" id="<?= $form_id; ?>">
    <?php if (isset($movie)) : ?>
        <input type="hidden" name="movie" value="<?= $movie['id_movie']; ?>">
    <?php endif; ?>
    <div class="col-md-4">
        <div class="form-group">
            <select id="productors" name="productors[]" multiple class="form-control" required>
                <?php foreach ($productors->result_array() as $productor) : ?>
                    <option value="<?= $productor['id_productor']; ?>" <?= isset($movie) ? (in_array($productor['id_productor'], array_column($productors_by_movie->result_array(), 'id_productor')) ? 'selected' : '')  : ''; ?>><?= $productor['productor_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <select id="genders" name="genders[]" multiple class="form-control" required>
                <?php foreach ($genders->result_array() as $gender) : ?>
                    <option value="<?= $gender['id_gender']; ?>" <?= isset($movie) ? (in_array($gender['id_gender'], array_column($genders_by_movie->result_array(), 'id_gender')) ? 'selected' : '')  : ''; ?>><?= $gender['gender_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <select id="categories" name="categories[]" multiple class="form-control" required>
                <?php foreach ($categories->result_array() as $category) : ?>
                    <option value="<?= $category['id_category']; ?>" <?= isset($movie) ? (in_array($category['id_category'], array_column($categories_by_movie->result_array(), 'id_category')) ? 'selected' : '')  : ''; ?>><?= $category['category_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status">Estatus:</label>
            <select id="status" name="status" class="form-control" required>
                <option disabled value selected>Seleccione un estatus para la película</option>
                <?php foreach ($status->result_array() as $status) : ?>
                    <option value="<?= $status['id_status']; ?>" <?= isset($movie) ? ($movie['id_status'] == $status['id_status'] ? 'selected' : '') : ''; ?>><?= $status['status_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="quality">Calidad:</label>
            <select id="quality" name="quality" class="form-control" required>
                <option disabled value selected>Seleccione una calidad para la película</option>
                <?php foreach ($qualities->result_array() as $quality) : ?>
                    <option value="<?= $quality['id_quality']; ?>" <?= isset($movie) ? ($movie['id_quality'] == $quality['id_quality'] ? 'selected' : '') : ''; ?>><?= $quality['quality_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="<?= $movie['movie_name'] ?? ''; ?>" class="form-control" required minlength="3" maxlength="50" autocomplete="off" autofocus>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="release_date">Fecha de lanzamiento:</label>
            <div class="input-group">
                <input type="text" id="release_date" name="release_date" value="<?= $movie['movie_release_date'] ?? ''; ?>" class="form-control" required autocomplete="off">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="duration"> Duración:</label>
            <input type="text" id="duration" name="duration" value="<?= $movie['movie_duration'] ?? ''; ?>" class="form-control" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="country_origin">País de origen:</label>
            <select id="country_origin" name="country_origin" class="form-control" required>
                <option disabled value selected>Seleccione un país para la película</option>
                <?php foreach (get_all_countries() as $country) : ?>
                    <option value="<?= $country; ?>" <?= isset($movie) ? ($movie['movie_country_origin'] == $country ? 'selected' : '') : ''; ?>><?= $country; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="link">Enlace:</label>
            <input type="text" id="link" name="link" value="<?= $movie['movie_play'] ?? ''; ?>" class="form-control" required autocomplete="off">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea type="text" id="description" name="description" class="form-control"><?= $movie['movie_description'] ?? ''; ?></textarea>
        </div>
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-custom" id="<?= $btn_id; ?>"><?= $btn_text; ?></button>
        <a href="<?= site_url('movies'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
    </div>
</form>