<h1 class="page-header">Sessions Management.</h1>
<?php if ($get_all_sessions != FALSE) : ?>
   <div id="buttons-exports-sessions">
      <div class="row" id="row_buttons_sessions"></div>
      <table class="table table-striped table-hover table-responsive table-bordered table-condensed" id="table-sessions">
         <thead>
            <tr>
               <th>ID</th>
               <th>Rol</th>
               <th>Username</th>
               <th>Status</th>
               <th>Day Exactly</th>
               <th>Date Registered</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($get_all_sessions->result() as $key => $value) : $id_session_encryp = cryp($value->id_session);
               $id_user_encryp = cryp($value->id_user); ?>
               <tr class="<?php echo $value->id_status == 1 ? 'success' : 'danger';  ?>">
                  <td><a href='#modal-view-session-<?= $id_session_encryp; ?>' data-toggle="modal"><?= $id_session_encryp; ?></a></td>
                  <td><?= $value->rol_name; ?></td>
                  <td><a href='#modal-view-avatar-user-<?= $id_user_encryp; ?>' data-toggle="modal"><?= $value->user_username; ?></a></td>
                  <td>
                     <?php if ($value->id_status == 1) : ?>
                        <span class="label label-success">Active</span>
                     <?php else : ?>
                        <span class="label label-danger">Inactive</span>
                     <?php endif ?>
                  </td>
                  <td><?= what_day_is($value->date_registered_ses); ?></td>
                  <td><?= get_antiquity($value->date_registered_ses); ?></td>
               </tr>

               <!-- This is the modal that shows the profile image of the user. -->
               <div class="modal fade" id="modal-view-avatar-user-<?= $id_user_encryp; ?>">
                  <div class="modal-dialog modal-sm">
                     <div class="modal-content">
                        <div class="modal-header bg-black">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           <h4 class="modal-title text-center tx-white">User ID: <?= $id_user_encryp; ?></h4>
                        </div>
                        <div class="modal-body">
                           <?php if (strcmp($value->user_avatar, 'NO-IMAGE') == 0) : ?>
                              <img src="<?= encryp_image_base64(base_url() . 'assets/images/users/default.png'); ?>" class="img-rounded img-responsive center-block">
                           <?php else : ?>
                              <img src="<?= encryp_image_base64(base_url() . $value->user_avatar); ?>" class="img-rounded img-responsive center-block">
                           <?php endif ?>
                        </div>
                        <div class="modal-footer bg-black">
                           <?php if ($value->id_user == $this->session->userdata('id_user')) : ?>
                              <a href="<?= site_url('users/edit_avatar/') . $id_user_encryp . '/'; ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Edit Avatar</a>
                           <?php endif ?>
                           <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Close</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END This is the modal that shows the profile image of the user. -->

               <div class="modal fade" id="modal-view-session-<?= $id_session_encryp; ?>">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header bg-black">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           <h4 class="modal-title text-center tx-white">Session ID: <?= $id_session_encryp; ?></h4>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <!-- field BROWSER USED -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Browser Used:</label>
                                    <input type="text" class="form-control" value="<?= $value->session_browser_used; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field BROWSER USED -->

                              <!-- field OPERATING SYSTEM USED -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Operating System Used:</label>
                                    <input type="text" class="form-control" value="<?= $value->session_os_used; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field OPERATING SYSTEM USED -->

                              <!-- field BROWSER VERSION USED -->
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Browser Version:</label>
                                    <input type="text" class="form-control" value="<?= $value->session_browser_version; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field BROWSER VERSION USED -->

                              <!-- field IP REGISTERED SESSION -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>IP Registered:</label>
                                    <input type="text" class="form-control" value="<?= $value->ip_registered_ses; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field IP REGISTERED SESSION -->

                              <!-- field DATE REGISTERED SESSION -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Date Registered:</label>
                                    <input type="text" class="form-control" value="<?= $value->date_registered_ses; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field DATE REGISTERED SESSION -->

                              <!-- field CLIENT REGISTERED SESSION -->
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Client Registered:</label>
                                    <textarea type="text" class="form-control txa-no-resize" disabled><?= $value->client_registered_ses; ?></textarea>
                                 </div>
                              </div>
                              <!-- END CLIENT REGISTERED SESSION -->
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
<?php else : ?>
   <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Message!</strong> No users & sessions found on the system.
   </div>
<?php endif ?>