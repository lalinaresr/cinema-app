<h1 class="page-header">Gestión de sesiones</h1>
<?php if ($sessions->num_rows() > 0) : ?>
    <div class="table-responsive">
        <table id="sessions-table" class="table table-bordered table-condensed table-hover" style="width: 100%;">
            <thead>
                <tr>
                    <th>Estatus</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Fecha de sesión</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sessions->result_array() as $session) : ?>
                    <tr class="<?= $session['id_status'] == 1 ? 'success' : 'danger'; ?>">
                        <td><span class="label label-<?= $session['id_status'] == 1 ? 'success' : 'danger'; ?>"><?= $session['status_name']; ?></span></td>
                        <td><?= $session['user_username']; ?></td>
                        <td><?= $session['rol_name']; ?></td>
                        <td><?= $session['date_registered_ses']; ?></td>
                        <td><a href="<?= site_url("sessions/view/{$session['id_session']}"); ?>" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <div class="alert alert-danger">
        <strong>¡Aviso!</strong> No se encontraron datos de sesiones para mostrar en estos momentos.
    </div>
<?php endif; ?>