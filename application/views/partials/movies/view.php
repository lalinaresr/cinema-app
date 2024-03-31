<h1 class="page-header">Movies Management | View.</h1>
<div class="row">
   <!-- field PRODUCTORS MOVIE -->
   <div class="col-md-4">
      <div class="form-group">
         <?php if ($productors_movie != FALSE) : ?>
            <a class="btn btn-info btn-block" data-toggle="modal" href='#modal-productors-movie'>Productors</a>
         <?php else : ?>
            <a class="btn btn-danger btn-block not-active"><span class="glyphicon glyphicon-remove-sign"></span> No producers found for this movie</a>
         <?php endif ?>
      </div>
   </div>
   <div class="modal fade" id="modal-productors-movie">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-black">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title text-center tx-white">Productors of Movie</h4>
            </div>
            <div class="modal-body">
               <?php foreach ($productors_movie as $key => $value) : ?>
                  <a href="<?= site_url('productors/view/') . cryp($value->id_productor) . '/'; ?>" class="btn btn-info mb-5"><?= $value->productor_name; ?></a>
               <?php endforeach ?>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Close</button>
            </div>
         </div>
      </div>
   </div>
   <!-- END field PRODUCTORS MOVIE -->

   <!-- field GENDERS MOVIE -->
   <div class="col-md-4">
      <div class="form-group">
         <?php if ($genders_movie != FALSE) : ?>
            <a class="btn btn-info btn-block" data-toggle="modal" href='#modal-genders-movie'>Genders</a>
         <?php else : ?>
            <a class="btn btn-danger btn-block not-active"><span class="glyphicon glyphicon-remove-sign"></span> No genders found for this movie</a>
         <?php endif ?>
      </div>
   </div>
   <div class="modal fade" id="modal-genders-movie">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-black">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title text-center tx-white">Genders of Movie</h4>
            </div>
            <div class="modal-body">
               <?php foreach ($genders_movie as $key => $value) : ?>
                  <a href="<?= site_url('genders/view/') . cryp($value->id_gender) . '/'; ?>" class="btn btn-info mb-5"><?= $value->gender_name; ?></a>
               <?php endforeach ?>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Close</button>
            </div>
         </div>
      </div>
   </div>
   <!-- END field GENDERS MOVIE -->

   <!-- field CATEGORYS MOVIE -->
   <div class="col-md-4">
      <div class="form-group">
         <?php if ($categorys_movie != FALSE) : ?>
            <a class="btn btn-info btn-block" data-toggle="modal" href='#modal-categorys-movie'>Categorys</a>
         <?php else : ?>
            <a class="btn btn-danger btn-block not-active"><span class="glyphicon glyphicon-remove-sign"></span> No categorys found for this movie</a>
         <?php endif ?>
      </div>
   </div>
   <div class="modal fade" id="modal-categorys-movie">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-black">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title text-center tx-white">Categorys of Movie</h4>
            </div>
            <div class="modal-body">
               <?php foreach ($categorys_movie as $key => $value) : ?>
                  <a href="<?= site_url('categorys/view/') . cryp($value->id_category) . '/'; ?>" class="btn btn-info mb-5"><?= $value->category_name; ?></a>
               <?php endforeach ?>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Close</button>
            </div>
         </div>
      </div>
   </div>
   <!-- END field CATEGORYS MOVIE -->


   <!-- field STATUS NAME -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Status:</label>
         <input type="text" class="form-control" value="<?= $view_movie->status_name; ?>" disabled>
      </div>
   </div>
   <!-- END field STATUS NAME -->

   <!-- field MOVIE NAME -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Movies Name:</label>
         <input type="text" class="form-control" value="<?= $view_movie->movie_name; ?>" disabled>
      </div>
   </div>
   <!-- END field MOVIE NAME -->

   <!-- field MOVIE SLUG -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Movies Slug:</label>
         <input type="text" class="form-control" value="<?= $view_movie->movie_slug; ?>" disabled>
      </div>
   </div>
   <!-- END field MOVIE SLUG -->

   <!-- field QUALITY NAME -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Quality:</label>
         <input type="text" class="form-control" value="<?= $view_movie->quality_name; ?>" disabled>
      </div>
   </div>
   <!-- END field QUALITY NAME -->

   <!-- field MOVIE RELEASE DATE -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Movie Release Date:</label>
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
         <label>Movie Duration:</label>
         <input type="text" class="form-control" value="<?= $view_movie->movie_duration; ?>" disabled>
      </div>
   </div>
   <!-- END field MOVIE DURATION -->

   <!-- field MOVIE COUNTRY ORIGIN -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Movie Country Origin:</label>
         <input type="text" class="form-control" value="<?= $view_movie->movie_country_origin; ?>" disabled>
      </div>
   </div>
   <!-- END field MOVIE COUNTRY ORIGIN -->

   <!-- field MOVIE COVER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Movie Cover:</label>
         <a href='#modal-view-image-cover-<?= $id_movie_encryp; ?>' class="btn btn-info btn-block" data-toggle="modal"><span class="glyphicon glyphicon-picture"></span> View Cover</a>
         <!-- This is the modal that shows the cover of the movies. -->
         <div class="modal fade" id="modal-view-image-cover-<?= $id_movie_encryp; ?>">
            <div class="modal-dialog modal-sm">
               <div class="modal-content">
                  <div class="modal-header bg-black">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title text-center tx-white">Movie ID: <?= $id_movie_encryp; ?></h4>
                  </div>
                  <div class="modal-body">
                     <?php if (strcmp($view_movie->movie_cover, 'NO-IMAGE') == 0) : ?>
                        <img src="<?= encryp_image_base64(base_url() . 'assets/images/productors/default.png'); ?>" class="img-rounded img-responsive" style="width: 100%; height: 100%;">
                     <?php else : ?>
                        <img src="<?= encryp_image_base64(base_url() . $view_movie->movie_cover); ?>" class="img-rounded img-responsive" style="width: 100%; height: 100%;">
                     <?php endif ?>
                  </div>
                  <div class="modal-footer bg-black">
                     <a href="<?= site_url('movies/edit_cover/') . $id_movie_encryp . '/'; ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Edit Cover</a>
                     <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Close</button>
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
         <label>Movie Reproductions:</label>
         <input type="text" class="form-control" value="<?= $view_movie->movie_reproductions; ?>" disabled>
      </div>
   </div>
   <!-- END field MOVIE REPRODUCTIONS -->

   <!-- field MOVIE PLAY -->
   <div class="col-md-12">
      <div class="form-group">
         <label>Movie Play:</label>
         <input type="text" class="form-control" value="<?= $view_movie->movie_play; ?>" disabled>
      </div>
   </div>
   <!-- END field MOVIE PLAY -->

   <!-- field MOVIE DESCRIPTION -->
   <div class="col-md-12">
      <div class="form-group">
         <label>Movie Description:</label>
         <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_movie->movie_description; ?></textarea>
      </div>
   </div>
   <!-- END field MOVIE DESCRIPTION -->


   <!-- field DATE REGISTERED MOVIE -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Date Registered:</label>
         <input type="text" class="form-control" value="<?= $view_movie->date_registered_mov; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE REGISTERED MOVIE -->

   <!-- field IP REGISTERED MOVIE -->
   <div class="col-md-6">
      <div class="form-group">
         <label>IP Registered:</label>
         <input type="text" class="form-control" value="<?= $view_movie->ip_registered_mov; ?>" disabled>
      </div>
   </div>
   <!-- END field IP REGISTERED MOVIE -->

   <!-- field CLIENT REGISTERED MOVIE -->
   <div class="col-md-12">
      <div class="form-group">
         <label>Client Registered:</label>
         <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_movie->client_registered_mov; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT REGISTERED MOVIE -->

   <!-- field DATE MODIFIED MOVIE -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Date Modified:</label>
         <input type="text" class="form-control" value="<?= $view_movie->date_modified_mov; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE MODIFIED MOVIE -->

   <!-- field IP MODIFIED MOVIE -->
   <div class="col-md-6">
      <div class="form-group">
         <label>IP Modified:</label>
         <input type="text" class="form-control" value="<?= $view_movie->ip_modified_mov; ?>" disabled>
      </div>
   </div>
   <!-- END field IP MODIFIED MOVIE -->

   <!-- field CLIENT MODIFIED MOVIE -->
   <div class="col-md-12">
      <div class="form-group">
         <label>Client Modified:</label>
         <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_movie->client_modified_mov; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT MODIFIED MOVIE -->

   <!-- button RETURN -->
   <div class="col-md-4">
      <a href="<?= site_url('movies/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancel</a>
   </div>
   <!-- END button RETURN -->
</div>