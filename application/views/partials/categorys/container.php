<h1 class="page-header">Categorys Management.</h1>
<?php if ($get_all_categorys != FALSE) : ?>
   <div id="buttons-exports-categorys">
      <div class="row" id="row_buttons_categorys"></div>
      <table class="table table-striped table-hover table-responsive table-bordered table-condensed" id="table-categorys">
         <thead>
            <tr>
               <th>ID</th>
               <th>Category</th>
               <th>Status</th>
               <th>Date Registered</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($get_all_categorys->result() as $key => $value) : $id_category_encryp = cryp($value->id_category); ?>
               <tr class="<?php echo $value->id_status == 1 ? 'success' : 'danger';  ?>">
                  <td><a href='#modal-view-category-<?= $id_category_encryp; ?>' data-toggle="modal"><?= $id_category_encryp; ?></a></td>
                  <td><?= $value->category_name; ?></td>
                  <td>
                     <?php if ($value->id_status == 1) : ?>
                        <span class="label label-success">Active</span>
                     <?php else : ?>
                        <span class="label label-danger">Inactive</span>
                     <?php endif ?>
                  </td>
                  <td><?= get_antiquity($value->date_registered_cat); ?></td>
                  <td>
                     <a href="<?= site_url('categorys/view/') . $id_category_encryp . '/'; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                     <a href="<?= site_url('categorys/edit/') . $id_category_encryp . '/'; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                     <button class="btn btn-danger btn-sm btn-delete-category" id="<?= $id_category_encryp; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                  </td>
               </tr>

               <!-- This is the modal that shows the data of the selected category. -->
               <div class="modal fade" id="modal-view-category-<?= $id_category_encryp; ?>">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header bg-black">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           <h4 class="modal-title tx-white text-center">Category ID: <?= $id_category_encryp; ?></h4>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <!-- field CATEGORY NAME -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Category Name:</label>
                                    <input type="text" class="form-control" value="<?= $value->category_name; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field CATEGORY NAME -->

                              <!-- field CATEGORY SLUG -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Category Slug:</label>
                                    <input type="text" class="form-control" value="<?= $value->category_slug; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field CATEGORY SLUG -->

                              <!-- field STATUS NAME -->
                              <div class="col-md-8">
                                 <div class="form-group">
                                    <label>Status:</label>
                                    <input type="text" class="form-control" value="<?= $value->status_name; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field STATUS NAME -->

                              <!-- field DATE REGISTERED CATEGORY -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Date Registered:</label>
                                    <input type="text" class="form-control" value="<?= $value->date_registered_cat; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field DATE REGISTERED CATEGORY -->

                              <!-- field IP REGISTERED CATEGORY -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>IP Registered:</label>
                                    <input type="text" class="form-control" value="<?= $value->ip_registered_cat; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field IP REGISTERED CATEGORY -->

                              <!-- field DATE MODIFIED CATEGORY -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Date Modified:</label>
                                    <input type="text" class="form-control" value="<?= $value->date_modified_cat; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field DATE MODIFIED CATEGORY -->

                              <!-- field IP MODIFIED CATEGORY -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>IP Modified:</label>
                                    <input type="text" class="form-control" value="<?= $value->ip_modified_cat; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field IP MODIFIED CATEGORY -->

                              <!-- field CLIENT REGISTERED CATEGORY -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Client Registered:</label>
                                    <textarea type="text" class="form-control txa-no-resize" disabled><?= $value->client_registered_cat; ?></textarea>
                                 </div>
                              </div>
                              <!-- END field CLIENT REGISTERED CATEGORY -->

                              <!-- field CLIENT MODIFIED CATEGORY -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Client Modified:</label>
                                    <textarea type="text" class="form-control txa-no-resize" disabled><?= $value->client_modified_cat; ?></textarea>
                                 </div>
                              </div>
                              <!-- END field CLIENT MODIFIED CATEGORY -->
                           </div>
                        </div>
                        <div class="modal-footer bg-black">
                           <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Close</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END This is the modal that shows the data of the selected category. -->
            <?php endforeach ?>
         </tbody>
      </table>
   </div>
<?php else : ?>
   <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Message!</strong> No categorys found on the system.
   </div>
<?php endif ?>
<a href="<?= site_url('categorys/add/'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Add Category</a>