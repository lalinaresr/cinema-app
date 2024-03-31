<div class="container">
   <div class="card card-container">
      <div id="icon-user-login" class="text-center mb-10">
         <i style="font-size: 10em;" class="fa fa-user-circle"></i>
      </div>
      <form action="<?= site_url('auth/check_login/'); ?>" class="form-signin" id="form-login">
         <span id="reauth-email" class="reauth-email"></span>
         <input type="email" id="email_login" name="email_login" class="form-control" value="joan_sebastian@yopmail.com" placeholder="Email address" required autofocus>
         <input type="password" id="password_login" name="password_login" class="form-control" value="password" placeholder="Password" required>
         <div id="remember" class="checkbox">
            <label>
               <input type="checkbox" value="remember-me"> Remember me
            </label>
         </div>
         <button type="submit" class="btn btn-lg btn-info btn-block btn-signin" id="btn-login"><span class="glyphicon glyphicon-log-in"></span> Sign in</button>
      </form>
   </div>
</div>