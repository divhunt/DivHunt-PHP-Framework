<?php

    Trait DivHuntMethodsConfigure
    {
        // Main

            public static function isConfigured() 
            {
                return (self::getConfig('path')) ? true : false;
            }

            public static function isDevelop() 
            {
                return self::getConfig('develop');
            }

            public static function getPassword() 
            {
                return self::getConfig('password');
            }

            public static function inShutdown() 
            {
                return self::getConfig('shutdown');
            }

        // Paths

            public static function getPath() 
            {
                return self::getConfig('path');
            }

            public static function getAddonsPath() 
            {
                return self::getPath() . 'divhunt/addons/';
            }

            public static function getLogsPath() 
            {
                return self::getAddonsPath() . 'logs/';
            }

            public static function getClassesPath() 
            {
                return self::getAddonsPath() . 'classes/';
            }

            public static function getBlocksPath() 
            {
                return self::getAddonsPath() . 'blocks/';
            }

            public static function getPublicPath() 
            {
                return rtrim(dirname($_SERVER['SCRIPT_FILENAME']), '/') . '/';
            }

        // Logging

            public static function canLogErrors() 
            {
                return self::getConfig('logging/errors');
            }

            public static function canLogWarnings() 
            {
                return self::getConfig('logging/warnings');
            }

            public static function canLogNotices() 
            {
                return self::getConfig('logging/notices');
            }

        // Timing

            public static function isTimingEnabled()
            {
                return self::getConfig('timing/enabled');
            }

            public static function canShowTiming()
            {
                return self::getConfig('timing/show');
            }

            public static function getTimingLimit()
            {
                return self::getConfig('timing/limit');
            }

            public static function getTimingStart()
            {
                return self::getConfig('timing/start');
            } 

            public static function getTimingEnd()
            {
                return number_format((float)(microtime(1) - DivHunt::getTimingStart()) * 1000, 1, '.', '');
            }    

        // Redirect

            public static function reload($url)
            {
                if(DivHunt::isActiveMode(['app', 'develop', 'docs']))
                {
                    if(headers_sent())
                    {
                        echo '<a href="' . htmlspecialchars($url, ENT_QUOTES) . '">Please click here to be redirected.</a>';
                    }
                    else
                    {
                        header('Location: ' . $url); 
                    }
                }
                else
                {
                    echo json_encode(['reload' => $url]); 
                }

                exit;
            } 
    }