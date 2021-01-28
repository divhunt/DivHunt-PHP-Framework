<?php

    Trait QBConnection
    {
        /**
         * Prepare database connection
         *
         * @param string $type
         * @return mysqli object
         */

        public static function connection($type = 'slave')
        {
            if(!self::validType($type))
            {
                DivHunt::log('Please provide valid database type [master, slave].')->scheme('bt2')->log();
            }

            if(!$region = self::getRegion())
            {
                DivHunt::log('Please choose region first.')->scheme('bt2')->log();
            }

            if($connection = self::getConnection($type))
            {
                return $connection;
            }

            if(!$database = self::getDatabase($type))
            {
                DivHunt::log('Please add database with type "'.$type.'" to pool.')->scheme('bt2')->log();
            }

            return self::connectionInit($database, $type);
        }

        /**
         * Prepare database connection
         *
         * @param object $type
         * @param string $type
         * @return mysqli object
         */

        private static function connectionInit($database, $type)
        {
            $connection = mysqli_init();

            @$connection->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
            @$connection->real_connect($database->persistent . $database->host, $database->user, $database->pass, $database->base);
            @$connection->set_charset('utf8');

            if($connection->connect_errno < 1) 
            {
                self::setConnection($type, $connection);
            }
            else
            {
                DivHunt::log($connection->connect_error)->scheme('bt3')->log();
            }

            return $connection;
        }
    }