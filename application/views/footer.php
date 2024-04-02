<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<script type="text/javascript" src="<?= base_url('public/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('public/js/jquery.form.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('public/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>

<?php if (isset($scripts)) : ?>
	<?php foreach ($scripts as $script) : ?>
		<?php if (is_array($script)) : ?>
			<script type="<?= $script['type']; ?>" src="<?= $script['file']; ?>"></script>
		<?php else : ?>
			<script type="text/javascript" src="<?= $script; ?>"></script>
		<?php endif ?>
	<?php endforeach ?>
<?php endif ?>
<script type="text/javascript" src="<?= base_url('public/js/snipps/auth.js'); ?>"></script>
</body>

</html>