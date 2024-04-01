<h1 class="page-header">Catálogo de películas | editar portada.</h1>
<div class="row">
   <form action="<?= site_url('movies/update_cover/'); ?>" method="post" id="form-update-cover" enctype="multipart/form-data">
      <div class="col-md-12">
         <input type="hidden" id="id_movie_customize_cover" name="id_movie_customize_cover" class="form-control" value="<?= $id_movie_encryp; ?>">
         <input type="hidden" id="cover_update_route" name="cover_update_route" class="form-control" value="<?= $view_movie->movie_cover; ?>">
         <!-- field MOVIE COVER -->
         <div class="form-group">
            <label>Portada:</label>
            <input type="file" id="movie_cover_customize" name="movie_cover_customize" class="form-control" required>
         </div>
         <!-- END field MOVIE COVER -->
         <div class="form-group">
            <?php if (strcmp($view_movie->movie_cover, 'NO-IMAGE') == 0) : ?>
               <img src="<?= encryp_image_base64(base_url() . 'assets/images/movies/default.png'); ?>" class="img-rounded img-responsive" id="image-cover-current" style="width: 100%;">
            <?php else : ?>
               <img src="<?= encryp_image_base64(base_url() . $view_movie->movie_cover); ?>" class="img-rounded img-responsive" id="image-cover-current" style="width: 100%;">
            <?php endif ?>
            <img id="preview-img-cover" class="img-responsive img-rounded img-thumbnail" style="width: 100%;">
         </div>
      </div>

      <div class="col-md-6">
         <div class="form-group">
            <label>Nombre de la imagen:</label>
            <input type="text" id="file_name_cover_customize" name="file_name_cover_customize" class="form-control" disabled>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label>Tamaño de la imagen:</label>
            <input type="text" id="file_size_cover_customize" name="file_size_cover_customize" class="form-control" disabled>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label>Extensión de la imagen:</label>
            <input type="text" id="file_extension_cover_customize" name="file_extension_cover_customize" class="form-control" disabled>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label>Ruta de almacenamiento:</label>
            <input type="text" id="file_route_cover_customize" name="file_route_cover_customize" class="form-control" disabled>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label>IP de la subida:</label>
            <input type="text" id="file_ip_upload_cover_customize" name="file_ip_upload_cover_customize" class="form-control" value="<?= get_ip_current(); ?>" disabled>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label>Fecha de la subida:</label>
            <input type="text" id="file_date_upload_cover_customize" name="file_date_upload_cover_customize" class="form-control" value="<?= get_date_current(); ?>" disabled>
         </div>
      </div>
      <div class="col-md-12">
         <div class="form-group">
            <label>Dispositivo de la subida:</label>
            <textarea id="file_client_upload_cover_customize" name="file_client_upload_cover_customize" class="form-control txa-no-resize" disabled><?= get_agent_current(); ?></textarea>
         </div>
      </div>

      <!-- buttons ACTIONS -->
      <div class="col-md-4">
         <button type="submit" class="btn btn-info" id="btn-update-cover"><span class="glyphicon glyphicon-upload"></span> Cambiar</button>
         <a href="<?= site_url('movies/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
      </div>
      <!-- END buttons ACTIONS -->
   </form>
</div>