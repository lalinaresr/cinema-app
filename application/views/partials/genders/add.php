<h1 class="page-header">Catálogo de géneros | agregar.</h1>
<div class="row">
   <form action="<?= site_url('genders/store'); ?>" method="post" id="form-insert-gender">
      <!-- field GENDER NAME -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Nombre:</label>
            <input type="text" id="gender_name_insert" name="gender_name_insert" class="form-control" required minlength="3" maxlength="50" autocomplete="off">
         </div>
      </div>
      <!-- END field GENDER NAME -->

      <!-- field GENDER SLUG -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Alias:</label>
            <input type="text" id="gender_slug_insert" name="gender_slug_insert" class="form-control" required minlength="3" maxlength="50" readonly>
         </div>
      </div>
      <!-- END field GENDER SLUG -->

      <!-- field STATUS NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Estatus:</label>
            <select id="gender_status_insert" name="gender_status_insert" class="form-control" required>
               <?php foreach ($status->result_array() as $key => $value) : ?>
                  <option value="<?= $value['id_status']; ?>"><?= $value['status_name']; ?></option>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field STATUS NAME -->

      <!-- field DATE REGISTERED GENDER -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Fecha de registro:</label>
            <input type="text" class="form-control" value="<?= get_date_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field DATE REGISTERED GENDER -->

      <!-- field IP REGISTERED GENDER -->
      <div class="col-md-4">
         <div class="form-group">
            <label>IP de registro:</label>
            <input type="text" class="form-control" value="<?= get_ip_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field IP REGISTERED GENDER -->

      <!-- field CLIENT REGISTERED GENDER -->
      <div class="col-md-12">
         <div class="form-group">
            <label>Dispositivo de registro:</label>
            <textarea type="text" class="form-control " disabled><?= get_agent_current(); ?></textarea>
         </div>
      </div>
      <!-- END field CLIENT REGISTERED GENDER -->

      <!-- buttons ACTIONS -->
      <div class="col-md-4">
         <button type="submit" class="btn btn-info" id="btn-insert-gender"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
         <a href="<?= site_url('genders/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
      </div>
      <!-- END buttons ACTIONS -->
   </form>
</div>