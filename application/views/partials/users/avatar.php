      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <h1 class="page-header">Users Management | Edit Avatar.</h1>
         <form action="<?= site_url('users/update_avatar/'); ?>" method="post" id="form-update-avatar" enctype="multipart/form-data">
            <div class="row">
               <div class="col-md-12">
                  <input type="hidden" id="id_user_customize_avatar" name="id_user_customize_avatar" class="form-control" value="<?= $id_user_encryp; ?>">
                  <input type="hidden" id="image_avatar_update_route" name="image_avatar_update_route" class="form-control" value="<?= $view_user->user_avatar; ?>">
                  <!-- field USER AVATAR -->
                  <div class="form-group">
                     <label>User Avatar:</label>
                     <input type="file" id="user_avatar_customize" name="user_avatar_customize" class="form-control" required>
                  </div>
                  <!-- END field USER AVATAR -->
                  <div class="form-group">
                     <?php if (strcmp($view_user->user_avatar, 'NO-IMAGE') == 0): ?>
                        <img src="<?= encryp_image_base64(base_url() . 'assets/images/users/default.png'); ?>" class="img-rounded img-responsive" id="image-avatar-current">
                     <?php else: ?>
                        <img src="<?= encryp_image_base64(base_url() . $view_user->user_avatar); ?>" class="img-rounded img-responsive" id="image-avatar-current">
                     <?php endif ?> 
                     <img id="preview-img-avatar" class="img-responsive img-rounded img-thumbnail">
                  </div>
               </div>
            </div>   

            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>File Name:</label>
                     <input type="text" id="file_name_avatar_customize" name="file_name_avatar_customize" class="form-control" disabled>
                  </div>
               </div> 

               <div class="col-md-6">
                  <div class="form-group">
                     <label>File Size:</label>
                     <input type="text" id="file_size_avatar_customize" name="file_size_avatar_customize" class="form-control" disabled>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label>File Extension:</label>
                     <input type="text" id="file_extension_avatar_customize" name="file_extension_avatar_customize" class="form-control" disabled>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label>Route:</label>
                     <input type="text" id="file_route_avatar_customize" name="file_route_avatar_customize" class="form-control" disabled>
                  </div>
               </div>
               
               <div class="col-md-6">
                  <div class="form-group">
                     <label>IP Upload:</label>
                     <input type="text" id="file_ip_upload_avatar_customize" name="file_ip_upload_avatar_customize" class="form-control" value="<?= get_ip_current(); ?>" disabled>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label>Date Upload:</label>
                     <input type="text" id="file_date_upload_avatar_customize" name="file_date_upload_avatar_customize" class="form-control" value="<?= get_date_current(); ?>" disabled>
                  </div>
               </div>

               <div class="col-md-12">
                  <div class="form-group">
                     <label>Client Upload:</label>
                     <textarea id="file_client_upload_avatar_customize" name="file_client_upload_avatar_customize" class="form-control txa-no-resize" disabled><?= get_agent_current(); ?></textarea>
                  </div>
               </div>

               <!-- buttons ACTIONS -->               
               <div class="col-md-4">
                  <button type="submit" class="btn btn-info" id="btn-update-avatar"><span class="glyphicon glyphicon-upload"></span> Change Avatar</button>                  
                  <a href="<?= site_url('users/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancel</a>
               </div>
               <!-- END buttons ACTIONS -->  
            </div>         
         </form>
      </div>
   </div>
</div>