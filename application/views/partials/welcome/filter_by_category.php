<?php

$this->load->view('components/welcome/movies', [
	'icon' => 'tags',
	'title' => $category['category_name'],
	'message' => 'No se encontraron registros de este tipo'
]);