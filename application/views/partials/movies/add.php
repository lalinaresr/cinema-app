<h1 class="page-header">Catálogo de películas | agregar.</h1>
<div class="row">
   <form action="<?= site_url('movies/store'); ?>" method="post" id="form-insert-movie">
      <!-- field PRODUCTORS MOVIE -->
      <div class="col-md-4">
         <div class="form-group">
            <select id="ids_productors_insert" name="ids_productors_insert[]" multiple class="form-control" required>
               <?php foreach ($productors->result_array() as $value) : ?>
                  <option value="<?= $value['id_productor']; ?>"><?= $value['productor_name']; ?></option>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field PRODUCTORS MOVIE -->

      <!-- field GENDERS MOVIE -->
      <div class="col-md-4">
         <div class="form-group">
            <select id="ids_genders_insert" name="ids_genders_insert[]" multiple class="form-control" required>
               <?php foreach ($genders->result_array() as $value) : ?>
                  <option value="<?= $value['id_gender']; ?>"><?= $value['gender_name']; ?></option>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field GENDERS MOVIE -->

      <!-- field CATEGORYS MOVIE -->
      <div class="col-md-4">
         <div class="form-group">
            <select id="ids_categories_insert" name="ids_categories_insert[]" multiple class="form-control" required>
               <?php foreach ($categories->result_array() as $value) : ?>
                  <option value="<?= $value['id_category']; ?>"><?= $value['category_name']; ?></option>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field CATEGORYS MOVIE -->

      <!-- field STATUS NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Estatus:</label>
            <select id="movie_status_insert" name="movie_status_insert" class="form-control" required>
               <?php foreach ($status->result_array() as $value) : ?>
                  <option value="<?= $value['id_status']; ?>"><?= $value['status_name']; ?></option>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field STATUS NAME -->

      <!-- field MOVIE NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Título:</label>
            <input type="text" id="movie_name_insert" name="movie_name_insert" class="form-control" required minlength="3" maxlength="50" autocomplete="off">
         </div>
      </div>
      <!-- END field MOVIE NAME -->

      <!-- field MOVIE SLUG -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Alias:</label>
            <input type="text" id="movie_slug_insert" name="movie_slug_insert" class="form-control" required minlength="3" maxlength="50" readonly>
         </div>
      </div>
      <!-- END field MOVIE SLUG -->

      <!-- field QUALITY NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Calidad:</label>
            <select id="movie_quality_insert" name="movie_quality_insert" class="form-control" required>
               <?php foreach ($qualities->result_array() as $value) : ?>
                  <option value="<?= $value['id_quality']; ?>"><?= $value['quality_name']; ?></option>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field QUALITY NAME -->

      <!-- field MOVIE RELEASE DATE -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Fecha de lanzamiento:</label>
            <div class="input-group">
               <input type="text" id="movie_release_date_insert" name="movie_release_date_insert" class="form-control" required autocomplete="off">
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
            <label> Duración:</label>
            <input type="text" id="movie_duration_insert" name="movie_duration_insert" class="form-control" required>
         </div>
      </div>
      <!-- END field MOVIE DURATION -->

      <!-- field MOVIE COUNTRY ORIGIN -->
      <div class="col-md-8">
         <div class="form-group">
            <label>País de origen:</label>
            <select id="movie_country_origin_insert" name="movie_country_origin_insert" class="form-control" required>
               <?php foreach (get_all_countries() as $value) : ?>
                  <option value="<?= $value; ?>"><?= $value; ?></option>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field MOVIE COUNTRY ORIGIN -->

      <!-- field MOVIE COVER -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Portada:</label>
            <input type="file" id="movie_cover_insert" name="movie_cover_insert" class="form-control" required>
         </div>
      </div>

      <div class="modal fade" id="modal-movie-cover">
         <div class="modal-dialog modal-sm">
            <div class="modal-content">
               <div class="modal-header bg-black">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title text-white text-center">Ver portada</h4>
               </div>
               <div class="modal-body">
                  <img id="preview-img-cover" class="img-responsive img-rounded" style="width: 100%; height: 315px;">
               </div>
               <div class="modal-footer bg-black">
                  <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn-usage-image-cover"><span class="glyphicon glyphicon-picture"></span> Usar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
               </div>
            </div>
         </div>
      </div>
      <!-- END field MOVIE COVER -->

      <!-- field MOVIE PLAY -->
      <div class="col-md-12">
         <div class="form-group">
            <label>Enlace:</label>
            <input type="text" id="movie_play_insert" name="movie_play_insert" class="form-control" required minlength="30">
         </div>
      </div>
      <!-- END field MOVIE PLAY -->

      <!-- field MOVIE DESCRIPTION -->
      <div class="col-md-12">
         <div class="form-group">
            <label>Descripción:</label>
            <textarea type="text" id="movie_description_insert" name="movie_description_insert" class="form-control "></textarea>
         </div>
      </div>
      <!-- END field MOVIE DESCRIPTION -->

      <!-- field DATE REGISTERED MOVIE -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Fecha de registro:</label>
            <input type="text" class="form-control" value="<?= get_date_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field DATE REGISTERED MOVIE -->

      <!-- field IP REGISTERED MOVIE -->
      <div class="col-md-6">
         <div class="form-group">
            <label>IP de registro:</label>
            <input type="text" class="form-control" value="<?= get_ip_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field IP REGISTERED MOVIE -->

      <!-- field CLIENT REGISTERED MOVIE -->
      <div class="col-md-12">
         <div class="form-group">
            <label>Dispositivo de registro:</label>
            <textarea type="text" class="form-control " disabled><?= get_agent_current(); ?></textarea>
         </div>
      </div>
      <!-- END field CLIENT REGISTERED MOVIE -->

      <!-- buttons ACTIONS -->
      <div class="col-md-4">
         <button type="submit" class="btn btn-info" id="btn-insert-movie"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
         <a href="<?= site_url('movies/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
      </div>
      <!-- END buttons ACTIONS -->
   </form>
</div>