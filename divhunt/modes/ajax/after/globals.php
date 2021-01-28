<?php

    /**
     * Set globals
     */

    foreach($GLOBALS as $key => $val)
    {
        if(!in_array($key, ['_GET', '_POST', '_COOKIE', '_FILES', '_SERVER', 'GLOBALS', '']))
        {
            ${$key} = $val;
        }
    }

    