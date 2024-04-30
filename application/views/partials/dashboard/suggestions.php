<?php if ($suggestions->num_rows() > 0) : ?>
   <div class="panel panel-primary">
      <div class="panel-heading">
         <h3 class="panel-title">Últimas sugerencias</h3>
      </div>
      <div class="panel-body">
         <table class="table table-bordered table-responsive">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Correo electrónico</th>
                  <th>Fecha de registro</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($suggestions->result_array() as $key => $value) : $id_suggestion_encryp = cryp($value['id_suggestion']); ?>
                  <tr>
                     <td><a href='#modal-view-suggestion-<?= $id_suggestion_encryp; ?>' data-toggle="modal"><?= $id_suggestion_encryp; ?></a></td>
                     <td><?= $value['suggestion_email']; ?></td>
                     <td><?= get_antiquity($value['date_registered_sug']); ?></td>
                  </tr>

                  <div class="modal fade" id="modal-view-suggestion-<?= $id_suggestion_encryp; ?>">
                     <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header bg-black">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title text-center text-white">Sugerencia #<?= $id_suggestion_encryp; ?></h4>
                           </div>
                           <div class="modal-body">
                              <div class="row">
                                 <!-- field SUGGESTION NAME -->
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Nombre: </label>
                                       <input type="text" class="form-control" value="<?= $value['suggestion_name']; ?>" disabled>
                                    </div>
                                 </div>
                                 <!-- END field SUGGESTION NAME -->

                                 <!-- field SUGGESTION EMAIL -->
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Correo electrónico: </label>
                                       <input type="text" class="form-control" value="<?= $value['suggestion_email']; ?>" disabled>
                                    </div>
                                 </div>
                                 <!-- END field SUGGESTION EMAIL -->

                                 <!-- field SUGGESTION KEY -->
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>UUID:</label>
                                       <input type="text" class="form-control" value="<?= $value['suggestion_key']; ?>" disabled>
                                    </div>
                                 </div>
                                 <!-- END field SUGGESTION KEY -->

                                 <!-- field SUGGESTION DESCRIPTION -->
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Descripción:</label>
                                       <textarea type="text" class="form-control " disabled><?= $value['suggestion_description']; ?></textarea>
                                    </div>
                                 </div>
                                 <!-- END field SUGGESTION DESCRIPTION -->

                                 <!-- field IP REGISTERED SUGGESTION -->
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>IP de registro:</label>
                                       <input type="text" class="form-control" value="<?= $value['ip_registered_sug']; ?>" disabled>
                                    </div>
                                 </div>
                                 <!-- END field IP REGISTERED SUGGESTION -->

                                 <!-- field DATE REGISTERED SUGGESTION -->
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Fecha de registro:</label>
                                       <input type="text" class="form-control" value="<?= $value['date_registered_sug']; ?>" disabled>
                                    </div>
                                 </div>
                                 <!-- END field DATE REGISTERED SUGGESTION -->

                                 <!-- field CLIENT REGISTERED SUGGESTION -->
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Dispositivo de registro:</label>
                                       <textarea type="text" class="form-control " disabled><?= $value['client_registered_sug']; ?></textarea>
                                    </div>
                                 </div>
                                 <!-- END CLIENT REGISTERED SUGGESTION -->
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
         <a href="<?= site_url('suggestions/'); ?>" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-fire"></span> Ver todas</a>
      </div>
   </div>
<?php else : ?>
   <div class="alert alert-danger">
      <strong>¡Aviso!</strong> No se encontraron datos de sugerencias para mostrar en estos momentos.
   </div>
<?php endif ?>