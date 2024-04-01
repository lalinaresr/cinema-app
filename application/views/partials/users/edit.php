<h1 class="page-header">Catálogo de usuarios | editar.</h1>
<div class="row">
   <form action="<?= site_url('users/update/'); ?>" method="post" id="form-update-user">
      <input type="hidden" id="id_contact_update" name="id_contact_update" class="form-control" value="<?= cryp($edit_user->id_contact); ?>">

      <!-- field ID_USER -->
      <div class="col-md-12">
         <div class="form-group">
            <label>ID:</label>
            <input type="text" class="form-control" value="<?= $id_user_encryp; ?>" disabled>
            <input type="hidden" id="id_user_update" name="id_user_update" class="form-control" value="<?= $id_user_encryp; ?>">
         </div>
      </div>
      <!-- END field ID_USER -->

      <!-- field FIRSTNAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Nombre(s):</label>
            <input type="text" id="user_firstname_update" name="user_firstname_update" class="form-control" value="<?= $edit_user->contact_firstname; ?>" required minlength="3" maxlength="20" autocomplete="off">
         </div>
      </div>
      <!-- END field FIRSTNAME -->

      <!-- field LASTNAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Apellido(s):</label>
            <input type="text" id="user_lastname_update" name="user_lastname_update" class="form-control" value="<?= $edit_user->contact_lastname; ?>" required minlength="3" maxlength="20" autocomplete="off">
         </div>
      </div>
      <!-- END field LASTNAME -->

      <!-- field SEX -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Sexo:</label>
            <select id="user_sex_update" name="user_sex_update" class="form-control" required>
               <option value="<?= $edit_user->contact_sex; ?>" selected="true"><?= $edit_user->contact_sex; ?></option>
               <?php foreach (array('Hombre', 'Mujer', 'Sin especificar') as $key => $value) : ?>
                  <?php if ($value != $edit_user->contact_sex) : ?>
                     <option value="<?= $value; ?>"><?= $value; ?></option>
                  <?php endif ?>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field SEX -->

      <!-- field DATE BIRTHDAY -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Fecha de nacimiento:</label>
            <div class="input-group">
               <input type="text" id="user_date_birthday_update" name="user_date_birthday_update" class="form-control" value="<?= $edit_user->contact_date_birthday; ?>" required>
               <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
               </span>
            </div>
         </div>
      </div>
      <!-- END field DATE BIRTHDAY -->

      <!-- field ROL NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Rol:</label>
            <select id="user_rol_update" name="user_rol_update" class="form-control" required>
               <option value="<?= $edit_user->id_rol; ?>" selected="true"><?= $edit_user->rol_name; ?></option>
               <?php foreach ($get_all_roles_activated->result() as $key => $value) : ?>
                  <?php if ($value->id_rol != $edit_user->id_rol) : ?>
                     <option value="<?= $value->id_rol; ?>"><?= $value->rol_name; ?></option>
                  <?php endif ?>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field ROL NAME -->

      <!-- field STATUS NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Estatus:</label>
            <select id="user_status_update" name="user_status_update" class="form-control" required>
               <option value="<?= $edit_user->id_status; ?>"><?= $edit_user->status_name; ?></option>
               <?php foreach ($get_all_status->result() as $key => $value) : ?>
                  <?php if ($value->id_status != $edit_user->id_status) : ?>
                     <option value="<?= $value->id_status; ?>"><?= $value->status_name; ?></option>
                  <?php endif ?>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field STATUS NAME -->

      <!-- field USERNAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Usuario:</label>
            <input type="text" id="user_username_update" name="user_username_update" class="form-control" value="<?= $edit_user->user_username; ?>" readonly>
         </div>
      </div>
      <!-- END field USERNAME -->

      <!-- field EMAIL ADDRESS -->
      <div class="col-md-8">
         <div class="form-group">
            <label>Correo electrónico:</label>
            <input type="email" id="user_email_update" name="user_email_update" class="form-control" value="<?= $edit_user->user_email; ?>" readonly>
         </div>
      </div>
      <!-- END field EMAIL ADDRESS -->

      <!-- field PASSWORD -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Contraseña:</label>
            <input type="password" id="user_password_update" name="user_password_update" class="form-control" value="<?= $edit_user->user_password; ?>" readonly>
         </div>
      </div>
      <!-- END field PASSWORD -->

      <!-- field DATE MODIFIED USER -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Fecha de modificación:</label>
            <input type="text" class="form-control" value="<?= get_date_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field DATE MODIFIED USER -->

      <!-- field IP MODIFIED USER -->
      <div class="col-md-4">
         <div class="form-group">
            <label>IP de modificación:</label>
            <input type="text" class="form-control" value="<?= get_ip_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field IP MODIFIED USER -->

      <!-- field CLIENT MODIFIED USER -->
      <div class="col-md-12">
         <div class="form-group">
            <label>Dispositivo de modificación:</label>
            <textarea type="text" class="form-control txa-no-resize" disabled><?= get_agent_current(); ?></textarea>
         </div>
      </div>
      <!-- END field CLIENT MODIFIED USER -->

      <!-- buttons ACTIONS -->
      <div class="col-md-4">
         <button type="submit" class="btn btn-info" id="btn-update-user"><span class="glyphicon glyphicon-refresh"></span> Actualizar</button>
         <a href="<?= site_url('users/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
      </div>
      <!-- END buttons ACTIONS -->
   </form>
</div>