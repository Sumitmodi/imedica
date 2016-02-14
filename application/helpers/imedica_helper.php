<?php
function seoUrl($string, $separator = '-')
{
    $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';

    $special_cases = array('&' => 'and');

    $string = strtolower(trim($string));

    $string = str_replace(array_keys($special_cases), array_values($special_cases), $string);

    $string = preg_replace($accents_regex, '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));

    $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);

    $string = preg_replace("/[$separator]+/u", "$separator", $string);

    return $string;
}

    function objectToArray($d)
    {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(__FUNCTION__, $d);
        } else {
            // Return array
            return $d;
        }
    }