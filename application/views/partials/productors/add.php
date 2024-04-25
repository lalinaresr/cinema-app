<h1 class="page-header">Catálogo de productores | agregar.</h1>
<div class="row">
   <form action="<?= site_url('productors/store'); ?>" method="post" id="form-insert-productor" enctype="multipart/form-data">
      <!-- field PRODUCTOR NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Nombre:</label>
            <input type="text" id="productor_name_insert" name="productor_name_insert" class="form-control" required minlength="3" maxlength="60" autocomplete="off">
         </div>
      </div>
      <!-- END field PRODUCTOR NAME -->

      <!-- field PRODUCTOR SLUG -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Alias:</label>
            <input type="text" id="productor_slug_insert" name="productor_slug_insert" class="form-control" readonly>
         </div>
      </div>
      <!-- END field PRODUCTOR SLUG -->

      <!-- field PRODUCTOR IMAGE LOGO -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Logo:</label>
            <input type="file" id="productor_image_logo_insert" name="productor_image_logo_insert" class="form-control" required>
         </div>
      </div>

      <div class="modal fade" id="modal-productor-image-logo">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header bg-black">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title text-white text-center">Ver logo</h4>
               </div>
               <div class="modal-body">
                  <img id="preview-img-logo" class="img-responsive img-rounded" style="width: 100%; height: 350px;">
               </div>
               <div class="modal-footer bg-black">
                  <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn-usage-image-logo"><span class="glyphicon glyphicon-picture"></span> Usar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
               </div>
            </div>
         </div>
      </div>
      <!-- END field PRODUCTOR IMAGE LOGO -->

      <!-- field STATUS NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Estatus:</label>
            <select id="productor_status_insert" name="productor_status_insert" class="form-control" required>
               <?php foreach ($get_all_status->result() as $key => $value) : ?>
                  <option value="<?= $value->id_status; ?>"><?= $value->status_name; ?></option>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field STATUS NAME -->

      <!-- field DATE REGISTERED PRODUCTOR -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Fecha de registro:</label>
            <input type="text" class="form-control" value="<?= get_date_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field DATE REGISTERED PRODUCTOR -->

      <!-- field IP REGISTERED PRODUCTOR -->
      <div class="col-md-4">
         <div class="form-group">
            <label>IP de registro:</label>
            <input type="text" class="form-control" value="<?= get_ip_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field IP REGISTERED PRODUCTOR -->

      <!-- field CLIENT REGISTERED PRODUCTOR -->
      <div class="col-md-12">
         <div class="form-group">
            <label>Dispositivo de registro:</label>
            <textarea type="text" class="form-control " disabled><?= get_agent_current(); ?></textarea>
         </div>
      </div>
      <!-- END field CLIENT REGISTERED PRODUCTOR -->

      <!-- buttons ACTIONS -->
      <div class="col-md-4">
         <button type="submit" class="btn btn-info" id="btn-insert-productor"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
         <a href="<?= site_url('productors/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
      </div>
      <!-- END buttons ACTIONS -->
   </form>
</div>