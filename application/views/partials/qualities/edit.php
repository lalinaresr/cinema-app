<h1 class="page-header">Catálogo de calidades | editar.</h1>
<div class="row">
   <form action="<?= site_url('qualities/update/'); ?>" method="post" id="form-update-quality">
      <!-- field ID QUALITY -->
      <div class="col-md-12">
         <div class="form-group">
            <label>ID:</label>
            <input type="text" class="form-control" value="<?= $id_quality_encryp; ?>" disabled>
            <input type="hidden" id="id_quality_update" name="id_quality_update" class="form-control" value="<?= $id_quality_encryp; ?>">
         </div>
      </div>
      <!-- field ID QUALITY -->

      <!-- field QUALITY NAME -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Nombre:</label>
            <input type="text" id="quality_name_update" name="quality_name_update" class="form-control" value="<?= $edit_quality->quality_name; ?>" required minlength="3" maxlength="50" autocomplete="off">
         </div>
      </div>
      <!-- END field QUALITY NAME -->

      <!-- field QUALITY SLUG -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Alias:</label>
            <input type="text" id="quality_slug_update" name="quality_slug_update" class="form-control" value="<?= $edit_quality->quality_slug; ?>" required minlength="3" maxlength="50" readonly>
         </div>
      </div>
      <!-- END field QUALITY SLUG -->

      <!-- field STATUS NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Estatus:</label>
            <select id="quality_status_update" name="quality_status_update" class="form-control" required>
               <option value="<?= $edit_quality->id_status; ?>"><?= $edit_quality->status_name; ?></option>
               <?php foreach ($get_all_status->result() as $key => $value) : ?>
                  <?php if ($value->id_status != $edit_quality->id_status) : ?>
                     <option value="<?= $value->id_status; ?>"><?= $value->status_name; ?></option>
                  <?php endif ?>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field STATUS NAME -->

      <!-- field DATE MODIFIED QUALITY -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Fecha de modificación:</label>
            <input type="text" class="form-control" value="<?= get_date_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field DATE MODIFIED QUALITY -->

      <!-- field IP MODIFIED QUALITY -->
      <div class="col-md-4">
         <div class="form-group">
            <label>IP de modificación:</label>
            <input type="text" class="form-control" value="<?= get_ip_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field IP MODIFIED QUALITY -->

      <!-- field CLIENT MODIFIED QUALITY -->
      <div class="col-md-12">
         <div class="form-group">
            <label>Dispositivo de modificación:</label>
            <textarea type="text" class="form-control txa-no-resize" disabled><?= get_agent_current(); ?></textarea>
         </div>
      </div>
      <!-- END field CLIENT MODIFIED QUALITY -->

      <!-- buttons ACTIONS -->
      <div class="col-md-4">
         <button type="submit" class="btn btn-info" id="btn-update-quality"><span class="glyphicon glyphicon-refresh"></span> Actualizar</button>
         <a href="<?= site_url('qualities/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
      </div>
      <!-- END buttons ACTIONS -->
   </form>
</div>