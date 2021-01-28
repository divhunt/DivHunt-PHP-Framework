<?php

    /**
     * Load block file
     * 
     * This code will include block file, hook and mode, css & js files based on mode.
     */

    $_block = block::useGetLoad();

    if(!$_block->isLoaded())
    {
        DivHunt::log('There was problem loading block.')->type('warning')->scheme('bt2')->show(true)->log();
    }
    else
    {
        if(file_exists($_block->getPath() . 'mode/' . DivHunt::getActiveMode() . '/app.php'))
        {
            include $_block->getPath() . 'mode/' . DivHunt::getActiveMode() . '/app.php';
        }

        if(file_exists($_block->getPath() . 'hook/run/app.php'))
        {
            include $_block->getPath() . 'hook/run/app.php';
        }

        switch(DivHunt::getActiveMode()) 
        {
            case 'app':
                include 'mode/app.php';
                break;

            case 'ajax':
                include 'mode/ajax.php';
                break;

            case 'docs':
                include 'mode/docs.php';
                break;
            
            case 'spa':
                include 'mode/spa.php';
                break;

            default:
                include 'empty.php';
                break;
        }
    }