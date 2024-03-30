      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <h1 class="page-header">Movies Management.</h1>
         <div class="row">
            <div class="col-md-12">
               <?php if ($get_all_movies != FALSE): ?>
                  <div id="buttons-exports-movies">
                     <div class="row" id="row_buttons_movies"></div> 
                     <table class="table table-striped table-hover table-responsive table-bordered table-condensed" id="table-movies">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Movie</th>
                              <th>Cover</th>
                              <th>Reproductions</th>
                              <th>Status</th>
                              <th>Date Registered</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($get_all_movies->result() as $key => $value): $id_movie_encryp = cryp($value->id_movie); ?>
                              <tr class="<?php echo $value->id_status == 1 ? 'success' : 'danger';  ?>" >
                                 <td><a href='#modal-view-movie-<?= $id_movie_encryp; ?>' data-toggle="modal"><?= $id_movie_encryp; ?></a></td>
                                 <td><?= $value->movie_name; ?></td>
                                 <td><a href='#modal-view-cover-movie-<?= $id_movie_encryp; ?>' data-toggle="modal" ><?= $value->id_movie.'_cover'; ?></a></td>
                                 <td><?= $value->movie_reproductions; ?></td>
                                 <td>
                                    <?php if ($value->id_status == 1): ?>
                                       <span class="label label-success">Active</span>
                                    <?php else: ?>
                                       <span class="label label-danger">Inactive</span>                                    
                                    <?php endif ?>
                                 </td>
                                 <td><?= get_antiquity($value->date_registered_mov); ?></td>
                                 <td>
                                    <a href="<?= site_url('movies/watch/') . $id_movie_encryp . '/'; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-play"></span></a>
                                    <a href="<?= site_url('movies/view/') . $id_movie_encryp . '/'; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a href="<?= site_url('movies/edit/') . $id_movie_encryp . '/'; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <button class="btn btn-danger btn-sm btn-delete-movie" id="<?= $id_movie_encryp; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                                 </td>
                              </tr>

                              <!-- This is the modal that shows the cover image of the movie. -->
                              <div class="modal fade" id="modal-view-cover-movie-<?= $id_movie_encryp; ?>">
                                 <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                       <div class="modal-header bg-black">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title text-center tx-white">Movie ID: <?= $id_movie_encryp; ?></h4>
                                       </div>
                                       <div class="modal-body">
                                          <?php if (strcmp($value->movie_cover, 'NO-IMAGE') == 0): ?>
                                             <img src="<?= encryp_image_base64(base_url() . 'assets/images/movies/default.png'); ?>" class="img-rounded img-responsive center-block">
                                          <?php else: ?>
                                             <img src="<?= encryp_image_base64(base_url() . $value->movie_cover); ?>" class="img-rounded img-responsive center-block">
                                          <?php endif ?> 
                                       </div>
                                       <div class="modal-footer bg-black">
                                          <a href="<?= site_url('movies/edit_cover/') . $id_movie_encryp . '/'; ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Edit Cover</a>
                                          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>  
                              <!-- END This is the modal that shows the cover image of the movie. -->
                              

                              <div class="modal fade" id="modal-view-movie-<?= $id_movie_encryp; ?>">
                                 <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                       <div class="modal-header bg-black">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title text-center tx-white">Movie ID: <?= $id_movie_encryp; ?></h4>
                                       </div>
                                       <div class="modal-body">
                                          <div class="row">                                                                          
                                             <!-- field MOVIE NAME -->
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                   <label>Movie Name:</label>
                                                   <input type="text" class="form-control" value="<?= $value->movie_name; ?>" disabled>
                                                </div>
                                             </div>
                                             <!-- END field MOVIE NAME -->

                                             <!-- field MOVIE SLUG -->
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                   <label>Movies Slug:</label>
                                                   <input type="text" class="form-control" value="<?= $value->movie_slug; ?>" disabled>
                                                </div>
                                             </div>
                                             <!-- END field MOVIE SLUG -->  

                                             <!-- field STATUS NAME -->
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                   <label>Status:</label>
                                                   <input type="text" class="form-control" value="<?= $value->status_name; ?>" disabled>
                                                </div>
                                             </div>
                                             <!-- END field STATUS NAME -->             

                                             <!-- field MOVIE RELEASE DATE -->
                                             <div class="col-md-8">
                                                <div class="form-group">
                                                   <label>Movie Release Date:</label>
                                                   <div class="input-group">
                                                      <input type="text" class="form-control" value="<?= $value->movie_release_date; ?>" disabled>
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
                                                   <input type="text" class="form-control" value="<?= $value->movie_duration; ?>" disabled>
                                                </div>
                                             </div>
                                             <!-- END field MOVIE DURATION --> 

                                             <!-- field MOVIE COUNTRY ORIGIN -->
                                             <div class="col-md-8">
                                                <div class="form-group">
                                                   <label>Movie Country Origin:</label>
                                                   <input type="text" class="form-control" value="<?= $value->movie_country_origin; ?>" disabled>
                                                </div>
                                             </div>
                                             <!-- END field MOVIE COUNTRY ORIGIN -->

                                             <!-- field MOVIE REPRODUCTIONS -->
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                   <label>Movie Reproductions:</label>
                                                   <input type="text" class="form-control" value="<?= $value->movie_reproductions; ?>" disabled>
                                                </div>
                                             </div>
                                             <!-- END field MOVIE REPRODUCTIONS -->

                                             <!-- field MOVIE DESCRIPTION -->
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                   <label>Movie Description:</label>
                                                   <textarea type="text" class="form-control txa-no-resize" disabled><?= $value->movie_description; ?></textarea>
                                                </div>
                                             </div> 
                                             <!-- END field MOVIE DESCRIPTION -->
                                          </div>
                                       </div>
                                       <div class="modal-footer bg-black">
                                          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           <?php endforeach ?>
                        </tbody>
                     </table>
                  </div>
               <?php else: ?>
                  <div class="alert alert-danger">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <strong>Message!</strong> No movies found on the system.
                  </div>
               <?php endif ?> 
               <a href="<?= site_url('movies/add/'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Add Movie</a>
            </div>
         </div>
      </div>
   </div>
</div>