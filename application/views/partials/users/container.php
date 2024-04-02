<h1 class="page-header">Catálogo de usuarios.</h1>
<?php if ($get_all_users != FALSE) : ?>
   <div id="buttons-exports-users">
      <div class="row" id="row_buttons_users"></div>
      <table class="table table-striped table-hover table-responsive table-bordered table-condensed" id="table-users">
         <thead>
            <tr>
               <th>ID</th>
               <th>Rol</th>
               <th>Correo electrónico</th>
               <th>Avatar</th>
               <th>Estatus</th>
               <th>Fecha de registro</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($get_all_users->result() as $key => $value) : $id_user_encryp = cryp($value->id_user); ?>
               <tr class="<?php echo $value->id_status == 1 ? 'success' : 'danger';  ?>">
                  <td><a href='#modal-view-user-<?= $id_user_encryp; ?>' data-toggle="modal"><?= $id_user_encryp; ?></a></td>
                  <td><?= $value->rol_name; ?></td>
                  <td><?= $value->user_email; ?></td>
                  <td><a href='#modal-view-avatar-user-<?= $id_user_encryp; ?>' data-toggle="modal"><?= $value->id_user . '_avatar.jpg'; ?></a></td>
                  <td>
                     <?php if ($value->id_status == 1) : ?>
                        <span class="label label-success">Activo</span>
                     <?php else : ?>
                        <span class="label label-danger">Inactivo</span>
                     <?php endif ?>
                  </td>
                  <td><?= get_antiquity($value->date_registered_usr); ?></td>
                  <td>
                     <a href="<?= site_url('users/view/') . $id_user_encryp . '/'; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                     <a href="<?= site_url('users/edit/') . $id_user_encryp . '/'; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                     <?php if ($value->id_user != $this->session->userdata('id_user')) { ?>
                        <button class="btn btn-danger btn-sm btn-delete-user" id="<?= $id_user_encryp; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                     <?php } ?>
                  </td>
               </tr>

               <!-- This is the modal that shows the profile image of the user. -->
               <div class="modal fade" id="modal-view-avatar-user-<?= $id_user_encryp; ?>">
                  <div class="modal-dialog modal-sm">
                     <div class="modal-content">
                        <div class="modal-header bg-black">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           <h4 class="modal-title text-center tx-white">Usuario #<?= $id_user_encryp; ?></h4>
                        </div>
                        <div class="modal-body">
                           <?php if (strcmp($value->user_avatar, 'NO-IMAGE') == 0) : ?>
                              <img src="<?= encryp_image_base64(base_url() . 'storage/images/users/default.png'); ?>" class="img-rounded img-responsive center-block">
                           <?php else : ?>
                              <img src="<?= encryp_image_base64(base_url() . $value->user_avatar); ?>" class="img-rounded img-responsive center-block">
                           <?php endif ?>
                        </div>
                        <div class="modal-footer bg-black">
                           <?php if ($value->id_user == $this->session->userdata('id_user')) : ?>
                              <a href="<?= site_url('users/edit_avatar/') . $id_user_encryp . '/'; ?>" class="btn btn-info"><span class="glyphicon glyphicon-new-window"></span> Editar avatar</a>
                           <?php endif ?>
                           <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END This is the modal that shows the profile image of the user. -->

               <!-- This is the modal that shows the data of the selected user. -->
               <div class="modal fade" id="modal-view-user-<?= $id_user_encryp; ?>">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header bg-black">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           <h4 class="modal-title tx-white text-center">Usuario #<?= $id_user_encryp; ?></h4>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <!-- field FIRSTNAME -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Nombre(s):</label>
                                    <input type="text" class="form-control" value="<?= $value->contact_firstname; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field FIRSTNAME -->

                              <!-- field LASTNAME -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Apellido(s):</label>
                                    <input type="text" class="form-control" value="<?= $value->contact_lastname; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field LASTNAME -->

                              <!-- field SEX -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Sexo:</label>
                                    <input type="text" class="form-control" value="<?= $value->contact_sex; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field SEX -->

                              <!-- field DATE BIRTHDAY -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Fecha de nacimiento:</label>
                                    <div class="input-group date">
                                       <input type="text" class="form-control" value="<?= $value->contact_date_birthday; ?>" disabled>
                                       <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                              <!-- END field DATE BIRTHDAY -->

                              <!-- field AGE EXACTLY -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Edad exacta:</label>
                                    <input type="text" class="form-control" value="<?= get_age_exactly($value->contact_date_birthday, 'ALL'); ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field AGE EXACTLY -->

                              <!-- field ROL NAME -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Rol:</label>
                                    <input type="text" class="form-control" value="<?= $value->rol_name; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field ROL NAME -->

                              <!-- field STATUS NAME -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Estatus:</label>
                                    <input type="text" class="form-control" value="<?= $value->status_name; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field STATUS NAME -->

                              <!-- field USERNAME -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Usuario:</label>
                                    <input type="text" class="form-control" value="<?= $value->user_username; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field USERNAME -->

                              <!-- field PASSWORD -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Contraseña:</label>
                                    <input type="password" class="form-control" value="<?= $value->user_password; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field PASSWORD -->

                              <!-- field EMAIL ADDRESS -->
                              <div class="col-md-8">
                                 <div class="form-group">
                                    <label>Correo electrónico:</label>
                                    <input type="email" class="form-control" value="<?= $value->user_email; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field EMAIL ADDRESS -->

                              <!-- field DATE REGISTERED USER -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Fecha de registro:</label>
                                    <input type="text" class="form-control" value="<?= $value->date_registered_usr; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field DATE REGISTERED USER -->

                              <!-- field IP REGISTERED USER -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>IP de registro:</label>
                                    <input type="text" class="form-control" value="<?= $value->ip_registered_usr; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field IP REGISTERED USER -->

                              <!-- field DATE MODIFIED USER -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Fecha de modificación:</label>
                                    <input type="text" class="form-control" value="<?= $value->date_modified_usr; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field DATE MODIFIED USER -->

                              <!-- field IP MODIFIED USER -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>IP de modificación:</label>
                                    <input type="text" class="form-control" value="<?= $value->ip_modified_usr; ?>" disabled>
                                 </div>
                              </div>
                              <!-- END field IP MODIFIED USER -->

                              <!-- field CLIENT REGISTERED USER -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Dispositivo de registro:</label>
                                    <textarea type="text" class="form-control txa-no-resize" disabled><?= $value->client_registered_usr; ?></textarea>
                                 </div>
                              </div>
                              <!-- END field CLIENT REGISTERED USER -->

                              <!-- field CLIENT MODIFIED USER -->
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Dispositivo de modificación:</label>
                                    <textarea type="text" class="form-control txa-no-resize" disabled><?= $value->client_modified_usr; ?></textarea>
                                 </div>
                              </div>
                              <!-- END field CLIENT MODIFIED USER -->
                           </div>
                        </div>
                        <div class="modal-footer bg-black">
                           <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END This is the modal that shows the data of the selected user. -->
            <?php endforeach ?>
         </tbody>
      </table>
   </div>
<?php else : ?>
   <div class="alert alert-danger">
      <strong>¡Aviso!</strong> No se encontraron datos de usuarios para mostrar en estos momentos.
   </div>
<?php endif ?>
<a href="<?= site_url('users/add/'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Agregar</a>