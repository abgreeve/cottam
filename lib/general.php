<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function print_object($object) {
    echo '<pre>' . print_r($object, true) . '</pre>';
}

/**
 * 
 * @param string $url  url - location starting from webbase.
 * @param string $desc  Information that goes with the url.
 * @param array $params (not required).
 * @return string  a full url.
 */
function cottam_url($url, $desc, $params) {
    $final_url = '<a href="' . $url . '">' . $desc . '</a>'; 
    return $final_url;
}
?>
