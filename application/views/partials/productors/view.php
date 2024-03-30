      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <h1 class="page-header">Productors Management | View.</h1>
         <div class="row">
            <!-- field PRODUCTOR NAME -->
            <div class="col-md-6">
               <div class="form-group">
                  <label>Productor Name:</label>
                  <input type="text" class="form-control" value="<?= $view_productor->productor_name; ?>" disabled>
               </div>
            </div>
            <!-- END field PRODUCTOR NAME -->

            <!-- field PRODUCTOR SLUG -->
            <div class="col-md-6">
               <div class="form-group">
                  <label>Productor Slug:</label>
                  <input type="text" class="form-control" value="<?= $view_productor->productor_slug; ?>" disabled>
               </div>
            </div>
            <!-- END field PRODUCTOR SLUG -->       

            <!-- field IMAGE LOGO -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>Productor Image Logo:</label>
                  <a href='#modal-view-logo-productor-<?= $id_productor_encryp; ?>' class="btn btn-info btn-block" data-toggle="modal" ><span class="glyphicon glyphicon-picture"></span> View Image Logo</a>
                  <!-- This is the modal that shows the image logo of the productors. -->
                  <div class="modal fade" id="modal-view-logo-productor-<?= $id_productor_encryp; ?>">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header bg-black">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title text-center tx-white">Productor ID: <?= $id_productor_encryp; ?></h4>
                           </div>
                           <div class="modal-body">
                              <?php if (strcmp($view_productor->productor_image_logo, 'NO-IMAGE') == 0): ?>
                                 <img src="<?= encryp_image_base64(base_url() . 'assets/images/productors/default.png'); ?>" class="img-rounded img-responsive" style="width: 100%; height: 100%;">
                              <?php else: ?>
                                 <img src="<?= encryp_image_base64(base_url() . $view_productor->productor_image_logo); ?>" class="img-rounded img-responsive" style="width: 100%; height: 100%;">
                              <?php endif ?> 
                           </div>
                           <div class="modal-footer bg-black">
                              <a href="<?= site_url('productors/edit_logo/') . $id_productor_encryp . '/'; ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Edit Logo</a>                                       
                              <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Close</button>
                           </div>
                        </div>
                     </div>
                  </div>  
                  <!-- END This is the modal that shows the image logo of the productors. --> 
               </div>
            </div>
            <!-- END field IMAGE LOGO -->         

            <!-- field STATUS NAME -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>Status:</label>
                  <input type="text" class="form-control" value="<?= $view_productor->status_name; ?>" disabled>
               </div>
            </div>
            <!-- END field STATUS NAME -->

            <!-- field DATE REGISTERED PRODUCTOR -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>Date Registered:</label>
                  <input type="text" class="form-control" value="<?= $view_productor->date_registered_pro; ?>" disabled>
               </div>
            </div>
            <!-- END field DATE REGISTERED PRODUCTOR -->

            <!-- field IP REGISTERED PRODUCTOR -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>IP Registered:</label>
                  <input type="text" class="form-control" value="<?= $view_productor->ip_registered_pro; ?>" disabled>
               </div>
            </div>
            <!-- END field IP REGISTERED PRODUCTOR -->

            <!-- field DATE MODIFIED PRODUCTOR -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>Date Modified:</label>
                  <input type="text" class="form-control" value="<?= $view_productor->date_modified_pro; ?>" disabled>
               </div>
            </div>
            <!-- END field DATE MODIFIED PRODUCTOR -->

            <!-- field IP MODIFIED PRODUCTOR -->
            <div class="col-md-4">
               <div class="form-group">
                  <label>IP Modified:</label>
                  <input type="text" class="form-control" value="<?= $view_productor->ip_modified_pro; ?>" disabled>
               </div>
            </div>
            <!-- END field IP MODIFIED PRODUCTOR -->

            <!-- field CLIENT REGISTERED PRODUCTOR -->
            <div class="col-md-6">
               <div class="form-group">
                  <label>Client Registered:</label>
                  <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_productor->client_registered_pro; ?></textarea>
               </div>
            </div> 
            <!-- END field CLIENT REGISTERED PRODUCTOR -->

            <!-- field CLIENT MODIFIED PRODUCTOR -->
            <div class="col-md-6">
               <div class="form-group">
                  <label>Client Modified:</label>
                  <textarea type="text" class="form-control txa-no-resize" disabled><?= $view_productor->client_modified_pro; ?></textarea>
               </div>
            </div> 
            <!-- END field CLIENT MODIFIED PRODUCTOR -->

            <!-- buttons RETURN -->               
            <div class="col-md-4">
               <a href="<?= site_url('productors/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancel</a>
            </div>
            <!-- END buttons RETURN -->  
         </div>
      </div>
   </div>
</div>