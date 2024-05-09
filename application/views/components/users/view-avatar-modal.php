<div class="modal fade" id="avatar-<?= $user['id_user']; ?>-view">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-black">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center text-white">Avatar de <?= $user['user_username']; ?></h4>
            </div>
            <div class="modal-body">
                <img src="<?= base_url(($user['user_avatar'] == 'NO-IMAGE') ? FOLDER_AVATARS . '/default.png' : $user['user_avatar']); ?>" class="img-rounded img-responsive center-block">
            </div>
            <div class="modal-footer bg-black">
                <?php if ($this->session->userdata('is_admin')) : ?>
                    <a href="<?= site_url("users/edit_avatar/{$user['id_user']}"); ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Editar avatar</a>
                <?php endif; ?>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>