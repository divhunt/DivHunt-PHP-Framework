<?php

    Trait DivHuntMethodsConfig
    {
        public static function getConfig($key)
        {
            if(!is_string($key))
            {
                return;
            }

            if(!$key = preg_replace('/[^_a-zA-Z\/]/', '', strtolower($key)))
            {
                return;
            }

            if(!$keys = array_values(array_filter(explode('/', $key))))
            {
                return;
            }

            if(count($keys) == 1)
            {
                return self::$config[$keys[0]] ?? false;
            }
            else if(count($keys) == 2)
            {
                return self::$config[$keys[0]][$keys[1]] ?? false;
            }
        }

        public static function setConfig($key, $value)
        {
            if(!is_string($key))
            {
                return;
            }

            if(!$key = preg_replace('/[^_a-zA-Z\/]/', '', strtolower($key)))
            {
                return;
            }

            if(!$keys = array_values(array_filter(explode('/', $key))))
            {
                return;
            }

            if(count($keys) == 1)
            {
                self::$config[$keys[0]] = $value;
            }
            else if(count($keys) == 2)
            {
                if(!is_array(self::$config[$keys[0]] ?? false))
                {
                    self::$config[$keys[0]] = [];
                }

                self::$config[$keys[0]][$keys[1]] = $value;
            }
        }

        public static function configExist($key)
        {
            if(!is_string($key))
            {
                return;
            }

            if(!$key = preg_replace('/[^_a-zA-Z\/]/', '', strtolower($key)))
            {
                return;
            }

            if(!$keys = array_values(array_filter(explode('/', $key))))
            {
                return;
            }

            if(count($keys) == 1)
            {
                if(isset(self::$config[$keys[0]]))
                {
                    return true;
                }
            }
            else if(count($keys) == 2)
            {
                if(isset(self::$config[$keys[0]][$keys[1]]))
                {
                    return true;
                }
            }
        }
    }