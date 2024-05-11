<h1 class="page-header">Gestión de calidades</h1>
<?php if ($qualities->num_rows() > 0) : ?>
    <div class="table-responsive">
        <table id="qualities-table" class="table table-bordered table-condensed table-hover" style="width: 100%;">
            <thead>
                <tr>
                    <th>Estatus</th>
                    <th>Nombre</th>
                    <th>Alias</th>
                    <th>Fecha de registro</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($qualities->result_array() as $key => $quality) : ?>
                    <tr data-key="<?= $key; ?>" class="<?= $quality['id_status'] == 1 ? 'success' : 'danger';  ?>">
                        <td><span class="label label-<?= $quality['id_status'] == 1 ? 'success' : 'danger';  ?>"><?= $quality['status_name']; ?></span></td>
                        <td><?= $quality['quality_name']; ?></td>
                        <td><?= $quality['quality_slug']; ?></td>
                        <td><?= $quality['date_registered_qlt']; ?></td>
                        <td>
                            <a href="<?= site_url("qualities/view/{$quality['id_quality']}"); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="<?= site_url("qualities/edit/{$quality['id_quality']}"); ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                            <button class="btn btn-danger btn-sm quality-delete-btn" data-element="<?= $quality['id_quality']; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <div class="alert alert-danger">
        <strong>¡Aviso!</strong> No se encontraron datos de calidades para mostrar en estos momentos.
    </div>
<?php endif; ?>
<a href="<?= site_url('qualities/create'); ?>" class="btn btn-custom"><span class="glyphicon glyphicon-plus"></span> Crear</a>