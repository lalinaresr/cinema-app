<h1 class="page-header">Gestión de categorías</h1>
<?php if ($categories->num_rows() > 0) : ?>
    <div class="table-responsive">
        <table id="categories-table" class="table table-bordered table-condensed table-hover" style="width: 100%;">
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
                <?php foreach ($categories->result_array() as $key => $category) : ?>
                    <tr data-key="<?= $key; ?>" class="<?= $category['id_status'] == 1 ? 'success' : 'danger';  ?>">
                        <td><span class="label label-<?= $category['id_status'] == 1 ? 'success' : 'danger';  ?>"><?= $category['status_name']; ?></span></td>
                        <td><?= $category['category_name']; ?></td>
                        <td><?= $category['category_slug']; ?></td>
                        <td><?= $category['date_registered_cat']; ?></td>
                        <td>
                            <a href="<?= site_url("categories/view/{$category['id_category']}"); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="<?= site_url("categories/edit/{$category['id_category']}"); ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                            <button class="btn btn-danger btn-sm category-delete-btn" data-element="<?= $category['id_category']; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <div class="alert alert-danger">
        <strong>¡Aviso!</strong> No se encontraron datos de categorías para mostrar en estos momentos.
    </div>
<?php endif; ?>
<a href="<?= site_url('categories/create'); ?>" class="btn btn-custom"><span class="glyphicon glyphicon-plus"></span> Crear</a>