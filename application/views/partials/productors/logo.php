<h1 class="page-header">Catálogo de productores | editar logo.</h1>
<div class="row">
   <form action="<?= site_url('productors/update_logo/'); ?>" method="post" id="form-update-logo" enctype="multipart/form-data">
      <div class="col-md-12">
         <input type="hidden" id="id_productor_customize_logo" name="id_productor_customize_logo" class="form-control" value="<?= $id_productor_encryp; ?>">
         <input type="hidden" id="image_logo_update_route" name="image_logo_update_route" class="form-control" value="<?= $view_productor->productor_image_logo; ?>">
         <!-- field PRODUCTOR IMAGE LOGO -->
         <div class="form-group">
            <label>Logo:</label>
            <input type="file" id="productor_image_logo_customize" name="productor_image_logo_customize" class="form-control" required>
         </div>
         <!-- END field PRODUCTOR IMAGE LOGO -->
         <div class="form-group">
            <?php if (strcmp($view_productor->productor_image_logo, 'NO-IMAGE') == 0) : ?>
               <img src="<?= encryp_image_base64(base_url() . 'assets/images/productors/default.png'); ?>" class="img-rounded img-responsive" id="image-logo-current" style="width: 100%;">
            <?php else : ?>
               <img src="<?= encryp_image_base64(base_url() . $view_productor->productor_image_logo); ?>" class="img-rounded img-responsive" id="image-logo-current" style="width: 100%;">
            <?php endif ?>
            <img id="preview-img-logo" class="img-responsive img-rounded img-thumbnail" style="width: 100%;">
         </div>
      </div>

      <div class="col-md-6">
         <div class="form-group">
            <label>Nombre de la imagen:</label>
            <input type="text" id="file_name_logo_customize" name="file_name_logo_customize" class="form-control" disabled>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label>Tamaño de la imagen:</label>
            <input type="text" id="file_size_logo_customize" name="file_size_logo_customize" class="form-control" disabled>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label>Extensión de la imagen:</label>
            <input type="text" id="file_extension_logo_customize" name="file_extension_logo_customize" class="form-control" disabled>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label>Ruta de almacenamiento:</label>
            <input type="text" id="file_route_logo_customize" name="file_route_logo_customize" class="form-control" disabled>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label>IP de la subida:</label>
            <input type="text" id="file_ip_upload_logo_customize" name="file_ip_upload_logo_customize" class="form-control" value="<?= get_ip_current(); ?>" disabled>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label>Fecha de la subida:</label>
            <input type="text" id="file_date_upload_logo_customize" name="file_date_upload_logo_customize" class="form-control" value="<?= get_date_current(); ?>" disabled>
         </div>
      </div>
      <div class="col-md-12">
         <div class="form-group">
            <label>Dispositivo de la subida:</label>
            <textarea id="file_client_upload_logo_customize" name="file_client_upload_logo_customize" class="form-control txa-no-resize" disabled><?= get_agent_current(); ?></textarea>
         </div>
      </div>

      <!-- buttons ACTIONS -->
      <div class="col-md-4">
         <button type="submit" class="btn btn-info" id="btn-update-logo"><span class="glyphicon glyphicon-upload"></span> Cambiar</button>
         <a href="<?= site_url('productors/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
      </div>
      <!-- END buttons ACTIONS -->
   </form>
</div>