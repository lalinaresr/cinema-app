<h1 class="page-header">Gestión de géneros</h1>
<?php if ($genders->num_rows() > 0) : ?>
    <div class="table-responsive">
        <table id="genders-table" class="table table-bordered table-condensed table-hover" style="width: 100%;">
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
                <?php foreach ($genders->result_array() as $gender) : ?>
                    <tr class="<?= $gender['id_status'] == 1 ? 'success' : 'danger';  ?>">
                        <td><span class="label label-<?= $gender['id_status'] == 1 ? 'success' : 'danger';  ?>"><?= $gender['status_name']; ?></span></td>
                        <td><?= $gender['gender_name']; ?></td>
                        <td><?= $gender['gender_slug']; ?></td>
                        <td><?= $gender['date_registered_gds']; ?></td>
                        <td>
                            <a href="<?= site_url("genders/view/{$gender['id_gender']}"); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="<?= site_url("genders/edit/{$gender['id_gender']}"); ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                            <button class="btn btn-danger btn-sm gender-delete-btn" data-element="<?= $gender['id_gender']; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <div class="alert alert-danger">
        <strong>¡Aviso!</strong> No se encontraron datos de géneros para mostrar en estos momentos.
    </div>
<?php endif; ?>
<a href="<?= site_url('genders/create'); ?>" class="btn btn-custom"><span class="glyphicon glyphicon-plus"></span> Crear</a>