<form action="<?= site_url('search'); ?>" method="POST" class="navbar-form navbar-<?= $position; ?>" role="search">
    <div class="input-group">
        <input type="text" id="search_parameter" name="search_parameter" value="<?= $search_parameter ?? ''; ?>" class="form-control" style="width: 100%;" required autocomplete="off" placeholder="Buscar...">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
        </span>
    </div>
</form>