<?php

    Trait DivHuntMethodsModes
    {
        public static function getActiveMode() 
        {
            return self::$mode;
        }

        public static function getModes() 
        {
            return self::$modes;
        }

        public static function modeExist($mode)
        {
            if(!is_string($mode))
            {
                return false;
            }

            $mode = strtolower($mode);

            if(in_array($mode, self::getModes()))
            {
                return true;
            }
        }

        public static function isActiveMode($mode, $callback = false) 
        {
            if(is_string($mode))
            {
                if($mode != self::getActiveMode())
                {
                    return false;
                }

                if(is_callable($callback))
                {
                    $callback();
                }

                return true;
            }


            if(is_array($mode))
            {
                $exist = false;

                foreach($mode as $m)
                {
                    if($m == self::getActiveMode())
                    {
                        $exist = true;
                    }
                }

                if($exist)
                {
                    if(is_callable($callback))
                    {
                        $callback();
                    }

                    return true;
                }
            }
        }

        public static function getModeData($mode = false) 
        {
            if(!$mode)
            {
                return self::${self::getActiveMode()};
            }

            if(!self::modeExist($mode))
            {
                return false;
            }

            return self::${$mode};  
        }

        public static function setMode($mode) 
        {
            if(!self::modeExist($mode))
            {
                return false;
            }

            self::$mode = $mode;
        }

        public static function switchMode($mode) 
        {
            $uri = $_SERVER['REQUEST_URI'];

            if(strpos($uri, '?') !== false) 
            {
                $uri = $uri . '&mode=' . $mode; 
            }
            else
            {
                $uri = $uri . '?mode=' . $mode; 
            }

            if(in_array($mode, self::$modes))
            {
                if($mode != self::getActiveMode())
                {
                    ob_flush();

                    if(!headers_sent())
                    {
                        header('Location: ' . $uri); exit;
                    }
                    
                    echo '<a href="'.$uri.'">ERROR! Enter <b>' . strtoupper($mode) . '</b> mode.</a>';
                }
            }
        }
    }