<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<script type="text/javascript" src="<?= base_url('public/js/libs/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('public/js/libs/jquery.form.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('public/js/libs/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('public/js/libs/sweetalert2.min.js'); ?>"></script>

<?php if (isset($scripts)) : ?>
	<?php foreach ($scripts as $script) : ?>
		<?php if (is_array($script)) : ?>
			<script type="<?= $script['type']; ?>" src="<?= $script['src']; ?>"></script>
		<?php else : ?>
			<script type="text/javascript" src="<?= $script; ?>"></script>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
<script type="module" src="<?= base_url('public/js/auth.js'); ?>"></script>
</body>

</html>