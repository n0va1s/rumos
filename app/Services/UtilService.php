<?php

namespace App\Services;


class UtilService
{
    public static function clearFormat(string $input)
    {
        $find = array("(", ")", "-", ".", " ", "/");
        $replace = array("", "", "", "", "", "");
        return str_replace($find, $replace, $input);

    }

    public static function clearAccent(string $input)
    {
        $find = array("à", "á", "â", "ã", "é", "ê", "ì", "í", "ò", "ó", "ô", "õ", "ú", " ");
        $replace = array("a", "a", "a", "a", "e", "e", "i", "i", "o", "o", "o", "o", "u", "");
        return mb_strtolower(
            str_replace($find, $replace, $input)
        );
    }
}
