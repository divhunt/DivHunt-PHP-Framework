<?php

    Trait LoadMethods
    {
        public static function getLoadPath()
        {
            return DivHunt::getPublicPath() . 'load/';
        }

        public static function css($id, $path, $order = 1)
        {
            if(!is_string($id) || !is_string($path) || !is_integer($order))
            {
                return false;
            }

            if(!isset(self::$load['css'][$order]))
            {
                self::$load['css'][$order] = [];
            }

            if(!isset(self::$load['css'][$order][$id]))
            {
                self::$load['css'][$order][$id] = [];
            }

            if(!in_array($path, self::$load['css'][$order][$id]))
            {
                array_push(self::$load['css'][$order][$id], $path);
            }
        }

        public static function js($id, $path, $order = 1)
        {
            if(!is_string($id) || !is_string($path) || !is_integer($order))
            {
                return false;
            }

            if(!isset(self::$load['js'][$order]))
            {
                self::$load['js'][$order] = [];
            }

            if(!isset(self::$load['js'][$order][$id]))
            {
                self::$load['js'][$order][$id] = [];
            }

            if(!in_array($path, self::$load['js'][$order][$id]))
            {
                array_push(self::$load['js'][$order][$id], $path);
            }
        }

        public static function cssRender($id)
        {
            if(!is_integer($id))
            {
                return false;
            }

            return '<link rel="stylesheet" type="text/css" href="'.self::create($id, 'css').'">';
        }

        public static function jsRender($id)
        {
            if(!is_integer($id))
            {
                return false;
            }

            return '<script type="text/javascript" src="'.self::create($id, 'js').'"></script>';
        }

        public static function minify($code)
        {
            return str_replace(array('\n','\r'), ' ', trim(preg_replace('/\s+/', ' ', $code)));
        }
    }