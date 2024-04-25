<h1 class="page-header">Catálogo de usuarios | ver a detalle.</h1>
<div class="row">
   <!-- field FIRSTNAME -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Nombre(s):</label>
         <input type="text" class="form-control" value="<?= $view_user->contact_firstname; ?>" disabled>
      </div>
   </div>
   <!-- END field FIRSTNAME -->

   <!-- field LASTNAME -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Apellido(s):</label>
         <input type="text" class="form-control" value="<?= $view_user->contact_lastname; ?>" disabled>
      </div>
   </div>
   <!-- END field LASTNAME -->

   <!-- field SEX -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Sexo:</label>
         <input type="text" class="form-control" value="<?= $view_user->contact_sex; ?>" disabled>
      </div>
   </div>
   <!-- END field SEX -->

   <!-- field DATE BIRTHDAY -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Fecha de nacimiento:</label>
         <div class="input-group date">
            <input type="text" class="form-control" value="<?= $view_user->contact_date_birthday; ?>" disabled>
            <span class="input-group-addon">
               <span class="glyphicon glyphicon-calendar"></span>
            </span>
         </div>
      </div>
   </div>
   <!-- END field DATE BIRTHDAY -->

   <!-- field AGE EXACTLY -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Edad exacta:</label>
         <input type="text" class="form-control" value="<?= get_age_exactly($view_user->contact_date_birthday, 'ALL'); ?>" disabled>
      </div>
   </div>
   <!-- END field AGE EXACTLY -->

   <!-- field ROL NAME -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Rol:</label>
         <input type="text" class="form-control" value="<?= $view_user->rol_name; ?>" disabled>
      </div>
   </div>
   <!-- END field ROL NAME -->

   <!-- field STATUS NAME -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Estatus:</label>
         <input type="text" class="form-control" value="<?= $view_user->status_name; ?>" disabled>
      </div>
   </div>
   <!-- END field STATUS NAME -->

   <!-- field USERNAME -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Usuario:</label>
         <input type="text" class="form-control" value="<?= $view_user->user_username; ?>" disabled>
      </div>
   </div>
   <!-- END field USERNAME -->

   <!-- field EMAIL ADDRESS -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Correo electrónico:</label>
         <input type="email" class="form-control" value="<?= $view_user->user_email; ?>" disabled>
      </div>
   </div>
   <!-- END field EMAIL ADDRESS -->

   <!-- field PASSWORD -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Contraseña:</label>
         <input type="password" class="form-control" value="<?= $view_user->user_password; ?>" disabled>
      </div>
   </div>
   <!-- END field PASSWORD -->

   <!-- field USER AVATAR -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Avatar:</label>
         <a href='#modal-view-avatar_user-<?= $id_user_encryp; ?>' class="btn btn-info btn-block" data-toggle="modal"><span class="glyphicon glyphicon-picture"></span> Ver imagen</a>
         <!-- This is the modal that shows the image profile of the user. -->
         <div class="modal fade" id="modal-view-avatar_user-<?= $id_user_encryp; ?>">
            <div class="modal-dialog modal-sm">
               <div class="modal-content">
                  <div class="modal-header bg-black">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title text-center text-white">Usuario #<?= $id_user_encryp; ?></h4>
                  </div>
                  <div class="modal-body">
                     <?php if (strcmp($view_user->user_avatar, 'NO-IMAGE') == 0) : ?>
                        <img src="<?= encryp_image_base64(base_url() . 'storage/images/users/default.png'); ?>" class="img-rounded img-responsive" style="width: 100%; height: 100%;">
                     <?php else : ?>
                        <img src="<?= encryp_image_base64(base_url() . $view_user->user_avatar); ?>" class="img-rounded img-responsive" style="width: 100%; height: 100%;">
                     <?php endif ?>
                  </div>
                  <div class="modal-footer bg-black">
                     <?php if (decryp($id_user_encryp) == $this->session->userdata('id_user')) : ?>
                        <a href="<?= site_url('users/edit_avatar/') . $id_user_encryp . '/'; ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Editar avatar</a>
                     <?php endif ?>
                     <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- END This is the modal that shows the image profile of the user. -->
      </div>
   </div>
   <!-- END field USER AVATAR -->

   <!-- field DATE REGISTERED USER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Fecha de registro:</label>
         <input type="text" class="form-control" value="<?= $view_user->date_registered_usr; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE REGISTERED USER -->

   <!-- field IP REGISTERED USER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>IP de registro:</label>
         <input type="text" class="form-control" value="<?= $view_user->ip_registered_usr; ?>" disabled>
      </div>
   </div>
   <!-- END field IP REGISTERED USER -->

   <!-- field DATE MODIFIED USER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Fecha de modificación:</label>
         <input type="text" class="form-control" value="<?= $view_user->date_modified_usr; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE MODIFIED USER -->

   <!-- field IP MODIFIED USER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>IP de modificación:</label>
         <input type="text" class="form-control" value="<?= $view_user->ip_modified_usr; ?>" disabled>
      </div>
   </div>
   <!-- END field IP MODIFIED USER -->

   <!-- field CLIENT REGISTERED USER -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Dispositivo de registro:</label>
         <textarea type="text" class="form-control " disabled><?= $view_user->client_registered_usr; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT REGISTERED USER -->

   <!-- field CLIENT MODIFIED USER -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Dispositivo de modificación:</label>
         <textarea type="text" class="form-control " disabled><?= $view_user->client_modified_usr; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT MODIFIED USER -->

   <!-- button RETURN -->
   <div class="col-md-4">
      <a href="<?= site_url('users/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
   </div>
   <!-- END button RETURN -->
</div>