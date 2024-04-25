<h1 class="page-header">Catálogo de productores.</h1>
<?php if ($get_all_productors != FALSE) : ?>
   <table class="table table-striped table-hover table-responsive table-bordered table-condensed" id="productors-table">
      <thead>
         <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Logo</th>
            <th>Estatus</th>
            <th>Fecha de registro</th>
            <th></th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($get_all_productors->result() as $key => $value) : $id_productor_encryp = cryp($value->id_productor); ?>
            <tr class="<?php echo $value->id_status == 1 ? 'success' : 'danger';  ?>">
               <td><a href='#modal-view-productor-<?= $id_productor_encryp; ?>' data-toggle="modal"><?= $id_productor_encryp; ?></a></td>
               <td><?= $value->productor_name; ?></td>
               <td><a href='#modal-view-logo-productor-<?= $id_productor_encryp; ?>' data-toggle="modal"><?= $value->id_productor . '_logo.jpg'; ?></a></td>
               <td>
                  <?php if ($value->id_status == 1) : ?>
                     <span class="label label-success">Activo</span>
                  <?php else : ?>
                     <span class="label label-danger">Inactivo</span>
                  <?php endif ?>
               </td>
               <td><?= get_antiquity($value->date_registered_pro); ?></td>
               <td>
                  <a href="<?= site_url('productors/view/') . $id_productor_encryp . '/'; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                  <a href="<?= site_url('productors/edit/') . $id_productor_encryp . '/'; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                  <button class="btn btn-danger btn-sm btn-delete-productor" id="<?= $id_productor_encryp; ?>"><span class="glyphicon glyphicon-trash"></span></button>
               </td>
            </tr>

            <!-- This is the modal that shows the image logo of the productors. -->
            <div class="modal fade" id="modal-view-logo-productor-<?= $id_productor_encryp; ?>">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header bg-black">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-center text-white">Productor #<?= $id_productor_encryp; ?></h4>
                     </div>
                     <div class="modal-body">
                        <?php if (strcmp($value->productor_image_logo, 'NO-IMAGE') == 0) : ?>
                           <img src="<?= encryp_image_base64(base_url() . 'storage/images/productors/default.png'); ?>" class="img-rounded img-responsive" style="width: 100%; height: 100%;">
                        <?php else : ?>
                           <img src="<?= encryp_image_base64(base_url() . $value->productor_image_logo); ?>" class="img-rounded img-responsive" style="width: 100%; height: 100%;">
                        <?php endif ?>
                     </div>
                     <div class="modal-footer bg-black">
                        <a href="<?= site_url('productors/edit_logo/') . $id_productor_encryp . '/'; ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Editar logo</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- END This is the modal that shows the image logo of the productors. -->

            <!-- This is the modal that shows the data of the selected productor. -->
            <div class="modal fade" id="modal-view-productor-<?= $id_productor_encryp; ?>">
               <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                     <div class="modal-header bg-black">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-white text-center">Productor #<?= $id_productor_encryp; ?></h4>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <!-- field PRODUCTOR NAME -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Nombre:</label>
                                 <input type="text" class="form-control" value="<?= $value->productor_name; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field PRODUCTOR NAME -->

                           <!-- field PRODUCTOR SLUG -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Alias:</label>
                                 <input type="text" class="form-control" value="<?= $value->productor_slug; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field PRODUCTOR SLUG -->

                           <!-- field STATUS NAME -->
                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>Estatus:</label>
                                 <input type="text" class="form-control" value="<?= $value->status_name; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field STATUS NAME -->

                           <!-- field DATE REGISTERED PRODUCTOR -->
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Fecha de registro:</label>
                                 <input type="text" class="form-control" value="<?= $value->date_registered_pro; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field DATE REGISTERED PRODUCTOR -->

                           <!-- field IP REGISTERED PRODUCTOR -->
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>IP de registro:</label>
                                 <input type="text" class="form-control" value="<?= $value->ip_registered_pro; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field IP REGISTERED PRODUCTOR -->

                           <!-- field DATE MODIFIED PRODUCTOR -->
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Fecha de modificación:</label>
                                 <input type="text" class="form-control" value="<?= $value->date_modified_pro; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field DATE MODIFIED PRODUCTOR -->

                           <!-- field IP MODIFIED PRODUCTOR -->
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>IP de modificación:</label>
                                 <input type="text" class="form-control" value="<?= $value->ip_modified_pro; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field IP MODIFIED PRODUCTOR -->

                           <!-- field CLIENT REGISTERED PRODUCTOR -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Dispositivo de registro:</label>
                                 <textarea type="text" class="form-control " disabled><?= $value->client_registered_pro; ?></textarea>
                              </div>
                           </div>
                           <!-- END field CLIENT REGISTERED PRODUCTOR -->

                           <!-- field CLIENT MODIFIED PRODUCTOR -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Dispositivo de modificación:</label>
                                 <textarea type="text" class="form-control " disabled><?= $value->client_modified_pro; ?></textarea>
                              </div>
                           </div>
                           <!-- END field CLIENT MODIFIED PRODUCTOR -->
                        </div>
                     </div>
                     <div class="modal-footer bg-black">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- END This is the modal that shows the data of the selected productor. -->
         <?php endforeach ?>
      </tbody>
   </table>
<?php else : ?>
   <div class="alert alert-danger">
      <strong>¡Aviso!</strong> No se encontraron datos de productores para mostrar en estos momentos.
   </div>
<?php endif ?>
<a href="<?= site_url('productors/create'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Agregar</a>