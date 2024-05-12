<?php if ($my_sessions->num_rows() > 0) : ?>
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Mis últimas sesiones</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table style="width: 100%;" class="table table-bordered table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Navegador</th>
                            <th>Sis. Ope.</th>
                            <th>Fecha de sesión</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($my_sessions->result_array() as $session) : ?>
                            <tr>
                                <td><?= $session['session_browser_used']; ?></td>
                                <td><?= $session['session_os_used']; ?></td>
                                <td><?= $session['date_registered_ses']; ?></td>
                                <td><a href='#session-<?= $session['id_session']; ?>' data-toggle="modal">Ver</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
        foreach ($my_sessions->result_array() as $session) :
            $this->load->view('components/sessions/show-modal', compact('session'));
        endforeach;
    ?>

<?php else : ?>
    <div class="alert alert-danger">
        <strong>¡Aviso!</strong> No se encontraron datos de sus sesiones para mostrar en estos momentos.
    </div>
<?php endif; ?>