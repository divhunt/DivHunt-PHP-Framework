<?php

    Trait ApiSuccess
    {
        public static function success($info, $data = false, $array = [])
        {
            self::$status = true;

            if(!$info)
            {
                exit;
            }

            $info = rtrim($info, '.') . '.';

            $response = [];

            foreach($array as $key => $value)
            {
                $response[$key] = $value;
            }

            $response['info']     = $info;
            $response['success']  = true;
            $response['response'] = ['code' => self::$code, 'info' => self::$codes[self::$code]];
            $response['data']     = $data;
            
            echo json_encode($response); exit;
        }
    }