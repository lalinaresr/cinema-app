<h1 class="page-header">Catálogo de usuarios | agregar.</h1>
<div class="row">
   <form action="<?= site_url('users/insert/'); ?>" method="post" id="form-insert-user">
      <!-- field FIRSTNAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Nombre(s):</label>
            <input type="text" id="user_firstname_insert" name="user_firstname_insert" class="form-control" required minlength="3" maxlength="20" autocomplete="off">
         </div>
      </div>
      <!-- END field FIRSTNAME -->

      <!-- field LASTNAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Apellido(s):</label>
            <input type="text" id="user_lastname_insert" name="user_lastname_insert" class="form-control" required minlength="3" maxlength="20" autocomplete="off">
         </div>
      </div>
      <!-- END field LASTNAME -->

      <!-- field SEX -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Sexo:</label>
            <select id="user_sex_insert" name="user_sex_insert" class="form-control" required>
               <?php foreach (array('Hombre', 'Mujer', 'Sin especificar') as $key => $value) : ?>
                  <option value="<?= $value; ?>"><?= $value; ?></option>
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
               <input type="text" id="user_date_birthday_insert" name="user_date_birthday_insert" class="form-control" required>
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
            <select id="user_rol_insert" name="user_rol_insert" class="form-control" required>
               <?php foreach ($get_all_roles_activated->result() as $key => $value) : ?>
                  <option value="<?= $value->id_rol; ?>"><?= $value->rol_name; ?></option>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field ROL NAME -->

      <!-- field STATUS NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Estatus:</label>
            <select id="user_status_insert" name="user_status_insert" class="form-control" required>
               <?php foreach ($get_all_status->result() as $key => $value) : ?>
                  <option value="<?= $value->id_status; ?>"><?= $value->status_name; ?></option>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field STATUS NAME -->

      <!-- field USERNAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Usuario:</label>
            <input type="text" id="user_username_insert" name="user_username_insert" class="form-control" readonly>
         </div>
      </div>
      <!-- END field USERNAME -->

      <!-- field EMAIL ADDRESS -->
      <div class="col-md-8">
         <div class="form-group">
            <label>Correo electrónico:</label>
            <input type="email" id="user_email_insert" name="user_email_insert" class="form-control" readonly>
         </div>
      </div>
      <!-- END field EMAIL ADDRESS -->

      <!-- field PASSWORD -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Contraseña:</label>
            <input type="password" id="user_password_insert" name="user_password_insert" class="form-control" readonly>
         </div>
      </div>
      <!-- END field PASSWORD -->

      <!-- field DATE REGISTERED USER -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Fecha de registro:</label>
            <input type="text" class="form-control" value="<?= get_date_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field DATE REGISTERED USER -->

      <!-- field IP REGISTERED USER -->
      <div class="col-md-4">
         <div class="form-group">
            <label>IP de registro:</label>
            <input type="text" class="form-control" value="<?= get_ip_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field IP REGISTERED USER -->

      <!-- field CLIENT REGISTERED USER -->
      <div class="col-md-12">
         <div class="form-group">
            <label>Dispositivo de registro:</label>
            <textarea type="text" class="form-control txa-no-resize" disabled><?= get_agent_current(); ?></textarea>
         </div>
      </div>
      <!-- END field CLIENT REGISTERED USER -->

      <!-- buttons ACTIONS -->
      <div class="col-md-4">
         <button type="submit" class="btn btn-info" id="btn-insert-user"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
         <a href="<?= site_url('users/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
      </div>
      <!-- END buttons ACTIONS -->
   </form>
</div>