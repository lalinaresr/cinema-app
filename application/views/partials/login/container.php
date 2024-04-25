<div class="container">
    <div class="card card-container">
        <div id="icon-user-login" class="text-center my-2">
            <i style="font-size: 10em;" class="fa fa-user-circle"></i>
        </div>
        <form action="<?= site_url('auth/verify/'); ?>" class="login-form" id="form-login">
            <span id="email-re-auth" class="email-re-auth"></span>
            <input type="email" id="email" name="email" class="form-control" value="joan_sebastian@yopmail.com" placeholder="Correo electrónico" required autofocus>
            <input type="password" id="password" name="password" class="form-control" value="password" placeholder="Contraseña" required>
            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" name="remember" value="remember"> Recordarme
                </label>
            </div>
            <button type="submit" class="btn btn-lg btn-info btn-block login-btn" id="btn-login"><span class="glyphicon glyphicon-log-in"></span> Entrar</button>
        </form>
    </div>
</div>