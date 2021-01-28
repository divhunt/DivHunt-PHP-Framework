<?php

    Trait QBDatabase
    {
        /**
         * Add database data into region pools
         *
         * @param callable $callback
         * @return void
         */

        public static function database($callback = false)
        {
            $database = self::databasePrepare();

            if(!is_callable($callback))
            {
                DivHunt::log('Please provide callback for function "qb::database()".')->scheme('bt2')->log();
            }

            $callback($database); $database = $database->getDatabase();

            self::databaseCheck($database);
            self::databaseAddPool($database);
        }

        /**
         * Prepare database class for callback
         *
         * @return object
         */

        private static function databasePrepare() 
        {
            return new class 
            {
                private $data;

                public function __construct()
                {
                    $this->data             = new StdClass;
                    $this->data->host       = false; 
                    $this->data->user       = false; 
                    $this->data->pass       = false; 
                    $this->data->base       = false; 
                    $this->data->region     = false; 
                    $this->data->type       = false; 
                    $this->data->persistant = false; 
                }

                public function host($host) 
                {
                    $this->data->host = $host;
                }

                public function user($user) 
                {
                    $this->data->user = $user;
                }

                public function pass($pass) 
                {
                    $this->data->pass = $pass;
                }

                public function base($base) 
                {
                    $this->data->base = $base;
                }

                public function region($region) 
                {
                    $this->data->region = $region;
                }

                public function type($type) 
                {
                    $this->data->type = $type;
                } 

                public function persistant($persistant) 
                {
                    $this->data->persistant = $persistant;
                } 

                public function getDatabase()
                {
                    return $this->data;
                }
            };
        }

        /**
         * Check if there are missing data after callback
         *
         * @param object
         * @return void
         */

        private static function databaseCheck($database)
        {
            if(!$database->host)
            {
                DivHunt::log('Please provide database host.')->scheme('bt3')->log();
            }

            if(!$database->user)
            {
                DivHunt::log('Please provide database user.')->scheme('bt3')->log();
            }

            if(!self::existRegion($database->region))
            {
                DivHunt::log('Region does not exist.')->scheme('bt3')->log();
            }

            if(!self::validType($database->type))
            {
                DivHunt::log('Please provide valid database type [master, slave].')->scheme('bt3')->log();
            }
        }

        /**
         * Add database to pool
         *
         * @param object
         * @return void
         */

        private static function databaseAddPool($database)
        {
            array_push(self::$data->regions[$database->region][$database->type]['pool'], $database);
        }
    }