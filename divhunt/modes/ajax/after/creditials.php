<?php

    /**
     * Validate creditials if exist.
     */

    foreach(DivHunt::ajaxGetCreditials('GET') as $key => $value)
    {
        if(!isset($_GET[$key]))
        {
            DivHunt::ajaxExit(0, 'Please provide all required creditials.');
        }

        if($_GET[$key] !== $value)
        {
            DivHunt::ajaxExit(0, 'Please provide all required creditials.');
        }
    }

    foreach(DivHunt::ajaxGetCreditials('POST') as $key => $value)
    {
        if(!isset($_POST[$key]))
        {
            DivHunt::ajaxExit(0, 'Please provide all required creditials.');
        }

        if($_POST[$key] !== $value)
        {
            DivHunt::ajaxExit(0, 'Please provide all required creditials.');
        }
    }