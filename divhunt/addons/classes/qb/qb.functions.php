<?php

    Trait QBFunctions
    {
        /**
         * Process query select
         *
         * @param string $select
         * @param string $type
         * @return object
         */

        public static function select($select, $type = 'slave')
        {
            include_once 'process/select.php';

            return new qb_select($select, $type);
        }

        /**
         * Process query insert
         *
         * @param string $table
         * @return object
         */

        public static function insert($table)
        {
            include_once 'process/insert.php';

            return new qb_insert($table, 'master');
        }

        /**
         * Process query delete
         *
         * @param string $table
         * @return object
         */

        public static function delete($table)
        {
            include_once 'process/delete.php';

            return new qb_delete($table, 'master');
        }

        /**
         * Process query update
         *
         * @param string $table
         * @return object
         */

        public static function update($table)
        {
            include_once 'process/update.php';

            return new qb_update($table, 'master');
        }

        /**
         * Process query manually
         *
         * @param string $sql
         * @param string $type
         * @return object
         */

        public static function query($sql, $type = 'master')
        {
            $connection = self::connection($type);
            $query = $connection->query($sql);

            if(!$query)
            {
                divhunt::log('[' . mysqli_errno($connection) . '][' . mysqli_error($connection) . '][' . $sql . ']')->type('error')->scheme('bt2')->log();
            }
            
            return $query;
        }

        /**
         * Sanitize key before working with database
         *
         * @param string $key
         * @return string
         */

        public static function sanitizeKey($key)
        {
            if(!preg_match("/^[a-zA-Z0-9_-]*$/", $key)) 
            {
                return false;
            }   

            return $key;
        }

        /**
         * Sanitize value before working with database
         *
         * @param mix $value
         * @return mix
         */

        public static function sanitizeValue($value, $type)
        {
            if($value === null || empty($value) || !$value)
            {
                return null;
            }

            if(strtolower($value) === 'null')
            {
                return null;
            }

            if(is_array($value) || is_object($value))
            {
                $value = json_encode($value);
            }
            
            $value = qb::connection($type)->real_escape_string($value);

            return "'" . $value . "'";
        }
    }