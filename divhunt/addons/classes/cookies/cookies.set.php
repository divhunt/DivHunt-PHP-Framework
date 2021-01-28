<?php

    Trait CookiesSet
    {
        /**
         * Set cookie 
         *
         * @param string $name
         * @param scalar $value
         * @param int $expires
         * @return mix
         */

        public static function set($name, $value, $expires = 84600)
        {   
            if(!is_string($name) || !is_scalar($value) || !is_integer($expires))
            {
                return false;
            }

            $domain = bind::getSubdomain() . '.' . bind::getDomain() . '.' . bind::getTdl();
            $domain = ltrim($domain, '.');

            $secure = 0;

            if(bind::isHttps())
            {
                $secure = 1;
            }

            if($secure)
            {
                $cookie = setcookie($name, $value, 
                [
                    'expires'  => time() + $expires,
                    'path'     => '/',
                    'domain'   => $domain,
                    'secure'   => 1,
                    'httponly' => 1,
                    'SameSite' => 'None; Secure',
                ]);
            }
            else
            {
                $cookie = setcookie($name, $value, 
                [
                    'expires'  => time() + $expires,
                    'path'     => '/',
                    'domain'   => $domain,
                    'secure'   => 0,
                    'httponly' => 1
                ]);
            }

            return $cookie;
        }
    }