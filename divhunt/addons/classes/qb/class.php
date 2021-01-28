<?php

    include 'qb.database.php';
    include 'qb.methods.php';
    include 'qb.connection.php';
    include 'qb.functions.php';
    
    include 'crud/select.php';
    include 'crud/insert.php';
    include 'crud/update.php';
    include 'crud/delete.php';

    class qb
    {
        use \QBDatabase, \QBMethods, \QBConnection, \QBFunctions;

        /**
         * Query Builder data
         *
         * @param object $data
         */

        private static $data;

        /**
         * Consturct class
         *
         * @param array $regions
         * @return void
         */

        public static function construct($regions = ['eu'])
        {
            self::$data          = new StdClass;
            self::$data->region  = false;
            self::$data->regions = self::regions($regions);
            self::$data->types   = self::types();
        }

        /**
         * Prepare regions
         *
         * @return array
         */

        private static function regions($regions)
        {
            $array = [];

            foreach($regions as $region)
            {
                if(!is_string($region))
                {
                    continue;
                }

                if(!$region = preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($region)))
                {
                    continue;
                }

                $array[$region] =
                [
                    'master' => ['pool' => [], 'connection' => false],
                    'slave'  => ['pool' => [], 'connection' => false]
                ];
            }
            
            return $array;
        }

        /**
         * Prepare types
         *
         * @return array
         */

        private static function types()
        {
            return ['master', 'slave'];
        }
    }