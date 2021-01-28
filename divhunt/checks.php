<?php

    /**
     * Check PHP Version
     */

    $version = explode('.', phpversion());

    if($version[0] < 7 || ($version[1] < 2 && $version[0] > 6) && $version[0] != 8)
    {
        DivHunt::log('DivHunt Framework requires PHP version at least 7.2 or higher.')->type('fatal')->log(); 
    }  

    /**
     * Check if framework is configured.
     */

    if(!DivHunt::isConfigured())
    {
        DivHunt::log('Please configure DivHunt PHP framework.')->type('fatal')->log(); 
    }

    /**
     * Check if addons path is writeable
     */

    if(!is_writable(DivHunt::getAddonsPath()))
    {
        DivHunt::log('Addons folder is not writeable. Please make sure to set right permisions at "' . DivHunt::getAddonsPath() . '" location.')->log(); 
    }

    /**
     * Check if logs path is writeable
     */

    if(!is_writable(DivHunt::getLogsPath()))
    {
        DivHunt::log('Logs folder is not writeable. Please make sure to set right permisions at "' . DivHunt::getLogsPath() . '" location.')->log(); 
    }