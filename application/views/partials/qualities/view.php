      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <h1 class="page-header">Qualities Management | View.</h1>
         <div class="row">
            <!-- field QUALITY NAME -->
            <div class="col-md-6">
               <div class="form-group">
                  <label>Quality name:</label>
                  <input type="text" class="form-control" value="<?= $view_quality->quality_name; ?>" disabled>
               </div>
            </div>
            <!-- END field QUALITY NAME -->

            <!-- field QUALITY SLUG -->
            <div class="col-md-6">
               <div class="form-group">
                  <label>Quality slug:</label>
                  <input type="text" class="form-control" value="<?= $view_quality->quality_slug; ?>" disabled>
               </div>
            </div>
            <!-- END field QUALITY SLUG -->               

            <!-- field STATUS NAME -->
            <div class="col-md-8">
               <div class="form-group">
                  <label>Status:</label>
                  <input type="text" class="form-control" value="<?= $view_quality->status_name; ?>" disabled>
               </div>
            </div>
            <!-- END field STATUS NAME -->

            <!-- field DATE REGISTERED QUALITY -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>Date Registered:</label>
                  <input type="text" class="form-control" value="<?= $view_quality->date_registered_qlt; ?>" disabled>
               </div>
            </div>
            <!-- END field DATE REGISTERED QUALITY -->

            <!-- field IP REGISTERED QUALITY -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>IP Registered:</label>
                  <input type="text" class="form-control" value="<?= $view_quality->ip_registered_qlt; ?>" disabled>
               </div>
            </div>
            <!-- END field IP REGISTERED QUALITY -->

            <!-- field DATE MODIFIED QUALITY -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>Date Modified:</label>
                  <input type="text" class="form-control" value="<?= $view_quality->date_modified_qlt; ?>" disabled>
               </div>
            </div>
            <!-- END field DATE MODIFIED QUALITY -->

            <!-- field IP MODIFIED QUALITY -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>IP Modified:</label>
                  <input type="text" class="form-control" value="<?= $view_quality->ip_modified_qlt; ?>" disabled>
               </div>
            </div>
            <!-- END field IP MODIFIED QUALITY -->

            <!-- field CLIENT REGISTERED QUALITY -->
            <div class="col-md-6">
               <div class="form-group">
                  <label>Client Registered:</label>
                  <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_quality->client_registered_qlt; ?></textarea>
               </div>
            </div> 
            <!-- END field CLIENT REGISTERED QUALITY -->

            <!-- field CLIENT MODIFIED QUALITY -->
            <div class="col-md-6">
               <div class="form-group">
                  <label>Client Modified:</label>
                  <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_quality->client_modified_qlt; ?></textarea>
               </div>
            </div> 
            <!-- END field CLIENT MODIFIED QUALITY -->

            <!-- button RETURN -->
            <div class="col-md-4">
               <a href="<?= site_url('qualities/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancel</a>
            </div>
            <!-- END button RETURN -->
         </div>
      </div>
   </div>
</div>