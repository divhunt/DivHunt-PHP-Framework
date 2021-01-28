<?php

    Trait RouteMethods
    {
        public static function showPaths()
        {
            DivHunt::trigger('shutdown_headers_sent_after', ['app'], function()
            {
                if(!api::get('status'))
                {
                    $paths = [];

                    foreach(self::$paths as $key => $path) 
                    { 
                        $paths[htmlspecialchars($key, ENT_QUOTES)] = htmlspecialchars($path, ENT_QUOTES);
                    } 

                    ?><script type="text/javascript">let route = {paths: <?=json_encode($paths)?>};</script><?php
                }
            });
        }

        public static function getPath($key)
        {
            if(!is_string($key))
            {
                return false;
            }

            return htmlspecialchars(self::$paths[$key] ?? false, ENT_QUOTES);
        }

        public static function setPath($key, $path)
        {
            if(!is_string($key) || !is_string($path))
            {
                return false;
            }

            self::$paths[$key] = str_replace('//', '/', '/' . ltrim(rtrim($path, '/'), '/') . '/');
        }

        public static function setMatched($match)
        {
            self::$data->matched = ($match ?? false) ? true : false;
        }

        public static function isMatched()
        {
            return self::$data->matched;
        }
        
        public static function getRoute()
        {
            return self::$data->route;
        }

        public static function var($key)
        {
            if(!is_string($key))
            {
                return false;
            }

            if($route = self::getRoute())
            {
                return $route->vars->{$key} ?? false;
            }
        }
    }