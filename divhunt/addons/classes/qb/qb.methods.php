<?php

    Trait QBMethods
    {
        public static function getRegion()
        {
            return self::$data->region;
        }

        public static function setRegion($region)
        {
            if(!is_string($region))
            {
                return false;
            }

            $region = strtolower($region);

            if(array_key_exists($region, self::$data->regions))
            {
                self::$data->region = $region; return true;
            } 

            return false;
        }

        public static function addRegion($region)
        {
            if(!is_string($region))
            {
                return false;
            }

            if(!$region = preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($region)))
            {
                return false;
            }

            if(!array_key_exists($region, self::$data->regions))
            {
                self::$data->regions[$region] =
                [
                    'master' => false,
                    'slave'  => false,
                    'pool'   => []
                ];
            } 

            return true;
        }

        public static function existRegion($region)
        {
            if(!is_string($region))
            {
                return false;
            }

            $region = strtolower($region);

            if(array_key_exists($region, self::$data->regions))
            {
                return true;
            } 
        }

        public static function validType($type)
        {
            if(!is_string($type))
            {
                return false;
            }

            $type = strtolower($type);

            if(in_array($type, self::$data->types))
            {
                return true;
            } 
        }

        public static function getConnection($type)
        {
            if(!self::validType($type))
            {
                return false;
            }

            return self::$data->regions[self::getRegion()][$type]['connection'];
        }

        public static function setConnection($type, $connection)
        {
            if(!self::validType($type))
            {
                return false;
            }

            self::$data->regions[self::getRegion()][$type]['connection'] = $connection;
        }

        public static function getDatabase($type)
        {
            if(!self::validType($type))
            {
                return false;
            }

            $pool = self::$data->regions[self::getRegion()][$type]['pool'];

            if(is_array($pool))
            {
                if(!count($pool))
                {
                    return false;
                }

                $pool = $pool[array_rand($pool, 1)];

                self::$data->regions[self::getRegion()][$type]['pool'] = $pool; return $pool;
            }
            
            return $pool;
        }

        public static function getInsertID()
        {
            return self::connection('master')->insert_id;
        }

    }