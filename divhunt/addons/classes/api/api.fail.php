<?php

    Trait ApiFail
    {
        public static function fail($info, $array = [])
        {
            self::$status = true;

            $info = rtrim($info, '.') . '.';

            $response = [];

            foreach($array as $key => $value)
            {
                $response[$key] = $value;
            }

            $response['info']     = $info;
            $response['success']  = false;
            $response['response'] = ['code' => self::$code, 'info' => self::$codes[self::$code]];
            
            echo json_encode($response); exit();
        }
    }