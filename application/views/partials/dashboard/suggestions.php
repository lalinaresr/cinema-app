<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
   <h1 class="page-header">Welcome to Dashboard.</h1>
   <div class="row">
      <div class="col-md-<?= $this->session->userdata('is_guest_logged_in') ? '12' : '6'; ?>">
         <?php if ($get_some_suggestions != FALSE): ?>
            <div class="panel panel-info">
               <div class="panel-heading">
                  <h3 class="panel-title">Suggestions</h3>
               </div>
               <div class="panel-body">
                  <table class="table table-bordered table-responsive">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Email</th>
                           <th>Date Registered</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($get_some_suggestions->result() as $key => $value): $id_suggestion_encryp = cryp($value->id_suggestion); ?>
                           <tr>
                              <td><a href='#modal-view-suggestion-<?= $id_suggestion_encryp; ?>' data-toggle="modal"><?= $id_suggestion_encryp; ?></a></td>
                              <td><?= $value->suggestion_email; ?></td>
                              <td><?= get_antiquity($value->date_registered_sug); ?></td>
                           </tr>

                           <div class="modal fade" id="modal-view-suggestion-<?= $id_suggestion_encryp; ?>">
                              <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                    <div class="modal-header bg-black">
                                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                       <h4 class="modal-title text-center tx-white">Suggestion ID: <?= $id_suggestion_encryp; ?></h4>
                                    </div>
                                    <div class="modal-body">
                                       <div class="row">
                                          <!-- field SUGGESTION NAME -->
                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <label>Suggestion Name:</label>
                                                <input type="text" class="form-control" value="<?= $value->suggestion_name; ?>" disabled>
                                             </div>
                                          </div>
                                          <!-- END field SUGGESTION NAME -->

                                          <!-- field SUGGESTION EMAIL -->
                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <label>Suggestion Email:</label>
                                                <input type="text" class="form-control" value="<?= $value->suggestion_email; ?>" disabled>
                                             </div>
                                          </div>
                                          <!-- END field SUGGESTION EMAIL -->

                                          <!-- field SUGGESTION KEY -->
                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <label>Suggestion Key:</label>
                                                <input type="text" class="form-control" value="<?= $value->suggestion_key; ?>" disabled>
                                             </div>
                                          </div>
                                          <!-- END field SUGGESTION KEY -->

                                          <!-- field SUGGESTION DESCRIPTION -->
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <label>Suggestion Description:</label>
                                                <textarea type="text" class="form-control txa-no-resize" disabled><?= $value->suggestion_description; ?></textarea>
                                             </div>
                                          </div>
                                          <!-- END field SUGGESTION DESCRIPTION -->
                                          
                                          <!-- field IP REGISTERED SUGGESTION -->
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label>IP Registered:</label>
                                                <input type="text" class="form-control" value="<?= $value->ip_registered_sug; ?>" disabled>
                                             </div>
                                          </div>
                                          <!-- END field IP REGISTERED SUGGESTION -->
                                          
                                          <!-- field DATE REGISTERED SUGGESTION -->                                               
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label>Date Registered:</label>
                                                <input type="text" class="form-control" value="<?= $value->date_registered_sug; ?>" disabled>
                                             </div>
                                          </div>
                                          <!-- END field DATE REGISTERED SUGGESTION -->
                                          
                                          <!-- field CLIENT REGISTERED SUGGESTION -->                                                   
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <label>Client Registered:</label>
                                                <textarea type="text" class="form-control txa-no-resize" disabled><?= $value->client_registered_sug; ?></textarea>
                                             </div>
                                          </div>
                                          <!-- END CLIENT REGISTERED SUGGESTION -->                                                   
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
               <strong>Message!</strong> No suggestions found on the system. 
            </div>
         <?php endif ?>

         