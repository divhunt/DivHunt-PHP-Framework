<?php

    Trait CookiesSettings
    {
        /**
         * Get cookie setting
         *
         * @param string $cookie
         * @param string $key
         * @return mix
         */

        public static function getSetting($cookie, $key)
        {
            if(!is_string($cookie) || !is_string($key))
            {
                return false;
            }

            if(!$settings = self::get($cookie, 'object'))
            {
                return false;
            }

            return $settings->{$key} ?? false;
        }

        /**
         * Set cookie setting
         *
         * @param string $cookie
         * @param string $key
         * @param string $value
         * @return mix
         */

        public static function setSetting($cookie, $key, $value)
        {
            if(!is_string($cookie) || !is_string($key) || !is_scalar($value))
            {
                return false;
            }

            if(!$settings = self::get($cookie, 'object'))
            {
                $settings = new StdClass;
            }

            $settings->{$key} = $value;


            if(self::set($cookie, json_encode($settings), 31536000))
            {
                return $value;
            }
        }
    }