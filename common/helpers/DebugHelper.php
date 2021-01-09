<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 09.01.2021
 * Time: 19:04
 */

namespace common\helpers;


class DebugHelper
{
    public static function printSingleObject($array, $die = true)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
        if ($die) die();
    }
}