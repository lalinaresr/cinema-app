<form id="<?= $form_id; ?>">
    <?php if (isset($quality)) : ?>
        <input type="hidden" name="quality" value="<?= $quality['id_quality']; ?>">
    <?php endif; ?>
    <div class="col-md-12">
        <div class="form-group">
            <label for="status">Estatus:</label>
            <select id="status" name="status" class="form-control" required>
                <option disabled value selected>Seleccione un estatus para la calidad</option>
                <?php foreach ($status->result_array() as $status) : ?>
                    <option value="<?= $status['id_status']; ?>" <?= isset($quality) ? ($quality['id_status'] == $status['id_status'] ? 'selected' : '') : ''; ?>><?= $status['status_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="<?= $quality['quality_name'] ?? ''; ?>" class="form-control" required minlength="3" maxlength="50" autocomplete="off" autofocus>
        </div>
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-custom" id="<?= $btn_id; ?>"><?= $btn_text; ?></button>
        <a href="<?= site_url('qualities'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
    </div>
</form>