      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <h1 class="page-header">Genders Management.</h1>
         <div class="row">
            <div class="col-md-12">
               <?php if ($get_all_genders != FALSE): ?>
                  <div id="buttons-exports-genders">
                     <div class="row" id="row_buttons_genders"></div>                  
                     <table class="table table-striped table-hover table-responsive table-bordered table-condensed" id="table-genders">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Gender</th>
                              <th>Status</th>
                              <th>Date Registered</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($get_all_genders->result() as $key => $value): $id_gender_encryp = cryp($value->id_gender); ?>
                              <tr class="<?php echo $value->id_status == 1 ? 'success' : 'danger';  ?>" >
                                 <td><a href='#modal-view-gender-<?= $id_gender_encryp; ?>' data-toggle="modal"><?= $id_gender_encryp; ?></a></td>
                                 <td><?= $value->gender_name; ?></td>
                                 <td>
                                    <?php if ($value->id_status == 1): ?>
                                       <span class="label label-success">Active</span>
                                    <?php else: ?>
                                       <span class="label label-danger">Inactive</span>                                    
                                    <?php endif ?>
                                 </td>
                                 <td><?= get_antiquity($value->date_registered_gds); ?></td>
                                 <td>
                                    <a href="<?= site_url('genders/view/') . $id_gender_encryp . '/'; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a href="<?= site_url('genders/edit/') . $id_gender_encryp . '/'; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <button class="btn btn-danger btn-sm btn-delete-gender" id="<?= $id_gender_encryp; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                                 </td>
                              </tr>       

                              <!-- This is the modal that shows the data of the selected gender. -->
                              <div class="modal fade" id="modal-view-gender-<?= $id_gender_encryp; ?>">
                                 <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                       <div class="modal-header bg-black">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title tx-white text-center">Gender ID: <?= $id_gender_encryp; ?></h4>
                                       </div>
                                       <div class="modal-body">
                                          <div class="row">
                                             <!-- field GENDER NAME -->
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Gender Name:</label>
                                                   <input type="text" class="form-control" value="<?= $value->gender_name; ?>" disabled>
                                                </div>
                                             </div>
                                             <!-- END field GENDER NAME -->

                                             <!-- field GENDER SLUG -->
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Gender Slug:</label>
                                                   <input type="text" class="form-control" value="<?= $value->gender_slug; ?>" disabled>
                                                </div>
                                             </div>
                                             <!-- END field GENDER SLUG -->               

                                             <!-- field STATUS NAME -->
                                             <div class="col-md-8">
                                                <div class="form-group">
                                                   <label>Status:</label>
                                                   <input type="text" class="form-control" value="<?= $value->status_name; ?>" disabled>
                                                </div>
                                             </div>
                                             <!-- END field STATUS NAME -->

                                             <!-- field DATE REGISTERED GENDER -->
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                   <label>Date Registered:</label>
                                                   <input type="text" class="form-control" value="<?= $value->date_registered_gds; ?>" disabled>
                                                </div>
                                             </div>
                                             <!-- END field DATE REGISTERED GENDER -->

                                             <!-- field IP REGISTERED GENDER -->
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                   <label>IP Registered:</label>
                                                   <input type="text" class="form-control" value="<?= $value->ip_registered_gds; ?>" disabled>
                                                </div>
                                             </div>
                                             <!-- END field IP REGISTERED GENDER -->

                                             <!-- field DATE MODIFIED GENDER -->
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                   <label>Date Modified:</label>
                                                   <input type="text" class="form-control" value="<?= $value->date_modified_gds; ?>" disabled>
                                                </div>
                                             </div>
                                             <!-- END field DATE MODIFIED GENDER -->

                                             <!-- field IP MODIFIED GENDER -->
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                   <label>IP Modified:</label>
                                                   <input type="text" class="form-control" value="<?= $value->ip_modified_gds; ?>" disabled>
                                                </div>
                                             </div>
                                             <!-- END field IP MODIFIED GENDER -->

                                             <!-- field CLIENT REGISTERED GENDER -->
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Client Registered:</label>
                                                   <textarea type="text" class="form-control txa-no-resize" disabled><?= $value->client_registered_gds; ?></textarea>
                                                </div>
                                             </div> 
                                             <!-- END field CLIENT REGISTERED GENDER -->

                                             <!-- field CLIENT MODIFIED GENDER -->
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Client Modified:</label>
                                                   <textarea type="text" class="form-control txa-no-resize" disabled><?= $value->client_modified_gds; ?></textarea>
                                                </div>
                                             </div> 
                                             <!-- END field CLIENT MODIFIED GENDER -->                                          
                                          </div>                                       
                                       </div>
                                       <div class="modal-footer bg-black">
                                          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- END This is the modal that shows the data of the selected gender. -->      
                           <?php endforeach ?>      
                        </tbody>
                     </table>
                  </div>
               <?php else: ?>
                  <div class="alert alert-danger">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <strong>Message!</strong> No genders found on the system.
                  </div>
               <?php endif ?>
               <a href="<?= site_url('genders/add/'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Add Gender</a>
            </div>
         </div>
      </div>
   </div>
</div>