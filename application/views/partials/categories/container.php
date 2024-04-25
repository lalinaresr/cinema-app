<h1 class="page-header">Catálogo de categorías.</h1>
<?php if ($get_all_categories != FALSE) : ?>
   <table class="table table-striped table-hover table-responsive table-bordered table-condensed" id="categories-table">
      <thead>
         <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Estatus</th>
            <th>Fecha de registro</th>
            <th></th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($get_all_categories->result() as $key => $value) : $id_category_encryp = cryp($value->id_category); ?>
            <tr class="<?php echo $value->id_status == 1 ? 'success' : 'danger';  ?>">
               <td><a href='#modal-view-category-<?= $id_category_encryp; ?>' data-toggle="modal"><?= $id_category_encryp; ?></a></td>
               <td><?= $value->category_name; ?></td>
               <td>
                  <?php if ($value->id_status == 1) : ?>
                     <span class="label label-success">Activo</span>
                  <?php else : ?>
                     <span class="label label-danger">Inactivo</span>
                  <?php endif ?>
               </td>
               <td><?= get_antiquity($value->date_registered_cat); ?></td>
               <td>
                  <a href="<?= site_url('categories/view/') . $id_category_encryp . '/'; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                  <a href="<?= site_url('categories/edit/') . $id_category_encryp . '/'; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                  <button class="btn btn-danger btn-sm btn-delete-category" id="<?= $id_category_encryp; ?>"><span class="glyphicon glyphicon-trash"></span></button>
               </td>
            </tr>

            <!-- This is the modal that shows the data of the selected category. -->
            <div class="modal fade" id="modal-view-category-<?= $id_category_encryp; ?>">
               <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                     <div class="modal-header bg-black">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-white text-center">Categoría #<?= $id_category_encryp; ?></h4>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <!-- field CATEGORY NAME -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Nombre:</label>
                                 <input type="text" class="form-control" value="<?= $value->category_name; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field CATEGORY NAME -->

                           <!-- field CATEGORY SLUG -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Alias:</label>
                                 <input type="text" class="form-control" value="<?= $value->category_slug; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field CATEGORY SLUG -->

                           <!-- field STATUS NAME -->
                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>Estatus:</label>
                                 <input type="text" class="form-control" value="<?= $value->status_name; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field STATUS NAME -->

                           <!-- field DATE REGISTERED CATEGORY -->
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Fecha de registro:</label>
                                 <input type="text" class="form-control" value="<?= $value->date_registered_cat; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field DATE REGISTERED CATEGORY -->

                           <!-- field IP REGISTERED CATEGORY -->
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>IP de registro:</label>
                                 <input type="text" class="form-control" value="<?= $value->ip_registered_cat; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field IP REGISTERED CATEGORY -->

                           <!-- field DATE MODIFIED CATEGORY -->
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Fecha de modificación:</label>
                                 <input type="text" class="form-control" value="<?= $value->date_modified_cat; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field DATE MODIFIED CATEGORY -->

                           <!-- field IP MODIFIED CATEGORY -->
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>IP de modificación:</label>
                                 <input type="text" class="form-control" value="<?= $value->ip_modified_cat; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field IP MODIFIED CATEGORY -->

                           <!-- field CLIENT REGISTERED CATEGORY -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Dispositivo de registro:</label>
                                 <textarea type="text" class="form-control " disabled><?= $value->client_registered_cat; ?></textarea>
                              </div>
                           </div>
                           <!-- END field CLIENT REGISTERED CATEGORY -->

                           <!-- field CLIENT MODIFIED CATEGORY -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Dispositivo de modificación:</label>
                                 <textarea type="text" class="form-control " disabled><?= $value->client_modified_cat; ?></textarea>
                              </div>
                           </div>
                           <!-- END field CLIENT MODIFIED CATEGORY -->
                        </div>
                     </div>
                     <div class="modal-footer bg-black">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- END This is the modal that shows the data of the selected category. -->
         <?php endforeach ?>
      </tbody>
   </table>
<?php else : ?>
   <div class="alert alert-danger">
      <strong>¡Aviso!</strong> No se encontraron datos de categorías para mostrar en estos momentos.
   </div>
<?php endif ?>
<a href="<?= site_url('categories/create'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Agregar</a>