<nav class="navbar navbar-inverse navbar-dashboard navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand navbar-title" href="<?= site_url('dashboard'); ?>"><?= constant('APP_NAME'); ?></a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav visible-xs">
                <?php $this->load->view('components/dashboard/navbar-options'); ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= site_url(); ?>" target="_blank"><span class="glyphicon glyphicon-globe"></span> Ver sitio</a></li>
                <?php $this->load->view('components/dashboard/navbar-userdata'); ?>
            </ul>
        </div>
    </div>
</nav>