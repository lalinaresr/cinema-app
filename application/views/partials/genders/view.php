<h1 class="page-header">Genders Management | View.</h1>
<div class="row">
   <!-- field GENDER NAME -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Gender Name:</label>
         <input type="text" class="form-control" value="<?= $view_gender->gender_name; ?>" disabled>
      </div>
   </div>
   <!-- END field GENDER NAME -->

   <!-- field GENDER SLUG -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Gender Slug:</label>
         <input type="text" class="form-control" value="<?= $view_gender->gender_slug; ?>" disabled>
      </div>
   </div>
   <!-- END field GENDER SLUG -->

   <!-- field STATUS NAME -->
   <div class="col-md-8">
      <div class="form-group">
         <label>Status:</label>
         <input type="text" class="form-control" value="<?= $view_gender->status_name; ?>" disabled>
      </div>
   </div>
   <!-- END field STATUS NAME -->

   <!-- field DATE REGISTERED GENDER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Date Registered:</label>
         <input type="text" class="form-control" value="<?= $view_gender->date_registered_gds; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE REGISTERED GENDER -->

   <!-- field IP REGISTERED GENDER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>IP Registered:</label>
         <input type="text" class="form-control" value="<?= $view_gender->ip_registered_gds; ?>" disabled>
      </div>
   </div>
   <!-- END field IP REGISTERED GENDER -->

   <!-- field DATE MODIFIED GENDER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>Date Modified:</label>
         <input type="text" class="form-control" value="<?= $view_gender->date_modified_gds; ?>" disabled>
      </div>
   </div>
   <!-- END field DATE MODIFIED GENDER -->

   <!-- field IP MODIFIED GENDER -->
   <div class="col-md-4">
      <div class="form-group">
         <label>IP Modified:</label>
         <input type="text" class="form-control" value="<?= $view_gender->ip_modified_gds; ?>" disabled>
      </div>
   </div>
   <!-- END field IP MODIFIED GENDER -->

   <!-- field CLIENT REGISTERED GENDER -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Client Registered:</label>
         <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_gender->client_registered_gds; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT REGISTERED GENDER -->

   <!-- field CLIENT MODIFIED GENDER -->
   <div class="col-md-6">
      <div class="form-group">
         <label>Client Modified:</label>
         <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_gender->client_modified_gds; ?></textarea>
      </div>
   </div>
   <!-- END field CLIENT MODIFIED GENDER -->

   <!-- button RETURN -->
   <div class="col-md-4">
      <a href="<?= site_url('genders/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancel</a>
   </div>
   <!-- END button RETURN -->
</div>