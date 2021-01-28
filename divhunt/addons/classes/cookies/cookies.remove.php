<?php

    Trait CookiesRemove
    {
        /**
         * Remove cookie by name
         *
         * @param string $name
         * @return mix
         */

        public static function remove($name)
        {       
            if(self::set($name, '', -60))
            {
                return true;
            }

            return false;
        }
    }