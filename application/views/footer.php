<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

		<?php foreach ($js_files as $key => $js): ?>
			<script type="text/javascript" src="<?= $js; ?>"></script>
		<?php endforeach ?>
		<script type="text/javascript">
		   /* Deshabiliar el menu contextual(click derecho) */
		   //document.oncontextmenu = function(){ return false }
		</script>
	</body>
</html>