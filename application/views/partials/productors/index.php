<h1 class="page-header">Gestión de productores</h1>
<?php if ($productors->num_rows() > 0) : ?>
    <div class="table-responsive">
        <table id="productors-table" class="table table-bordered table-condensed table-hover" style="width: 100%;">
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
                <?php foreach ($productors->result_array() as $key => $productor) : ?>
                    <tr data-key="<?= $key; ?>" class="<?= $productor['id_status'] == 1 ? 'success' : 'danger';  ?>">
                        <td><span class="label label-<?= $productor['id_status'] == 1 ? 'success' : 'danger';  ?>"><?= $productor['status_name']; ?></span></td>
                        <td><a href="#logo-<?= $productor['id_productor']; ?>" data-toggle="modal"><?= $productor['productor_name']; ?></a></td>
                        <td><?= $productor['productor_slug']; ?></td>
                        <td><?= $productor['date_registered_pro']; ?></td>
                        <td>
                            <a href="<?= site_url("productors/{$productor['id_productor']}"); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="<?= site_url("productors/{$productor['id_productor']}/edit"); ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                            <button class="btn btn-danger btn-sm productor-delete-btn" data-element="<?= $productor['id_productor']; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <?php
        foreach ($productors->result_array() as $productor) :
            $this->load->view('components/productors/show-logo-modal', compact('productor'));
        endforeach;
    ?>

<?php else : ?>
    <div class="alert alert-danger">
        <strong>¡Aviso!</strong> No se encontraron datos de productores para mostrar en estos momentos.
    </div>
<?php endif; ?>
<a href="<?= site_url('productors/create'); ?>" class="btn btn-custom"><span class="glyphicon glyphicon-plus"></span> Crear</a>