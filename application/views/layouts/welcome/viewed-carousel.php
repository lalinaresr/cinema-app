<?php

$this->load->view('components/welcome/carousel', [
    'icon' => 'star-empty',
    'title' => 'Películas más vistas',
    'carousel_id' => 'viewed-carousel',
    'data' => $viewed_movies
]);
