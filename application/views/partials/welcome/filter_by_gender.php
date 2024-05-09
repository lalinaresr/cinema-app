<?php

$this->load->view('components/welcome/movies', [
	'icon' => 'globe',
	'title' => 'Películas de "<i>' . $gender['gender_name'] . '</i>"',
	'message' => 'No se encontraron películas de este género'
]);