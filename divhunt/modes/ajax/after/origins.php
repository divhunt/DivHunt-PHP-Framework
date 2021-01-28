<?php

    /**
     * Check if origin exist.
     */

    $origins = DivHunt::ajaxGetOrigins();
    $origin  = DivHunt::getHost();

    if(!in_array('*', $origins))
    {
        if(!in_array($origin, $origins))
        {
            header('HTTP/2.0 403 Forbidden');
            exit;
        }

        header('Access-Control-Allow-Origin: ' . $origin);
    }

    header('Content-type: application/json');