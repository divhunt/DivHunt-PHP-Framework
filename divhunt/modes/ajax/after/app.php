<?php

    /**
     * Load type: Ajax - After
     * Default load type which renders html into webpage
     *
     * @see https://divhunt.com/docs
     */

    ob_get_clean();

    include 'origins.php';
    include 'creditials.php';
    include 'globals.php';

    foreach(DivHunt::ajaxGetFiles() as $file)
    {
        include $file;
    }

    DivHunt::ajaxExit(0, 'There is no matching route for your request.');