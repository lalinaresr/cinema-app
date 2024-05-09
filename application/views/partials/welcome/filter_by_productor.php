<?php

$this->load->view('components/welcome/movies', [
	'icon' => 'globe',
	'title' => 'Películas dirigidas por "<i>' . $productor['productor_name'] . '</i>"',
	'message' => 'No se encontraron películas dirigidas por este productor'
]);