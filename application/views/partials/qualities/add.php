<h1 class="page-header">Catálogo de calidades | agregar.</h1>
<div class="row">
   <form action="<?= site_url('qualities/insert/'); ?>" method="post" id="form-insert-quality">
      <!-- field QUALITY NAME -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Nombre:</label>
            <input type="text" id="quality_name_insert" name="quality_name_insert" class="form-control" required minlength="3" maxlength="50" autocomplete="off">
         </div>
      </div>
      <!-- END field QUALITY NAME -->

      <!-- field QUALITY SLUG -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Alias:</label>
            <input type="text" id="quality_slug_insert" name="quality_slug_insert" class="form-control" required minlength="3" maxlength="50" readonly>
         </div>
      </div>
      <!-- END field QUALITY SLUG -->

      <!-- field STATUS NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Estatus:</label>
            <select id="quality_status_insert" name="quality_status_insert" class="form-control" required>
               <?php foreach ($get_all_status->result() as $key => $value) : ?>
                  <option value="<?= $value->id_status; ?>"><?= $value->status_name; ?></option>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field STATUS NAME -->

      <!-- field DATE REGISTERED QUALITY -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Fecha de registro:</label>
            <input type="text" class="form-control" value="<?= get_date_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field DATE REGISTERED QUALITY -->

      <!-- field IP REGISTERED QUALITY -->
      <div class="col-md-4">
         <div class="form-group">
            <label>IP de registro:</label>
            <input type="text" class="form-control" value="<?= get_ip_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field IP REGISTERED QUALITY -->

      <!-- field CLIENT REGISTERED QUALITY -->
      <div class="col-md-12">
         <div class="form-group">
            <label>Dispositivo de registro:</label>
            <textarea type="text" class="form-control txa-no-resize" disabled><?= get_agent_current(); ?></textarea>
         </div>
      </div>
      <!-- END field CLIENT REGISTERED QUALITY -->

      <!-- buttons ACTIONS -->
      <div class="col-md-4">
         <button type="submit" class="btn btn-info" id="btn-insert-quality"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
         <a href="<?= site_url('qualities/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
      </div>
      <!-- END buttons ACTIONS -->
   </form>
</div>