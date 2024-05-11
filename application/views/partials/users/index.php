<h1 class="page-header">Gestión de usuarios</h1>
<?php if ($users->num_rows() > 0) : ?>
    <div class="table-responsive">
        <table id="users-table" class="table table-bordered table-condensed table-hover" style="width: 100%;">
            <thead>
                <tr>
                    <th>Estatus</th>
                    <th>Rol</th>
                    <th>Usuario</th>
                    <th>Correo electrónico</th>
                    <th>Fecha de registro</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users->result_array() as $key => $user) : ?>
                    <tr data-key="<?= $key; ?>" class="<?= $user['id_status'] == 1 ? 'success' : 'danger';  ?>">
                        <td><span class="label label-<?= $user['id_status'] == 1 ? 'success' : 'danger'; ?>"><?= $user['status_name']; ?></span></td>
                        <td><?= $user['rol_name']; ?></td>
                        <td><a href="#avatar-<?= $user['id_user']; ?>-view" data-toggle="modal"><?= $user['user_username']; ?></a></td>
                        <td><a href="mailto:<?= $user['user_email']; ?>"><?= $user['user_email']; ?></a></td>
                        <td><?= $user['date_registered_usr']; ?></td>
                        <td>
                            <a href="<?= site_url("users/view/{$user['id_user']}"); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="<?= site_url("users/edit/{$user['id_user']}"); ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                            <?php if ($user['id_user'] != $this->session->userdata('id_user')) : ?>
                                <button class="btn btn-danger btn-sm user-delete-btn" data-element="<?= $user['id_user']; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php
        foreach ($users->result_array() as $user) :
            $this->load->view('components/users/view-avatar-modal', compact('user'));
        endforeach;
    ?>

<?php else : ?>
    <div class="alert alert-danger">
        <strong>¡Aviso!</strong> No se encontraron datos de usuarios para mostrar en estos momentos.
    </div>
<?php endif; ?>
<a href="<?= site_url('users/create'); ?>" class="btn btn-custom"><span class="glyphicon glyphicon-plus"></span> Crear</a>