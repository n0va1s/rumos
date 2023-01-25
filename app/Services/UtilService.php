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
}
