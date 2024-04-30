<h1 class="page-header">Catálogo de productores | editar.</h1>
<div class="row">
   <form action="<?= site_url('productors/update/'); ?>" method="post" id="form-update-productor" enctype="multipart/form-data">
      <!-- field ID PRODUCTOR -->
      <div class="col-md-12">
         <div class="form-group">
            <label>ID:</label>
            <input type="text" class="form-control" value="<?= $productor_id_encrypt; ?>" disabled>
            <input type="hidden" id="id_productor_update" name="id_productor_update" class="form-control" value="<?= $productor_id_encrypt; ?>">
         </div>
      </div>
      <!-- field ID PRODUCTOR -->

      <!-- field PRODUCTOR NAME -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Nombre:</label>
            <input type="text" id="productor_name_update" name="productor_name_update" class="form-control" value="<?= $productor['productor_name']; ?>" required minlength="3" maxlength="60" autocomplete="off">
         </div>
      </div>
      <!-- END field PRODUCTOR NAME -->

      <!-- field PRODUCTOR SLUG -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Alias:</label>
            <input type="text" id="productor_slug_update" name="productor_slug_update" class="form-control" value="<?= $productor['productor_slug']; ?>" readonly>
         </div>
      </div>
      <!-- END field PRODUCTOR SLUG -->

      <!-- field PRODUCTOR IMAGE LOGO -->
      <div class="col-md-8">
         <div class="form-group">
            <label>Logo:</label>
            <input type="file" id="productor_image_logo_update" name="productor_image_logo_update" class="form-control">
            <input type="hidden" id="image_logo_update_route" name="image_logo_update_route" class="form-control" value="<?= $productor['productor_image_logo']; ?>" readonly>
         </div>
      </div>

      <div class="modal fade" id="modal-productor-image-logo">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header bg-black">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title text-white text-center">Preview New Image Logo</h4>
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
            <select id="productor_status_update" name="productor_status_update" class="form-control" required>
               <option value="<?= $productor['id_status']; ?>"><?= $productor['status_name']; ?></option>
               <?php foreach ($status->result_array() as $key => $value) : ?>
                  <?php if ($value['id_status'] != $productor['id_status']) : ?>
                     <option value="<?= $value['id_status']; ?>"><?= $value['status_name']; ?></option>
                  <?php endif ?>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field STATUS NAME -->

      <!-- field DATE MODIFIED PRODUCTOR -->
      <div class="col-md-8">
         <div class="form-group">
            <label>Fecha de modificación:</label>
            <input type="text" class="form-control" value="<?= get_date_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field DATE MODIFIED PRODUCTOR -->

      <!-- field IP MODIFIED PRODUCTOR -->
      <div class="col-md-4">
         <div class="form-group">
            <label>IP de modificación:</label>
            <input type="text" class="form-control" value="<?= get_ip_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field IP MODIFIED PRODUCTOR -->

      <!-- field CLIENT MODIFIED PRODUCTOR -->
      <div class="col-md-12">
         <div class="form-group">
            <label>Dispositivo de modificación:</label>
            <textarea type="text" class="form-control " disabled><?= get_agent_current(); ?></textarea>
         </div>
      </div>
      <!-- END field CLIENT MODIFIED PRODUCTOR -->

      <!-- buttons ACTIONS -->
      <div class="col-md-4">
         <button type="submit" class="btn btn-info" id="btn-update-productor"><span class="glyphicon glyphicon-refresh"></span> Actualizar</button>
         <a href="<?= site_url('productors/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
      </div>
      <!-- END buttons ACTIONS -->
   </form>
</div>