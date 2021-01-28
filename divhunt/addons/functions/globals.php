<?php

    function post($name, $htmlspecialchars = true)
    {
        if(!is_string($name))
        {
            return null;
        }

        if(!isset($_POST[$name]))
        {
            return  null;
        }

        if($htmlspecialchars)
        {
            return htmlspecialchars($_POST[$name] ?? false, ENT_QUOTES);
        }

        return $_POST[$name] ?? false;
    }

    function get($name, $htmlspecialchars = true)
    {
        if(!is_string($name))
        {
            return null;
        }
        
        if(!isset($_GET[$name]))
        {
            return null;
        }

        if($htmlspecialchars)
        {
            return htmlspecialchars($_GET[$name] ?? false, ENT_QUOTES);
        }

        return $_GET[$name] ?? false;
    }