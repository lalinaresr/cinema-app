<h1 class="page-header">Catálogo de seguidores.</h1>
<?php if ($newsletters->num_rows() > 0) : ?>
   <table class="table table-striped table-hover table-responsive table-bordered table-condensed" id="newsletters-table">
      <thead>
         <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo electrónico</th>
            <th>Fecha de registro</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($newsletters->result_array() as $key => $value) : $id_newsletter_encryp = cryp($value['id_newsletter']); ?>
            <tr class="success">
               <td><a href='#modal-view-newsletter-<?= $id_newsletter_encryp; ?>' data-toggle="modal"><?= $id_newsletter_encryp; ?></a></td>
               <td><?= $value['newsletter_name']; ?></td>
               <td><?= $value['newsletter_email']; ?></td>
               <td><?= get_antiquity($value['date_registered_nlt']); ?></td>
            </tr>

            <div class="modal fade" id="modal-view-newsletter-<?= $id_newsletter_encryp; ?>">
               <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                     <div class="modal-header bg-black">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-center text-white">Seguidor #<?= $id_newsletter_encryp; ?></h4>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <!-- field NEWSLETTER NAME -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Nombre:</label>
                                 <input type="text" class="form-control" value="<?= $value['newsletter_name']; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field NEWSLETTER NAME -->

                           <!-- field NEWSLETTER EMAIL -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Correo electrónico:</label>
                                 <input type="text" class="form-control" value="<?= $value['newsletter_email']; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field NEWSLETTER EMAIL -->

                           <!-- field IP REGISTERED NEWSLETTER -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>IP de registro:</label>
                                 <input type="text" class="form-control" value="<?= $value['ip_registered_nlt']; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field IP REGISTERED NEWSLETTER -->

                           <!-- field DATE REGISTERED NEWSLETTER -->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Fecha de registro:</label>
                                 <input type="text" class="form-control" value="<?= $value['date_registered_nlt']; ?>" disabled>
                              </div>
                           </div>
                           <!-- END field DATE REGISTERED NEWSLETTER -->

                           <!-- field CLIENT REGISTERED NEWSLETTER -->
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Dispositivo de registro:</label>
                                 <textarea type="text" class="form-control " disabled><?= $value['client_registered_nlt']; ?></textarea>
                              </div>
                           </div>
                           <!-- END CLIENT REGISTERED NEWSLETTER -->
                        </div>
                     </div>
                     <div class="modal-footer bg-black">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                     </div>
                  </div>
               </div>
            </div>
         <?php endforeach ?>
      </tbody>
   </table>
<?php else : ?>
   <div class="alert alert-danger">
      <strong>¡Aviso!</strong> No se encontraron datos de seguidores para mostrar en estos momentos.
   </div>
<?php endif ?>