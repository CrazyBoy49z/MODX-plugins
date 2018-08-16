<?php

/**
 * RegScript
 * =========
 * 
 * Author: Nathanael McMillan (Inside Creative)
 * Ver: 0.0.1
 */

$reg_head = false;

if (isset($toHead)) {
    $reg_head = $toHead;
}

if (isset($src) && $reg_head != true) {
    $modx->regClientScript($src);
} else {
    $modx->regClientStartupScript($src);
}

if (isset($href)) {
    $modx->regClientCSS($href);
}

if (isset($script) && $reg_head != true) {
    $modx->regClientHTMLBlock(
        '<script>' . $script . '</script>'
    );
} else {
    $modx->regClientStartupHTMLBlock(
        '<script>' . $script . '</script>'
    );
}

if (isset($style) && $reg_head != true) {
    $modx->regClientStartupHTMLBlock(
        '<style>' . $style . '</style>'
    );
} else {
    $modx->regClientHTMLBlock(
        '<style>' . $style . '</style>'
    );
}

if (isset($html) && $reg_head != true) {
    $modx->regClientHTMLBlock($html);
} else {
    $modx->regClientStartupHTMLBlock($html);
}