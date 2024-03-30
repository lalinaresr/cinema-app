<div class="container">
   <div class="card card-container">
      <h1 class="tx-100 center-block text-center" id="icon-user-login"><i class="fa fa-user-circle" aria-hidden="true"></i></h1>
      <p id="profile-name" class="profile-name-card"></p>
      <form action="<?= site_url('auth/check_login/'); ?>" class="form-signin" id="form-login">
         <span id="reauth-email" class="reauth-email"></span>
         <input type="email" id="email_login" name="email_login" class="form-control" value="joan_sebastian@yopmail.com" placeholder="Email address" required autofocus>
         <input type="password" id="password_login" name="password_login" class="form-control" value="password" placeholder="Password" required>
         <div id="remember" class="checkbox">
            <label>
               <input type="checkbox" value="remember-me"> Remember me 
            </label>
         </div>
         <button type="submit" class="btn btn-lg btn-info btn-block btn-signin" id="btn-login">Sign in</button>
      </form>
      <!-- <a href="#" class="forgot-password">Forgot the password?</a> -->
   </div>
</div>