<?php

$this->load->view('components/welcome/carousel', [
    'icon' => 'fire',
    'title' => 'Películas más nuevas',
    'carousel_id' => 'newest-carousel',
    'data' => $newest_movies
]);
