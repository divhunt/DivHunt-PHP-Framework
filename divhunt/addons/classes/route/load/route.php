<?php

    /**
     * Load Route files
     * 
     * Including this file will load all files that were specified 
     * through callback funciton.
     */

    if(!$route = route::getRoute())
    {
        divhunt::log('There is no route to load.')->scheme('bt2')->log();
    }

    if(!count($route->load))
    {
        divhunt::log('Route does not have any load specified.')->scheme('bt2')->log();
    }

    foreach($route->load as $load)
    {
        if($route->method === 'AJAX')
        {
            DivHunt::ajaxAddFile($load['path']);
        }
        else
        {
            if(file_exists($load['path']))
            {
                if($load['view'])
                {
                    include $load['path'];
                    include rtrim($load['path'], 'app.php') . 'view.php';
                }
                else
                {
                    include $load['path'];
                }
            }
            else
            {
                divhunt::log('Load could not be found at: ' . $load['path'])->type('warning')->show(true)->scheme('bt2')->log();
            }
        }   
    }