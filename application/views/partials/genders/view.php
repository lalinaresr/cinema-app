<h1 class="page-header">Catálogo de géneros | ver a detalle.</h1>
<div class="row">
   <!-- field GENDER NAME -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Nombre:</label>
         <input type="text" class="form-control" value="<?= $view_gender->gender_name; ?>" disabled>
      </div>
   </div>
   <!-- END field GENDER NAME -->

   <!-- field GENDER SLUG -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Alias:</label>
         <input type="text" class="form-control" value="<?= $view_gender->gender_slug; ?>" disabled>
      </div>
   </div>
   <!-- END field GENDER SLUG -->

   <!-- field STATUS NAME -->
   <div class="col-md-8">
      <div class="form-group">
         <label>Estatus:</label>
         <input type="text" class="form-control" value="<?= $view_gender->status_name; ?>" disabled>
      </div>
   </div>
   <!-- END field STATUS NAME -->

   <!-- field DATE REGISTERED GENDER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Fecha de registro:</label>
         <input type="text" class="form-control" value="<?= $view_gender->date_registered_gds; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE REGISTERED GENDER -->

   <!-- field IP REGISTERED GENDER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>IP de registro:</label>
         <input type="text" class="form-control" value="<?= $view_gender->ip_registered_gds; ?>" disabled>
      </div>
   </div>
   <!-- END field IP REGISTERED GENDER -->

   <!-- field DATE MODIFIED GENDER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Fecha de modificación:</label>
         <input type="text" class="form-control" value="<?= $view_gender->date_modified_gds; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE MODIFIED GENDER -->

   <!-- field IP MODIFIED GENDER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>IP de modificación:</label>
         <input type="text" class="form-control" value="<?= $view_gender->ip_modified_gds; ?>" disabled>
      </div>
   </div>
   <!-- END field IP MODIFIED GENDER -->

   <!-- field CLIENT REGISTERED GENDER -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Dispositivo de registro:</label>
         <textarea type="text" class="form-control " disabled><?= $view_gender->client_registered_gds; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT REGISTERED GENDER -->

   <!-- field CLIENT MODIFIED GENDER -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Dispositivo de modificación:</label>
         <textarea type="text" class="form-control " disabled><?= $view_gender->client_modified_gds; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT MODIFIED GENDER -->

   <!-- button RETURN -->
   <div class="col-md-4">
      <a href="<?= site_url('genders/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
   </div>
   <!-- END button RETURN -->
</div>