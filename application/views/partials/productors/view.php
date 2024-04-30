<h1 class="page-header">Catálogo de productores | ver a detalle.</h1>
<div class="row">
   <!-- field PRODUCTOR NAME -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Nombre:</label>
         <input type="text" class="form-control" value="<?= $productor['productor_name']; ?>" disabled>
      </div>
   </div>
   <!-- END field PRODUCTOR NAME -->

   <!-- field PRODUCTOR SLUG -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Alias:</label>
         <input type="text" class="form-control" value="<?= $productor['productor_slug']; ?>" disabled>
      </div>
   </div>
   <!-- END field PRODUCTOR SLUG -->

   <!-- field IMAGE LOGO -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Logo:</label>
         <a href='#modal-view-logo-productor-<?= $productor_id_encrypt; ?>' class="btn btn-info btn-block" data-toggle="modal"><span class="glyphicon glyphicon-picture"></span> Ver imagen</a>
         <!-- This is the modal that shows the image logo of the productors. -->
         <div class="modal fade" id="modal-view-logo-productor-<?= $productor_id_encrypt; ?>">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header bg-black">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title text-center text-white">Productor #<?= $productor_id_encrypt; ?></h4>
                  </div>
                  <div class="modal-body">
                     <?php if (strcmp($productor['productor_image_logo'], 'NO-IMAGE') == 0) : ?>
                        <img src="<?= base_url(FOLDER_PRODUCTORS . '/default.png'); ?>" class="img-rounded img-responsive" style="width: 100%; height: 100%;">
                     <?php else : ?>
                        <img src="<?= base_url($productor['productor_image_logo']); ?>" class="img-rounded img-responsive" style="width: 100%; height: 100%;">
                     <?php endif ?>
                  </div>
                  <div class="modal-footer bg-black">
                     <a href="<?= site_url('productors/edit_logo/') . $productor_id_encrypt . '/'; ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Editar logo</a>
                     <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- END This is the modal that shows the image logo of the productors. -->
      </div>
   </div>
   <!-- END field IMAGE LOGO -->

   <!-- field STATUS NAME -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Estatus:</label>
         <input type="text" class="form-control" value="<?= $productor['status_name']; ?>" disabled>
      </div>
   </div>
   <!-- END field STATUS NAME -->

   <!-- field DATE REGISTERED PRODUCTOR -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Fecha de registro:</label>
         <input type="text" class="form-control" value="<?= $productor['date_registered_pro']; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE REGISTERED PRODUCTOR -->

   <!-- field IP REGISTERED PRODUCTOR -->
   <div class="col-md-4">
      <div class="form-group">
         <label>IP de registro:</label>
         <input type="text" class="form-control" value="<?= $productor['ip_registered_pro']; ?>" disabled>
      </div>
   </div>
   <!-- END field IP REGISTERED PRODUCTOR -->

   <!-- field DATE MODIFIED PRODUCTOR -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Fecha de modificación:</label>
         <input type="text" class="form-control" value="<?= $productor['date_modified_pro']; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE MODIFIED PRODUCTOR -->

   <!-- field IP MODIFIED PRODUCTOR -->
   <div class="col-md-4">
      <div class="form-group">
         <label>IP de modificación:</label>
         <input type="text" class="form-control" value="<?= $productor['ip_modified_pro']; ?>" disabled>
      </div>
   </div>
   <!-- END field IP MODIFIED PRODUCTOR -->

   <!-- field CLIENT REGISTERED PRODUCTOR -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Dispositivo de registro:</label>
         <textarea type="text" class="form-control " disabled><?= $productor['client_registered_pro']; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT REGISTERED PRODUCTOR -->

   <!-- field CLIENT MODIFIED PRODUCTOR -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Dispositivo de modificación:</label>
         <textarea type="text" class="form-control " disabled><?= $productor['client_modified_pro']; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT MODIFIED PRODUCTOR -->

   <!-- buttons RETURN -->
   <div class="col-md-4">
      <a href="<?= site_url('productors/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
   </div>
   <!-- END buttons RETURN -->
</div>