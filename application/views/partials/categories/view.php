<h1 class="page-header">Catálogo de categorías | ver a detalle.</h1>
<div class="row">
   <!-- field CATEGORY NAME -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Nombre:</label>
         <input type="text" class="form-control" value="<?= $category['category_name']; ?>" disabled>
      </div>
   </div>
   <!-- END field CATEGORY NAME -->

   <!-- field CATEGORY SLUG -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Alias:</label>
         <input type="text" class="form-control" value="<?= $category['category_slug']; ?>" disabled>
      </div>
   </div>
   <!-- END field CATEGORY SLUG -->

   <!-- field STATUS NAME -->
   <div class="col-md-8">
      <div class="form-group">
         <label>Estatus:</label>
         <input type="text" class="form-control" value="<?= $category['status_name']; ?>" disabled>
      </div>
   </div>
   <!-- END field STATUS NAME -->

   <!-- field DATE REGISTERED CATEGORY -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Fecha de registro:</label>
         <input type="text" class="form-control" value="<?= $category['date_registered_cat']; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE REGISTERED CATEGORY -->

   <!-- field IP REGISTERED CATEGORY -->
   <div class="col-md-4">
      <div class="form-group">
         <label>IP de registro:</label>
         <input type="text" class="form-control" value="<?= $category['ip_registered_cat']; ?>" disabled>
      </div>
   </div>
   <!-- END field IP REGISTERED CATEGORY -->

   <!-- field DATE MODIFIED CATEGORY -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Fecha de modificación:</label>
         <input type="text" class="form-control" value="<?= $category['date_modified_cat']; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE MODIFIED CATEGORY -->

   <!-- field IP MODIFIED CATEGORY -->
   <div class="col-md-4">
      <div class="form-group">
         <label>IP de modificación:</label>
         <input type="text" class="form-control" value="<?= $category['ip_modified_cat']; ?>" disabled>
      </div>
   </div>
   <!-- END field IP MODIFIED CATEGORY -->

   <!-- field CLIENT REGISTERED CATEGORY -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Dispositivo de registro:</label>
         <textarea type="text" class="form-control " disabled><?= $category['client_registered_cat']; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT REGISTERED CATEGORY -->

   <!-- field CLIENT MODIFIED CATEGORY -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Dispositivo de modificación:</label>
         <textarea type="text" class="form-control " disabled><?= $category['client_modified_cat']; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT MODIFIED CATEGORY -->

   <!-- button RETURN -->
   <div class="col-md-4">
      <a href="<?= site_url('categories/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
   </div>
   <!-- END button RETURN -->
</div>