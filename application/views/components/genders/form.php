<form action="<?= $form_action; ?>" method="<?= $form_method ?? 'POST'; ?>" id="<?= $form_id; ?>">
    <?php if (isset($gender)) : ?>
        <input type="hidden" name="gender" value="<?= $gender['id_gender']; ?>">
    <?php endif; ?>
    <div class="col-md-12">
        <div class="form-group">
            <label for="status">Estatus:</label>
            <select id="status" name="status" class="form-control" required>
                <option disabled value selected>Seleccione un estatus para el género</option>
                <?php foreach ($status->result_array() as $status) : ?>
                    <option value="<?= $status['id_status']; ?>" <?= isset($gender) ? ($gender['id_status'] == $status['id_status'] ? 'selected' : '') : ''; ?>><?= $status['status_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="<?= $gender['gender_name'] ?? ''; ?>" class="form-control" required minlength="3" maxlength="50" autocomplete="off" autofocus>
        </div>
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-custom" id="<?= $btn_id; ?>"><?= $btn_text; ?></button>
        <a href="<?= site_url('genders'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
    </div>
</form>