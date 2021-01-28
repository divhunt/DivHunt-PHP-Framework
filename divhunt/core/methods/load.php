<?php

    Trait DivHuntMethodsLoad
    {
        public static function loadExist($key, $name)
        {
            if(!is_string($key) || !is_string($name))
            {
                return false;
            }

            $key  = strtolower($key);
            $name = strtolower($name);

            if(isset(self::$load[$key][$name]))
            {
                return true;
            }
        }

        public static function getLoad($key, $name)
        {
            if(!self::loadExist($key, $name))
            {
                return;
            }

            return self::$load[$key][$name];
        }

        public static function setLoad($key, $name, $data = [])
        {   
            if(!is_string($key) || !is_string($name) || !is_array($data))
            {
                return;
            }

            $key  = strtolower($key);
            $name = strtolower($name);

            foreach($data as $value)
            {
                if(!is_scalar($value))
                {
                    return;
                }
            }

            if(!isset(self::$load[$key]))
            {
                self::$load[$key] = [];
            }

            if(!isset(self::$load[$key][$name]))
            {
                self::$load[$key][$name] = [];
            }

            array_push(self::$load[$key][$name], $data);
        }
    }