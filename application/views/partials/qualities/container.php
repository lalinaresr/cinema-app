<h1 class="page-header">Catálogo de calidades.</h1>
<?php if ($get_all_qualities != FALSE) : ?>
   <table class="table table-striped table-hover table-responsive table-bordered table-condensed" id="qualities-table">
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
         <?php foreach ($get_all_qualities->result() as $key => $value) : $id_quality_encryp = cryp($value->id_quality); ?>
            <tr class="<?php echo $value->id_status == 1 ? 'success' : 'danger';  ?>">
               <td><a href='#modal-view-quality-<?= $id_quality_encryp; ?>' data-toggle="modal"><?= $id_quality_encryp; ?></a></td>
               <td><?= $value->quality_name; ?></td>
               <td>
                  <?php if ($value->id_status == 1) : ?>
                     <span class="label label-success">Activo</span>
                  <?php else : ?>
                     <span class="label label-danger">Inactivo</span>
                  <?php endif ?>
               </td>
               <td><?= get_antiquity($value->date_registered_qlt); ?></td>
               <td>
                  <a href="<?= site_url('qualities/view/') . $id_quality_encryp . '/'; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                  <a href="<?= site_url('qualities/edit/') . $id_quality_encryp . '/'; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                  <button class="btn btn-danger btn-sm btn-delete-quality" id="<?= $id_quality_encryp; ?>"><span class="glyphicon glyphicon-trash"></span></button>
               </td>
            </tr>

            <!-- This is the modal that shows the data of the selected quality. -->
            <div class="modal fade" id="modal-view-quality-<?= $id_quality_encryp; ?>">
               <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                     <div class="modal-header bg-black">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-white text-center">Calidad #<?= $id_quality_encryp; ?></h4>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <!-- field quality NAME -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Nombre:</label>
                                 <input type="text" class="form-control" value="<?= $value->quality_name; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field quality NAME -->

                           <!-- field quality SLUG -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Alias:</label>
                                 <input type="text" class="form-control" value="<?= $value->quality_slug; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field quality SLUG -->

                           <!-- field STATUS NAME -->
                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>Estatus:</label>
                                 <input type="text" class="form-control" value="<?= $value->status_name; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field STATUS NAME -->

                           <!-- field DATE REGISTERED QUALITY -->
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Fecha de registro:</label>
                                 <input type="text" class="form-control" value="<?= $value->date_registered_qlt; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field DATE REGISTERED QUALITY -->

                           <!-- field IP REGISTERED QUALITY -->
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>IP de registro:</label>
                                 <input type="text" class="form-control" value="<?= $value->ip_registered_qlt; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field IP REGISTERED QUALITY -->

                           <!-- field DATE MODIFIED QUALITY -->
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Fecha de modificación:</label>
                                 <input type="text" class="form-control" value="<?= $value->date_modified_qlt; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field DATE MODIFIED QUALITY -->

                           <!-- field IP MODIFIED QUALITY -->
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>IP de modificación:</label>
                                 <input type="text" class="form-control" value="<?= $value->ip_modified_qlt; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field IP MODIFIED QUALITY -->

                           <!-- field CLIENT REGISTERED QUALITY -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Dispositivo de registro:</label>
                                 <textarea type="text" class="form-control " disabled><?= $value->client_registered_qlt; ?></textarea>
                              </div>
                           </div>
                           <!-- END field CLIENT REGISTERED QUALITY -->

                           <!-- field CLIENT MODIFIED QUALITY -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Dispositivo de modificación:</label>
                                 <textarea type="text" class="form-control " disabled><?= $value->client_modified_qlt; ?></textarea>
                              </div>
                           </div>
                           <!-- END field CLIENT MODIFIED QUALITY -->
                        </div>
                     </div>
                     <div class="modal-footer bg-black">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- END This is the modal that shows the data of the selected quality. -->
         <?php endforeach ?>
      </tbody>
   </table>
<?php else : ?>
   <div class="alert alert-danger">
      <strong>¡Aviso!</strong> No se encontraron datos de calidades para mostrar en estos momentos.
   </div>
<?php endif ?>
<a href="<?= site_url('qualities/create'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Agregar</a>