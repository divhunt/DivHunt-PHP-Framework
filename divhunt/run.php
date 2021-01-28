<?php

    /**
     * Detect framework shutdown and run triggers
     */

    register_shutdown_function(function()
    {
        include 'shutdown.php';
    });

    /**
     * Check permissions and missing folders/files
     */

    include 'checks.php';

    /**
     * Include helper functions
     */

    include 'addons/functions/app.php';

    /**
     * Check if ob needs clean
     */

    if(!DivHunt::isActiveMode('app'))
    {
        while(ob_get_level() > 0)
        {
            ob_end_clean();
        }
    }

    /**
     * Run framework mode before
     */

    include 'modes/' . DivHunt::getActiveMode() . '/before/app.php';    