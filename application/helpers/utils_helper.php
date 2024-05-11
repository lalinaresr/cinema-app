<?php

if (!function_exists('encrypt')) {
    function encrypt(int $id): string
    {
        $numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $letters = ['a', 'b', 'c', 'l', 'm', 'n', 'o', 'x', 'y', 'z'];
        $text = '1234567890defghijkpqrstuvw';
        $length = 8;
        $pre = $end = '';

        $position = strlen($text) - 1;

        for ($i = 0; $i < $length; $i++) {
            $pre .= substr($text, rand(0, $position), 1);
            $end .= substr($text, rand(0, $position), 1);
        }

        $encrypt = $pre . str_replace($numbers, $letters, $id) . $end;

        return $encrypt;
    }
}

if (!function_exists('decrypt')) {
    function decrypt(string $id): int
    {
        $numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $letters = ['a', 'b', 'c', 'l', 'm', 'n', 'o', 'x', 'y', 'z'];
        $decrypt = str_replace($letters, $numbers, substr($id, 8, -8));

        return $decrypt;
    }
}

if (!function_exists('remove_accents')) {
    function remove_accents(string $text): string
    {
        return str_replace(
            [
                'á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä',
                'é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë',
                'í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î',
                'ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô',
                'ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü',
                'ñ', 'Ñ', 'ç', 'Ç'
            ],
            [
                'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A',
                'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E',
                'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I',
                'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O',
                'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U',
                'n', 'N', 'c', 'C'
            ],
            $text
        );
    }
}

if (!function_exists('get_current_ip')) {
    function get_current_ip(): string
    {
        $CI = &get_instance();
        return $CI->input->ip_address();
    }
}

if (!function_exists('get_current_date')) {
    function get_current_date(): string
    {
        return date('Y-m-d H:i:s');
    }
}

if (!function_exists('get_current_agent')) {
    function get_current_agent(): string
    {
        $CI = &get_instance();
        return $CI->agent->agent_string();
    }
}
