<?php if ($suggestions->num_rows() > 0) : ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Últimas sugerencias</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table style="width: 100%;" class="table table-bordered table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Correo electrónico</th>
                            <th>Fecha de registro</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($suggestions->result_array() as $suggestion) : ?>
                            <tr>
                                <td><a href="mailto:<?= $suggestion['suggestion_email']; ?>"><?= $suggestion['suggestion_email']; ?></a></td>
                                <td><?= $suggestion['date_registered_sug']; ?></td>
                                <td><a href='#suggestion-<?= $suggestion['id_suggestion']; ?>' data-toggle="modal">Ver</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="<?= site_url('suggestions'); ?>" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-fire"></span> Ver todas</a>
        </div>
    </div>

    <?php
        foreach ($suggestions->result_array() as $suggestion) :
            $this->load->view('components/suggestions/show-modal', compact('suggestion'));
        endforeach;
    ?>

<?php else : ?>
    <div class="alert alert-danger">
        <strong>¡Aviso!</strong> No se encontraron datos de sugerencias para mostrar en estos momentos.
    </div>
<?php endif; ?>