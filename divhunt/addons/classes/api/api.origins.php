<?php

    Trait ApiOrigins
    {
        public static function origins(...$origins)
        {
            foreach($origins as $origin)
            {
                if(!is_string($origin))
                {
                    return;
                }

                $origin = strtolower($origin);

                if($origin != '*')
                {
                    if(!filter_var($origin, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME))
                    {
                        return;
                    }
                }

                if(!in_array($origin, self::$origins))
                {
                    array_push(self::$origins, $origin);
                }
            }   

            $origin = DivHunt::getHost();

            if(in_array('*', self::$origins))
            {
                header('Access-Control-Allow-Origin: *');
                return;
            }

            if(!in_array($origin, self::$origins))
            {
                self::responseCode('403');
                self::contentType('json');
                self::fail('Invalid origin name');
            }

            header('Access-Control-Allow-Origin: ' . $origin);
        }
    }