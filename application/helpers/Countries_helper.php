<?php

if (!function_exists('_countries_api_')) {
	function _countries_api_(): array
	{
		$countries = file_get_contents(__DIR__ . '/countries.json');

		return json_decode($countries)->data;
	}
}
