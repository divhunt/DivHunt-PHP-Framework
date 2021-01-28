<?php

    Trait CookiesGet
    {
        /**
         * Get cookie by key
         *
         * @param string $key
         * @param string $return
         * @return mix
         */

        public static function get($key, $return = 'int')
        {
            if(!is_string($key) || !is_string($return))
            {
                return null;
            }

            if(!isset($_COOKIE[$key]))
            {
                return null;
            }

            switch(strtolower($return)) 
            {
                case 'int':
                    return (int) $_COOKIE[$key];
                    break;

                case 'string':
                    return htmlspecialchars($_COOKIE[$key], ENT_QUOTES);
                    break;

                case 'object':
                    return json_decode($_COOKIE[$key]);
                    break;

                case 'array':
                    return (array) json_decode($_COOKIE[$key]);
                    break;
            }

            return null;
        }
    }