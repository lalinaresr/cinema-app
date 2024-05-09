<div class="container">
    <div class="card card-container">
        <div id="login-icon" class="text-center mt-2 mb-4">
            <i style="font-size: 10em;" class="fa fa-user-circle"></i>
        </div>
        <form action="<?= site_url('auth/verify'); ?>" id="login-form">
            <input type="email" id="email" name="email" class="form-control" value="luis_linarez@cinema.app" placeholder="Correo electrónico" required autofocus>
            <input type="password" id="password" name="password" class="form-control" value="12345678" placeholder="Contraseña" required>
            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" name="remember" value="remember"> Recordarme
                </label>
            </div>
            <button type="submit" class="btn btn-lg btn-info btn-block" id="login-btn"><span class="glyphicon glyphicon-log-in"></span> Entrar</button>
        </form>
    </div>
</div>