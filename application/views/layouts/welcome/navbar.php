<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-nv1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?= site_url(); ?>"><?= constant('APP_NAME'); ?></a>
		</div>
		<div class="collapse navbar-collapse navbar-nv1-collapse">
			<?php if ($this->session->userdata('is_authorized')) : ?>
				<?php $this->load->view('components/welcome/search-form', ['position' => 'left']); ?>
				<ul class="nav navbar-nav navbar-right">
					<?php $this->load->view('components/welcome/navbar-options'); ?>
					<li><a href="<?= site_url('dashboard'); ?>" target="_blank"><span class="glyphicon glyphicon-dashboard"></span> Panel</a></li>
					<?php $this->load->view('components/dashboard/navbar-userdata'); ?>
				</ul>
			<?php else : ?>
				<?php $this->load->view('components/welcome/search-form', ['position' => 'right']); ?>
				<ul class="nav navbar-nav navbar-left">
					<?php $this->load->view('components/welcome/navbar-options'); ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</nav>

<div class="container-fluid">