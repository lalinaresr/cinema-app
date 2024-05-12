<?php if ($newsletters->num_rows() > 0) : ?>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Últimos seguidores</h3>
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
                        <?php foreach ($newsletters->result_array() as $newsletter) : ?>
                            <tr>
                                <td><a href="mailto:<?= $newsletter['newsletter_email']; ?>"><?= $newsletter['newsletter_email']; ?></a></td>
                                <td><?= $newsletter['date_registered_nlt']; ?></td>
                                <td><a href='#newsletter-<?= $newsletter['id_newsletter']; ?>' data-toggle="modal">Ver</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="<?= site_url('newsletters'); ?>" class="btn btn-success btn-block"><span class="glyphicon glyphicon-fire"></span> Ver todos</a>
        </div>
    </div>

    <?php
        foreach ($newsletters->result_array() as $newsletter) :
            $this->load->view('components/newsletters/show-modal', compact('newsletter'));
        endforeach;
    ?>

<?php else : ?>
    <div class="alert alert-danger">
        <strong>¡Aviso!</strong> No se encontraron datos de seguidores para mostrar en estos momentos.
    </div>
<?php endif; ?>