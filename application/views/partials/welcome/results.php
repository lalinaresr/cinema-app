<?php

$this->load->view('components/welcome/movies', [
	'icon' => 'search',
	'title' => 'Resultados de su búsqueda "<i>' . $search_parameter . '</i>"',
	'message' => 'No se encontraron películas con estos parámetros de búsqueda'
]);