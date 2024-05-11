<form id="<?= $form_id; ?>">
    <?php if (isset($user)) : ?>
        <input type="hidden" name="user" value="<?= $user['id_user']; ?>">
        <input type="hidden" name="contact" value="<?= $user['id_contact']; ?>">
    <?php endif; ?>
    <div class="col-md-6">
        <div class="form-group">
            <label for="role">Rol:</label>
            <select id="role" name="role" class="form-control" required>
                <option disabled value selected>Seleccione un rol para el usuario</option>
                <?php foreach ($roles->result_array() as $role) : ?>
                    <option value="<?= $role['id_rol']; ?>" <?= isset($user) ? ($user['id_rol'] == $role['id_rol'] ? 'selected' : '') : ''; ?>><?= $role['rol_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status">Estatus:</label>
            <select id="status" name="status" class="form-control" required>
                <option disabled value selected>Seleccione un estatus para el usuario</option>
                <?php foreach ($status->result_array() as $status) : ?>
                    <option value="<?= $status['id_status']; ?>" <?= isset($user) ? ($user['id_status'] == $status['id_status'] ? 'selected' : '') : ''; ?>><?= $status['status_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="firstname">Nombre(s):</label>
            <input type="text" id="firstname" name="firstname" value="<?= $user['contact_firstname'] ?? ''; ?>" class="form-control" required minlength="3" maxlength="25" autocomplete="off" autofocus>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="lastname">Apellido(s):</label>
            <input type="text" id="lastname" name="lastname" value="<?= $user['contact_lastname'] ?? ''; ?>" class="form-control" required minlength="3" maxlength="25" autocomplete="off">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" value="<?= $user['user_username'] ?? ''; ?>" class="form-control" required minlength="6" maxlength="50" autocomplete="off">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" value="<?= $user['user_email'] ?? ''; ?>" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" class="form-control" <?= !isset($user) ? 'required' : ''; ?> minlength="8" maxlength="12">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="sex">Sexo:</label>
            <select id="sex" name="sex" class="form-control" required>
                <option disabled value selected>Seleccione un sexo para el usuario</option>
                <?php foreach (['Hombre', 'Mujer', 'Sin especificar'] as $sex) : ?>
                    <option value="<?= $sex; ?>" <?= isset($user) ? ($user['contact_sex'] == $sex ? 'selected' : '') : ''; ?>><?= $sex; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="birthday">Fecha de nacimiento:</label>
            <div class="input-group">
                <input type="text" id="birthday" name="birthday" value="<?= $user['contact_date_birthday'] ?? ''; ?>" class="form-control" required autocomplete="off">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-custom" id="<?= $btn_id; ?>"><?= $btn_text; ?></button>
        <a href="<?= site_url('users'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
    </div>
</form>