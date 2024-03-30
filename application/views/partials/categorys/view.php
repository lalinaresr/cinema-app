      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <h1 class="page-header">Categorys Management | View.</h1>
         <div class="row">
            <!-- field CATEGORY NAME -->
            <div class="col-md-6">
               <div class="form-group">
                  <label>Category Name:</label>
                  <input type="text" class="form-control" value="<?= $view_category->category_name; ?>" disabled>
               </div>
            </div>
            <!-- END field CATEGORY NAME -->

            <!-- field CATEGORY SLUG -->
            <div class="col-md-6">
               <div class="form-group">
                  <label>Category Slug:</label>
                  <input type="text" class="form-control" value="<?= $view_category->category_slug; ?>" disabled>
               </div>
            </div>
            <!-- END field CATEGORY SLUG -->               

            <!-- field STATUS NAME -->
            <div class="col-md-8">
               <div class="form-group">
                  <label>Status:</label>
                  <input type="text" class="form-control" value="<?= $view_category->status_name; ?>" disabled>
               </div>
            </div>
            <!-- END field STATUS NAME -->

            <!-- field DATE REGISTERED CATEGORY -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>Date Registered:</label>
                  <input type="text" class="form-control" value="<?= $view_category->date_registered_cat; ?>" disabled>
               </div>
            </div>
            <!-- END field DATE REGISTERED CATEGORY -->

            <!-- field IP REGISTERED CATEGORY -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>IP Registered:</label>
                  <input type="text" class="form-control" value="<?= $view_category->ip_registered_cat; ?>" disabled>
               </div>
            </div>
            <!-- END field IP REGISTERED CATEGORY -->

            <!-- field DATE MODIFIED CATEGORY -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>Date Modified:</label>
                  <input type="text" class="form-control" value="<?= $view_category->date_modified_cat; ?>" disabled>
               </div>
            </div>
            <!-- END field DATE MODIFIED CATEGORY -->

            <!-- field IP MODIFIED CATEGORY -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>IP Modified:</label>
                  <input type="text" class="form-control" value="<?= $view_category->ip_modified_cat; ?>" disabled>
               </div>
            </div>
            <!-- END field IP MODIFIED CATEGORY -->

            <!-- field CLIENT REGISTERED CATEGORY -->
            <div class="col-md-6">
               <div class="form-group">
                  <label>Client Registered:</label>
                  <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_category->client_registered_cat; ?></textarea>
               </div>
            </div> 
            <!-- END field CLIENT REGISTERED CATEGORY -->

            <!-- field CLIENT MODIFIED CATEGORY -->
            <div class="col-md-6">
               <div class="form-group">
                  <label>Client Modified:</label>
                  <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_category->client_modified_cat; ?></textarea>
               </div>
            </div> 
            <!-- END field CLIENT MODIFIED CATEGORY -->

            <!-- button RETURN -->
            <div class="col-md-4">
               <a href="<?= site_url('categorys/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancel</a>
            </div>
            <!-- END button RETURN -->
         </div>
      </div>
   </div>
</div>