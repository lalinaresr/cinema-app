<h1 class="page-header">Catálogo de categorías | editar.</h1>
<div class="row">
   <form action="<?= site_url('categorys/update/'); ?>" method="post" id="form-update-category">
      <!-- field ID CATEGORY -->
      <div class="col-md-12">
         <div class="form-group">
            <label>ID:</label>
            <input type="text" class="form-control" value="<?= $id_category_encryp; ?>" disabled>
            <input type="hidden" id="id_category_update" name="id_category_update" class="form-control" value="<?= $id_category_encryp; ?>">
         </div>
      </div>
      <!-- field ID CATEGORY -->

      <!-- field CATEGORY NAME -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Nombre:</label>
            <input type="text" id="category_name_update" name="category_name_update" class="form-control" value="<?= $edit_category->category_name; ?>" required minlength="3" maxlength="50" autocomplete="off">
         </div>
      </div>
      <!-- END field CATEGORY NAME -->

      <!-- field CATEGORY SLUG -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Alias:</label>
            <input type="text" id="category_slug_update" name="category_slug_update" class="form-control" value="<?= $edit_category->category_slug; ?>" required minlength="3" maxlength="50" readonly>
         </div>
      </div>
      <!-- END field CATEGORY SLUG -->

      <!-- field STATUS NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Estatus:</label>
            <select id="category_status_update" name="category_status_update" class="form-control" required>
               <option value="<?= $edit_category->id_status; ?>"><?= $edit_category->status_name; ?></option>
               <?php foreach ($get_all_status->result() as $key => $value) : ?>
                  <?php if ($value->id_status != $edit_category->id_status) : ?>
                     <option value="<?= $value->id_status; ?>"><?= $value->status_name; ?></option>
                  <?php endif ?>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field STATUS NAME -->

      <!-- field DATE MODIFIED CATEGORY -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Fecha de modificación:</label>
            <input type="text" class="form-control" value="<?= get_date_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field DATE MODIFIED CATEGORY -->

      <!-- field IP MODIFIED CATEGORY -->
      <div class="col-md-4">
         <div class="form-group">
            <label>IP de modificación:</label>
            <input type="text" class="form-control" value="<?= get_ip_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field IP MODIFIED CATEGORY -->

      <!-- field CLIENT MODIFIED CATEGORY -->
      <div class="col-md-12">
         <div class="form-group">
            <label>Dispositivo de modificación:</label>
            <textarea type="text" class="form-control txa-no-resize" disabled><?= get_agent_current(); ?></textarea>
         </div>
      </div>
      <!-- END field CLIENT MODIFIED CATEGORY -->

      <!-- buttons ACTIONS -->
      <div class="col-md-4">
         <button type="submit" class="btn btn-info" id="btn-update-category"><span class="glyphicon glyphicon-refresh"></span> Actualizar</button>
         <a href="<?= site_url('categorys/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
      </div>
      <!-- END buttons ACTIONS -->
   </form>
</div>