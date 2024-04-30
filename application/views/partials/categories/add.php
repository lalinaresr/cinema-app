<h1 class="page-header">Catálogo de categorías | agregar.</h1>
<div class="row">
   <form action="<?= site_url('categories/store'); ?>" method="post" id="form-insert-category">
      <!-- field CATEGORY NAME -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Nombre:</label>
            <input type="text" id="category_name_insert" name="category_name_insert" class="form-control" required minlength="3" maxlength="50" autocomplete="off">
         </div>
      </div>
      <!-- END field CATEGORY NAME -->

      <!-- field CATEGORY SLUG -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Alias:</label>
            <input type="text" id="category_slug_insert" name="category_slug_insert" class="form-control" required minlength="3" maxlength="50" readonly>
         </div>
      </div>
      <!-- END field CATEGORY SLUG -->

      <!-- field STATUS NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Estatus:</label>
            <select id="category_status_insert" name="category_status_insert" class="form-control" required>
               <?php foreach ($status->result_array() as $key => $value) : ?>
                  <option value="<?= $value['id_status']; ?>"><?= $value['status_name']; ?></option>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field STATUS NAME -->

      <!-- field DATE REGISTERED CATEGORY -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Fecha de registro:</label>
            <input type="text" class="form-control" value="<?= get_date_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field DATE REGISTERED CATEGORY -->

      <!-- field IP REGISTERED CATEGORY -->
      <div class="col-md-4">
         <div class="form-group">
            <label>IP de registro:</label>
            <input type="text" class="form-control" value="<?= get_ip_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field IP REGISTERED CATEGORY -->

      <!-- field CLIENT REGISTERED CATEGORY -->
      <div class="col-md-12">
         <div class="form-group">
            <label>Dispositivo de registro:</label>
            <textarea type="text" class="form-control " disabled><?= get_agent_current(); ?></textarea>
         </div>
      </div>
      <!-- END field CLIENT REGISTERED CATEGORY -->

      <!-- buttons ACTIONS -->
      <div class="col-md-4">
         <button type="submit" class="btn btn-info" id="btn-insert-category"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
         <a href="<?= site_url('categories/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
      </div>
      <!-- END buttons ACTIONS -->
   </form>
</div>