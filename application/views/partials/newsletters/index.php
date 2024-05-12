<h1 class="page-header">Gestión de seguidores</h1>
<?php if ($newsletters->num_rows() > 0) : ?>
    <div class="table-responsive">
        <table id="newsletters-table" class="table table-bordered table-condensed table-hover" style="width: 100%;">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Fecha de registro</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($newsletters->result_array() as $key => $newsletter) : ?>
                    <tr data-key="<?= $key; ?>" class="success">
                        <td><?= $newsletter['newsletter_name']; ?></td>
                        <td><a href="mailto:<?= $newsletter['newsletter_email']; ?>"><?= $newsletter['newsletter_email']; ?></a></td>
                        <td><?= $newsletter['date_registered_nlt']; ?></td>
                        <td>
                            <a href="<?= site_url("newsletters/{$newsletter['id_newsletter']}"); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <button class="btn btn-danger btn-sm newsletter-delete-btn" data-element="<?= $newsletter['id_newsletter']; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <div class="alert alert-danger">
        <strong>¡Aviso!</strong> No se encontraron datos de seguidores para mostrar en estos momentos.
    </div>
<?php endif; ?>