<?php if ($others_sessions->num_rows() > 0) : ?>
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Últimas sesiones</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table style="width: 100%;" class="table table-bordered table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Rol</th>
                            <th>Usuario</th>
                            <th>Fecha de sesión</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($others_sessions->result_array() as $session) : ?>
                            <tr>
                                <td><?= $session['rol_name']; ?></td>
                                <td><?= $session['user_username']; ?></td>
                                <td><?= $session['date_registered_ses']; ?></td>
                                <td><a href='#session-<?= $session['id_session']; ?>-view' data-toggle="modal">Ver</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="<?= site_url('sessions'); ?>" class="btn btn-warning btn-block"><span class="glyphicon glyphicon-fire"></span> Ver todas</a>
        </div>
    </div>

    <?php
        foreach ($others_sessions->result_array() as $session) :
            $this->load->view('components/sessions/view-modal', compact('session'));
        endforeach;
    ?>

<?php else : ?>
    <div class="alert alert-danger">
        <strong>¡Aviso!</strong> Aún no se han registrado inicios de sesión de otros usuarios.
    </div>
<?php endif; ?>