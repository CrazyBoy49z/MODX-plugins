<?php

/**
 * IP Locate 
 * ========= 
 * 
 * Locate the users GEO location based on their IP Address
 * 
 * Author: Nathanael McMillan (Inside Creative)
 * Ver: 0.0.2
 */

$locate = $modx->getOption('locate', $scriptProperties, 'countryName');
$debug = $modx->getOption('debug', $scriptProperties, false);
$toPlace = $modx->getOption('toPlace', $scriptProperties, false);
$prefix = $modx->getOption('prefix', $scriptProperties, 'ip');

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = '';
    return $ipaddress;
}

$locationArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . get_client_ip()), true);
    
    // Check if $locate contains multpile 
if (strpos($locate, '||') === false) {

    if ($toPlace) {
        $modx->setPlaceholder($locate, $locationArray['geoplugin_' . $locate]);

    } else {
        if ($debug) {
            echo '<pre>' . print_r($locationArray, true) . '</pre>';
        }

        return $locationArray['geoplugin_' . $locate];
    }

} else {

    $requests = explode('||', $locate);
    $locateArray = array();

    foreach ($requests as $requestName) {
        $locateArray[$requestName] = $locationArray['geoplugin_' . $requestName];
    }

    $modx->setPlaceholders($locateArray, $prefix . '.');
}

return;