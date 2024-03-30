<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="<?= SITE_AUTHOR; ?>">
		<title><?= $page_title; ?></title>
		<?php foreach ($css_files as $key => $css): ?>
			<link rel="stylesheet" type="text/css" href="<?= $css; ?>">
		<?php endforeach ?>
	</head>
	<body>

	<!--<div class="embed-responsive embed-responsive-4by3">
		<iframe class="embed-responsive-item" src="https://hqq.tv/player/embed_player.php?vid=271274207278210243239234206262213233194271217261258&autoplay=no"></iframe>
	</div>-->



