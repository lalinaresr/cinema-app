<h1 class="page-header">Genders Management | Edit.</h1>
<div class="row">
   <form action="<?= site_url('genders/update/'); ?>" method="post" id="form-update-gender">
      <!-- field ID GENDER -->
      <div class="col-md-12">
         <div class="form-group">
            <label>ID Gender:</label>
            <input type="text" class="form-control" value="<?= $id_gender_encryp; ?>" disabled>
            <input type="hidden" id="id_gender_update" name="id_gender_update" class="form-control" value="<?= $id_gender_encryp; ?>">
         </div>
      </div>
      <!-- field ID GENDER -->

      <!-- field GENDER NAME -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Gender Name:</label>
            <input type="text" id="gender_name_update" name="gender_name_update" class="form-control" value="<?= $edit_gender->gender_name; ?>" required minlength="3" maxlength="50" autocomplete="off">
         </div>
      </div>
      <!-- END field GENDER NAME -->

      <!-- field GENDER SLUG -->
      <div class="col-md-6">
         <div class="form-group">
            <label>Gender slug:</label>
            <input type="text" id="gender_slug_update" name="gender_slug_update" class="form-control" value="<?= $edit_gender->gender_slug; ?>" required minlength="3" maxlength="50" readonly>
         </div>
      </div>
      <!-- END field GENDER SLUG -->

      <!-- field STATUS NAME -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Status:</label>
            <select id="gender_status_update" name="gender_status_update" class="form-control" required>
               <option value="<?= $edit_gender->id_status; ?>"><?= $edit_gender->status_name; ?></option>
               <?php foreach ($get_all_status->result() as $key => $value) : ?>
                  <?php if ($value->id_status != $edit_gender->id_status) : ?>
                     <option value="<?= $value->id_status; ?>"><?= $value->status_name; ?></option>
                  <?php endif ?>
               <?php endforeach ?>
            </select>
         </div>
      </div>
      <!-- END field STATUS NAME -->

      <!-- field DATE MODIFIED GENDER -->
      <div class="col-md-4">
         <div class="form-group">
            <label>Date Modified:</label>
            <input type="text" class="form-control" value="<?= get_date_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field DATE MODIFIED GENDER -->

      <!-- field IP MODIFIED GENDER -->
      <div class="col-md-4">
         <div class="form-group">
            <label>IP Modified:</label>
            <input type="text" class="form-control" value="<?= get_ip_current(); ?>" disabled>
         </div>
      </div>
      <!-- END field IP MODIFIED GENDER -->

      <!-- field CLIENT MODIFIED GENDER -->
      <div class="col-md-12">
         <div class="form-group">
            <label>Client Modified:</label>
            <textarea type="text" class="form-control txa-no-resize" disabled><?= get_agent_current(); ?></textarea>
         </div>
      </div>
      <!-- END field CLIENT MODIFIED GENDER -->

      <!-- buttons ACTIONS -->
      <div class="col-md-4">
         <button type="submit" class="btn btn-info" id="btn-update-gender"><span class="glyphicon glyphicon-refresh"></span> Update Gender</button>
         <a href="<?= site_url('genders/'); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancel</a>
      </div>
      <!-- END buttons ACTIONS -->
   </form>
</div>