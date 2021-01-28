<?php
    
    /**
     * Set framework config shutdown to true
     */

    DivHunt::setConfig('shutdown', true);  

    /**
     * Flush OB if mode is APP
     */

    if(DivHunt::isActiveMode('app'))
    {
        if(ob_get_level())
        {
            ob_flush();
        }
    }

    /**
     * Prevent accessing modes if framework has fatal errors.
     */

    if(DivHunt::developGetFatals())
    {
        exit;
    }

    /**
     * Run trigger shutdown_before
     */

    DivHunt::runTrigger('shutdown_before');

    /**
     * Run header triggers before mode
     */

    if(headers_sent())
    {
        DivHunt::runTrigger('shutdown_headers_sent_before');
    }
    else
    {
        DivHunt::runTrigger('shutdown_headers_not_sent_before');
    }

    /**
     * Include mode after
     */

    include 'modes/' . DivHunt::getActiveMode() . '/after/app.php';

    /**
     * Run header triggers after mode
     */

    if(headers_sent())
    {
        DivHunt::runTrigger('shutdown_headers_sent_after');
    }
    else
    {
        DivHunt::runTrigger('shutdown_headers_not_sent_after');
    }

    /**
     * Run trigger shutdown_after
     */

    DivHunt::runTrigger('shutdown_after');