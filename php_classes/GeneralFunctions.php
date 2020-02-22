<?php

/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 8/4/2019
 * Time: 1:13 PM
 */
class GeneralFunctions
{
    public static function cleanStringFromSpecialCharacters($string) {
        $string = str_replace(' ', '-', strtolower($string)); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
}