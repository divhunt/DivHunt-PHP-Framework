<?php

    Trait BlockMethods
    {
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
    }