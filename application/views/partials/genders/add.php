      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <h1 class="page-header">Genders Management | Add.</h1>
         <div class="row">
            <form action="<?= site_url('genders/insert/'); ?>" method="post" id="form-insert-gender">
               <!-- field GENDER NAME -->
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Gender Name:</label>
                     <input type="text" id="gender_name_insert" name="gender_name_insert" class="form-control" required minlength="3" maxlength="50" autocomplete="off">
                  </div>
               </div>
               <!-- END field GENDER NAME -->

               <!-- field GENDER SLUG -->
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Gender Slug:</label>
                     <input type="text" id="gender_slug_insert" name="gender_slug_insert" class="form-control" required minlength="3" maxlength="50" readonly>
                  </div>
               </div>
               <!-- END field GENDER SLUG -->               

               <!-- field STATUS NAME -->
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Status:</label>
                     <select id="gender_status_insert" name="gender_status_insert" class="form-control" required>
                        <?php foreach ($get_all_status->result() as $key => $value): ?>
                           <option value="<?= $value->id_status; ?>"><?= $value->status_name; ?></option>  
                        <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <!-- END field STATUS NAME -->              

               <!-- field DATE REGISTERED GENDER -->
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Date Registered:</label>
                     <input type="text" class="form-control" value="<?= get_date_current(); ?>" disabled>
                  </div>
               </div>
               <!-- END field DATE REGISTERED GENDER -->

               <!-- field IP REGISTERED GENDER -->
               <div class="col-md-4">
                  <div class="form-group">
                     <label>IP Registered:</label>
                     <input type="text" class="form-control" value="<?= get_ip_current(); ?>" disabled>
                  </div>
               </div>
               <!-- END field IP REGISTERED GENDER -->

               <!-- field CLIENT REGISTERED GENDER -->
               <div class="col-md-12">
                  <div class="form-group">
                     <label>Client Registered:</label>
                     <textarea type="text" class="form-control txa-no-resize" disabled><?= get_agent_current(); ?></textarea>
                  </div>
               </div> 
               <!-- END field CLIENT REGISTERED GENDER -->

               <!-- buttons ACTIONS -->               
               <div class="col-md-4">
                  <button type="submit" class="btn btn-info" id="btn-insert-gender"><span class="glyphicon glyphicon-floppy-disk"></span> Save Gender</button>                  
                  <a href="<?= site_url('genders/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancel</a>
               </div>
               <!-- END buttons ACTIONS -->           
            </form>
         </div>
      </div>
   </div>
</div>