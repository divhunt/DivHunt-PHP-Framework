<?php

    Trait DivHuntMethodsInfo
    {
        public static function getHost()
        {
            $host = preg_replace("/[^a-z\.A-z_0-9\-]/", '', ($_SERVER['HTTP_HOST'] ?? false));

            return strtolower($host);
        }

        public static function getRequestMethod()
        {
            $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

            if(in_array(strtoupper($method), ['GET', 'PUT', 'POST', 'DELETE']))
            {
                return strtoupper($method);
            }

            return 'GET';
        }

        public static function getUri()
        {
            $uri = new StdClass;

            $uri->string = explode('?', $_SERVER['REQUEST_URI'])[0] ?? '/';
            $uri->string = preg_replace("/[^a-z\.A-z_0-9,\/\-]/", '', $uri->string);
            $uri->string = rtrim(ltrim($uri->string, '/'), '/');

            $uri->array = array_values(array_filter(explode('/', $uri->string)));

            return $uri;
        }  

        public static function getIP()
        {       
            if(!empty($_SERVER['HTTP_CLIENT_IP']))
            {
                return $_SERVER['HTTP_CLIENT_IP'];
            }
                
            if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            
            return ($_SERVER['REMOTE_ADDR'] ?? '8.8.8.8');
        }
    }


