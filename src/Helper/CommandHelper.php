<?php

declare(strict_types=1);

namespace App\Helper;

class CommandHelper
{
    /**
     * Function that extracts the number from a given string
     *
     * @param string $string
     */
    public static function getNumberpart($string): float
    {
        // we strip all , from thousands
        $string = str_replace(',', '', $string);
        preg_match('!\d+\.*\d*!', $string, $matches);
        return floatval($matches[0]);
    }

}
