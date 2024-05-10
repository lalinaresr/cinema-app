<?php

if (!function_exists('is_active')) {
	function is_active(string $route): string
	{
		$CI = &get_instance();
		return $CI->router->fetch_class() == $route ? 'class="active"' : '';
	}
}
