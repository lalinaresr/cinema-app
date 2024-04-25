<!-- This panel content the last connections of everybody users -->
<?php if ($get_some_sessions != FALSE) : ?>
   <div class="panel panel-warning">
      <div class="panel-heading">
         <h3 class="panel-title">Últimas conexiones</h3>
      </div>
      <div class="panel-body">
         <table class="table table-striped table-responsive">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Rol</th>
                  <th>Usuario</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($get_some_sessions->result() as $key => $value) : $id_session_fp_encryp = cryp($value->id_session); ?>
                  <?php if ($value->id_user != $this->session->userdata('id_user')) { ?>
                     <tr>
                        <td><a href='#modal-last-connections-<?= $id_session_fp_encryp; ?>' data-toggle="modal"><?= $id_session_fp_encryp; ?></a></td>
                        <td><?= $value->rol_name; ?></td>
                        <td><?= $value->user_username; ?></td>
                        <td><?= get_antiquity($value->date_registered_ses); ?></td>
                     </tr>
                     <div class="modal fade" id="modal-last-connections-<?= $id_session_fp_encryp; ?>">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header bg-black">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h4 class="modal-title text-center text-white">Sesión #<?= $id_session_fp_encryp; ?></h4>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <!-- field BROWSER USED -->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>Navegador usado:</label>
                                          <input type="text" class="form-control" value="<?= $value->session_browser_used; ?>" disabled>
                                       </div>
                                    </div>
                                    <!-- END field BROWSER USED -->
                                    <!-- field OPERATING SYSTEM USED -->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>Sis. Ope. usado:</label>
                                          <input type="text" class="form-control" value="<?= $value->session_os_used; ?>" disabled>
                                       </div>
                                    </div>
                                    <!-- END field OPERATING SYSTEM USED -->
                                    <!-- field BROWSER VERSION USED -->
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label>Versión del navegador:</label>
                                          <input type="text" class="form-control" value="<?= $value->session_browser_version; ?>" disabled>
                                       </div>
                                    </div>
                                    <!-- END field BROWSER VERSION USED -->
                                    <!-- field IP REGISTERED SESSION -->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>IP de registro:</label>
                                          <input type="text" class="form-control" value="<?= $value->ip_registered_ses; ?>" disabled>
                                       </div>
                                    </div>
                                    <!-- END field IP REGISTERED SESSION -->
                                    <!-- field DATE REGISTERED SESSION -->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>Fecha de registro:</label>
                                          <input type="text" class="form-control" value="<?= $value->date_registered_ses; ?>" disabled>
                                       </div>
                                    </div>
                                    <!-- END field DATE REGISTERED SESSION -->
                                    <!-- field CLIENT REGISTERED SESSION -->
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label>Dispositivo de registro:</label>
                                          <textarea type="text" class="form-control " disabled><?= $value->client_registered_ses; ?></textarea>
                                       </div>
                                    </div>
                                    <!-- END CLIENT REGISTERED SESSION -->
                                 </div>
                              </div>
                              <div class="modal-footer bg-black">
                                 <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php } ?>
               <?php endforeach ?>
            </tbody>
         </table>
         <a href="<?= site_url('sessions/'); ?>" class="btn btn-warning btn-block"><span class="glyphicon glyphicon-fire"></span> Ver todas</a>
      </div>
   </div>
<?php else : ?>
   <div class="alert alert-danger">
      <strong>¡Aviso!</strong> Aún no se han registrado inicios de sesión de otros usuarios.
   </div>
<?php endif ?>
<!-- END This panel content the last connections of everybody users -->