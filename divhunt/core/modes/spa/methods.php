<?php

    Trait DivHuntSPAMethods
    {
        public static function spaExit()
        {
            $array            = [];
            $array['success'] = true;
            $array['info']    = 'Fetching SPA informations';
            $array['spa']     = self::$spa;

            DivHunt::runTrigger('spa_exit', $array);

            echo json_encode($array); exit;
        }

        public static function spaKey($value, ...$keys)
        {
            $path = &self::$spa;

            foreach($keys as $key)
            {
                if(!isset($path[$key]))
                {
                    $path[$key] = [];
                    $path = &$path[$key];
                }
            }   

            $path = $value;
        }
    }   