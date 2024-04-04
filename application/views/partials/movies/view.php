<h1 class="page-header">Catálogo de películas | ver a detalle.</h1>
<div class="row">
   <!-- field PRODUCTORS MOVIE -->
   <div class="col-md-4">
      <div class="form-group">
         <?php if ($productors_movie != FALSE) : ?>
            <a class="btn btn-info btn-block" data-toggle="modal" href='#modal-productors-movie'>Productores</a>
         <?php else : ?>
            <a class="btn btn-danger btn-block not-active"><span class="glyphicon glyphicon-remove-sign"></span> No hay productores asignados a esta película.</a>
         <?php endif ?>
      </div>
   </div>
   <div class="modal fade" id="modal-productors-movie">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-black">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title text-center tx-white">Productores</h4>
            </div>
            <div class="modal-body">
               <?php foreach ($productors_movie as $key => $value) : ?>
                  <a href="<?= site_url('productors/view/') . cryp($value->id_productor) . '/'; ?>" class="btn btn-info mb-5"><?= $value->productor_name; ?></a>
               <?php endforeach ?>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
            </div>
         </div>
      </div>
   </div>
   <!-- END field PRODUCTORS MOVIE -->

   <!-- field GENDERS MOVIE -->
   <div class="col-md-4">
      <div class="form-group">
         <?php if ($genders_movie != FALSE) : ?>
            <a class="btn btn-info btn-block" data-toggle="modal" href='#modal-genders-movie'>Géneros</a>
         <?php else : ?>
            <a class="btn btn-danger btn-block not-active"><span class="glyphicon glyphicon-remove-sign"></span> No hay géneros asignados a esta película.</a>
         <?php endif ?>
      </div>
   </div>
   <div class="modal fade" id="modal-genders-movie">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-black">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title text-center tx-white">Géneros</h4>
            </div>
            <div class="modal-body">
               <?php foreach ($genders_movie as $key => $value) : ?>
                  <a href="<?= site_url('genders/view/') . cryp($value->id_gender) . '/'; ?>" class="btn btn-info mb-5"><?= $value->gender_name; ?></a>
               <?php endforeach ?>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
            </div>
         </div>
      </div>
   </div>
   <!-- END field GENDERS MOVIE -->

   <!-- field CATEGORYS MOVIE -->
   <div class="col-md-4">
      <div class="form-group">
         <?php if ($categories_movie != FALSE) : ?>
            <a class="btn btn-info btn-block" data-toggle="modal" href='#modal-categories-movie'>Categorías</a>
         <?php else : ?>
            <a class="btn btn-danger btn-block not-active"><span class="glyphicon glyphicon-remove-sign"></span> No hay categorías asignadas a esta película.</a>
         <?php endif ?>
      </div>
   </div>
   <div class="modal fade" id="modal-categories-movie">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-black">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title text-center tx-white">Categorías</h4>
            </div>
            <div class="modal-body">
               <?php foreach ($categories_movie as $key => $value) : ?>
                  <a href="<?= site_url('categories/view/') . cryp($value->id_category) . '/'; ?>" class="btn btn-info mb-5"><?= $value->category_name; ?></a>
               <?php endforeach ?>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
            </div>
         </div>
      </div>
   </div>
   <!-- END field CATEGORYS MOVIE -->


   <!-- field STATUS NAME -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Estatus:</label>
         <input type="text" class="form-control" value="<?= $view_movie->status_name; ?>" disabled>
      </div>
   </div>
   <!-- END field STATUS NAME -->

   <!-- field MOVIE NAME -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Título:</label>
         <input type="text" class="form-control" value="<?= $view_movie->movie_name; ?>" disabled>
      </div>
   </div>
   <!-- END field MOVIE NAME -->

   <!-- field MOVIE SLUG -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Alias:</label>
         <input type="text" class="form-control" value="<?= $view_movie->movie_slug; ?>" disabled>
      </div>
   </div>
   <!-- END field MOVIE SLUG -->

   <!-- field QUALITY NAME -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Calidad:</label>
         <input type="text" class="form-control" value="<?= $view_movie->quality_name; ?>" disabled>
      </div>
   </div>
   <!-- END field QUALITY NAME -->

   <!-- field MOVIE RELEASE DATE -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Fecha de lanzamiento:</label>
         <div class="input-group">
            <input type="text" class="form-control" value="<?= $view_movie->movie_release_date; ?>" disabled>
            <span class="input-group-addon">
               <span class="glyphicon glyphicon-calendar"></span>
            </span>
         </div>
      </div>
   </div>
   <!-- END field MOVIE RELEASE DATE -->

   <!-- field MOVIE DURATION -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Duración:</label>
         <input type="text" class="form-control" value="<?= $view_movie->movie_duration; ?>" disabled>
      </div>
   </div>
   <!-- END field MOVIE DURATION -->

   <!-- field MOVIE COUNTRY ORIGIN -->
   <div class="col-md-4">
      <div class="form-group">
         <label>País de origen:</label>
         <input type="text" class="form-control" value="<?= $view_movie->movie_country_origin; ?>" disabled>
      </div>
   </div>
   <!-- END field MOVIE COUNTRY ORIGIN -->

   <!-- field MOVIE COVER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Portada:</label>
         <a href='#modal-view-image-cover-<?= $id_movie_encryp; ?>' class="btn btn-info btn-block" data-toggle="modal"><span class="glyphicon glyphicon-picture"></span> Ver imagen</a>
         <!-- This is the modal that shows the cover of the movies. -->
         <div class="modal fade" id="modal-view-image-cover-<?= $id_movie_encryp; ?>">
            <div class="modal-dialog modal-sm">
               <div class="modal-content">
                  <div class="modal-header bg-black">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title text-center tx-white">Película #<?= $id_movie_encryp; ?></h4>
                  </div>
                  <div class="modal-body">
                     <?php if (strcmp($view_movie->movie_cover, 'NO-IMAGE') == 0) : ?>
                        <img src="<?= encryp_image_base64(base_url() . 'storage/images/productors/default.png'); ?>" class="img-rounded img-responsive" style="width: 100%; height: 100%;">
                     <?php else : ?>
                        <img src="<?= encryp_image_base64(base_url() . $view_movie->movie_cover); ?>" class="img-rounded img-responsive" style="width: 100%; height: 100%;">
                     <?php endif ?>
                  </div>
                  <div class="modal-footer bg-black">
                     <a href="<?= site_url('movies/edit_cover/') . $id_movie_encryp . '/'; ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Editar portada</a>
                     <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- END This is the modal that shows the cover of the movies. -->
      </div>
   </div>
   <!-- END field MOVIE COVER -->

   <!-- field MOVIE REPRODUCTIONS -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Reproducciones:</label>
         <input type="text" class="form-control" value="<?= $view_movie->movie_reproductions; ?>" disabled>
      </div>
   </div>
   <!-- END field MOVIE REPRODUCTIONS -->

   <!-- field MOVIE PLAY -->
   <div class="col-md-12">
      <div class="form-group">
         <label>Enlace:</label>
         <input type="text" class="form-control" value="<?= $view_movie->movie_play; ?>" disabled>
      </div>
   </div>
   <!-- END field MOVIE PLAY -->

   <!-- field MOVIE DESCRIPTION -->
   <div class="col-md-12">
      <div class="form-group">
         <label>Descripción:</label>
         <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_movie->movie_description; ?></textarea>
      </div>
   </div>
   <!-- END field MOVIE DESCRIPTION -->


   <!-- field DATE REGISTERED MOVIE -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Fecha de registro:</label>
         <input type="text" class="form-control" value="<?= $view_movie->date_registered_mov; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE REGISTERED MOVIE -->

   <!-- field IP REGISTERED MOVIE -->
   <div class="col-md-6">
      <div class="form-group">
         <label>IP de registro:</label>
         <input type="text" class="form-control" value="<?= $view_movie->ip_registered_mov; ?>" disabled>
      </div>
   </div>
   <!-- END field IP REGISTERED MOVIE -->

   <!-- field CLIENT REGISTERED MOVIE -->
   <div class="col-md-12">
      <div class="form-group">
         <label>Dispositivo de registro:</label>
         <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_movie->client_registered_mov; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT REGISTERED MOVIE -->

   <!-- field DATE MODIFIED MOVIE -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Fecha de modificación:</label>
         <input type="text" class="form-control" value="<?= $view_movie->date_modified_mov; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE MODIFIED MOVIE -->

   <!-- field IP MODIFIED MOVIE -->
   <div class="col-md-6">
      <div class="form-group">
         <label>IP de modificación:</label>
         <input type="text" class="form-control" value="<?= $view_movie->ip_modified_mov; ?>" disabled>
      </div>
   </div>
   <!-- END field IP MODIFIED MOVIE -->

   <!-- field CLIENT MODIFIED MOVIE -->
   <div class="col-md-12">
      <div class="form-group">
         <label>Dispositivo de modificación:</label>
         <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_movie->client_modified_mov; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT MODIFIED MOVIE -->

   <!-- button RETURN -->
   <div class="col-md-4">
      <a href="<?= site_url('movies/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
   </div>
   <!-- END button RETURN -->
</div>