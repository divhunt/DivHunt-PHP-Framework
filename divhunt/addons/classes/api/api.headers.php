<?php

    Trait ApiHeaders
    {
        public static function contentType($type)
        {
            switch($type) 
            {
                case 'json':
                    header('Content-Type: application/json');
                    break;

                case 'css':
                    header('Content-Type: text/css');
                    break;

                case 'js':
                    header('Content-Type: text/js');
                    break;
            }
        }

        public static function responseCode($code, $exit = false)
        {
            if(array_key_exists($code, self::$codes))
            {
                self::$code = $code;
            }
            else
            {
                self::$code = 406;
            }
            
            if($exit)
            {
                self::$status = true;
                http_response_code(self::$code); exit;
            }
        }
    }