<?php

    Trait DivHuntAjaxMethods
    {
        public static function ajaxGetFiles()
        {
            return self::$ajax['files'];
        }

        public static function ajaxAddFile($path)
        {
            if(!is_string($path))
            {
                return;
            }

            if(file_exists($path))
            {
                array_push(self::$ajax['files'], $path);
            }
        }

        public static function ajaxGetOrigins()
        {
            return self::$ajax['origins'];
        }

        public static function ajaxAddOrigin(...$origins)
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

                if(!in_array($origin, self::$ajax['origins']))
                {
                    array_push(self::$ajax['origins'], $origin);
                }
            }   
        }

        public static function ajaxGetCreditials($type)
        {
            if(!is_string($type))
            {
                return [];
            }

            $type = strtolower($type);

            if(!in_array($type, ['get', 'post']))
            {
                return [];
            }

            return self::$ajax['creditials'][$type];
        }

        public static function ajaxAddCreditial($type, $key, $value)
        {
            if(
                !is_string($type)  || 
                !is_string($key)   || 
                !is_string($value) ||
                !$key              ||
                !$value
            )
            {
                return;
            }

            $type = strtolower($type);

            if(!in_array($type, ['get', 'post']))
            {
                return;
            }

            self::$ajax['creditials'][$type][$key] = $value;
        }

        public static function ajaxExit($success, $info, $data = [])
        {
            $array            = [];
            $array['success'] = $success;
            $array['info']    = $info;

            if(is_array($data))
            {
                foreach($data as $key => $value)
                {
                    $array[$key] = $value;
                }
            }

            foreach(DivHunt::getTriggers('ajax_exit') as $trigger) { $trigger($array); }
            echo json_encode($array); exit;
        }
    }   