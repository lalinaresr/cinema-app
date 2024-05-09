<form action="<?= site_url('users/update_avatar'); ?>" method="POST" id="avatar-update-form" enctype="multipart/form-data">
    <input type="hidden" name="user" value="<?= $user['id_user']; ?>">
    <div class="col-md-12">
        <div class="form-group">
            <label for="avatar">Avatar:</label>
            <input type="file" id="avatar" name="avatar" class="form-control" required>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <img src="<?= base_url(($user['user_avatar'] == 'NO-IMAGE' ? FOLDER_AVATARS . '/default.png' : $user['user_avatar'])); ?>" id="avatar-preview-image" class="img-rounded center-block" style="width: 25%;">
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-custom" id="avatar-update-btn"><span class="glyphicon glyphicon-upload"></span> Subir</button>
        <a href="<?= site_url('users'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
    </div>
</form>