               <?php if ($this->session->userdata('is_admin_logged_in')): ?>
                  <!-- This panel content the last connections of the user connected -->
                  <?php if ($get_my_sessions != FALSE): ?>
                  <div class="panel panel-info">
                     <div class="panel-heading">
                        <h3 class="panel-title">My Connections</h3>
                     </div>
                     <div class="panel-body" style="overflow: auto;">
                        <table class="table table-striped table-responsive">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Browser</th>
                                 <th>Browser Version</th>
                                 <th>OS</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($get_my_sessions->result() as $key => $value): $id_session_sp_encryp = cryp($value->id_session); ?>
                              <tr>
                                 <td><a href='#modal-my-connections-<?= $id_session_sp_encryp; ?>' data-toggle="modal"><?= $id_session_sp_encryp; ?></a></td>
                                 <td><?= $value->session_browser_used; ?></td>
                                 <td><?= $value->session_browser_version; ?></td>
                                 <td><?= $value->session_os_used; ?></td>
                                 <td><?= get_antiquity($value->date_registered_ses); ?></td>
                              </tr>
                              <div class="modal fade" id="modal-my-connections-<?= $id_session_sp_encryp; ?>">
                                 <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                       <div class="modal-header bg-black">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title text-center tx-white">My Session ID: <?= $id_session_sp_encryp; ?></h4>
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
                  </div>
                  <?php else: ?>
                  <div class="alert alert-danger">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <strong>Message!</strong> No users & sessions found on the system.
                  </div>
                  <?php endif ?>
                  <!--END This panel content the last connections of the user connected -->
               </div> <!-- END COL 6 -->
            <?php endif ?>
         </div> <!-- END SUB ROW -->
      </div> <!-- END MAIN -->
   </div> <!-- END FIRST ROW -->
</div> <!-- END CONTAINER FLUID -->