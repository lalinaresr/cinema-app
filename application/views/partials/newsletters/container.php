<h1 class="page-header">Newsletters Management.</h1>
<?php if ($get_all_newsletters != FALSE) : ?>
   <div id="buttons-exports-newsletters">
      <div class="row" id="row_buttons_newsletters"></div>
      <table class="table table-striped table-hover table-responsive table-bordered table-condensed" id="table-newsletters">
         <thead>
            <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Email</th>
               <th>Date Registered</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($get_all_newsletters->result() as $key => $value) : $id_newsletter_encryp = cryp($value->id_newsletter); ?>
               <tr class="success">
                  <td><a href='#modal-view-newsletter-<?= $id_newsletter_encryp; ?>' data-toggle="modal"><?= $id_newsletter_encryp; ?></a></td>
                  <td><?= $value->newsletter_name; ?></td>
                  <td><?= $value->newsletter_email; ?></td>
                  <td><?= get_antiquity($value->date_registered_nlt); ?></td>
               </tr>

               <div class="modal fade" id="modal-view-newsletter-<?= $id_newsletter_encryp; ?>">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header bg-black">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           <h4 class="modal-title text-center tx-white">Newsletter ID: <?= $id_newsletter_encryp; ?></h4>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <!-- field NEWSLETTER NAME -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Newsletter Name:</label>
                                    <input type="text" class="form-control" value="<?= $value->newsletter_name; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field NEWSLETTER NAME -->

                              <!-- field NEWSLETTER EMAIL -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Newsletter Email:</label>
                                    <input type="text" class="form-control" value="<?= $value->newsletter_email; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field NEWSLETTER EMAIL -->

                              <!-- field IP REGISTERED NEWSLETTER -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>IP Registered:</label>
                                    <input type="text" class="form-control" value="<?= $value->ip_registered_nlt; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field IP REGISTERED NEWSLETTER -->

                              <!-- field DATE REGISTERED NEWSLETTER -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Date Registered:</label>
                                    <input type="text" class="form-control" value="<?= $value->date_registered_nlt; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field DATE REGISTERED NEWSLETTER -->

                              <!-- field CLIENT REGISTERED NEWSLETTER -->
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Client Registered:</label>
                                    <textarea type="text" class="form-control txa-no-resize" disabled><?= $value->client_registered_nlt; ?></textarea>
                                 </div>
                              </div>
                              <!-- END CLIENT REGISTERED NEWSLETTER -->
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
      <strong>Message!</strong> No newsletters found on the system.
   </div>
<?php endif ?>