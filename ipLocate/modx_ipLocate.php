<?php

/**
 * IP Locate 
 * =========
 * 
 * Locate the users GEO location based on their IP Address
 * 
 * Options 
 * -------
 * Set locate to 
 *  request
 *	status
 *	delay
 *	credit
 *	city
 *	region
 *	regionCode
 *	regionName
 *	areaCode
 *	dmaCode
 *	countryCode
 *	countryName
 *	inEU
 *	euVATrate
 *	continentCode
 *	continentName
 *	latitude
 *	longitude
 *	locationAccuracyRadius
 *	timezone
 *	currencyCode
 *	currencySymbol
 *	currencySymbol_UTF8
 *	currencyConverter
 *
 * Author: Nathanael McMillan (Inside Creative)
 * Ver: 0.0.1
 */

$locate = $modx->getOption('locate', $scriptProperties, 'countryName');
$debug = $modx->getOption('debug', $scriptProperties, false);
$toPlace = $modx->getOption('toPlace', $scriptProperties, false);

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

if ($toPlace) {
    $modx->setPlaceholder($locate, $locationArray['geoplugin_' . $locate]);
    return;
}

if ($debug) {
    return '<pre>' . print_r($locationArray, true) . '</pre>';
} else {
    return $locationArray['geoplugin_' . $locate];
}
    
    
    
    
    
    