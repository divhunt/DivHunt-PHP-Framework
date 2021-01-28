<?php

    class qb_insert
    {
        /**
         * Insert data
         *
         * @param object $data
         */

        private $data;

        /**
         * Consturct class
         *
         * @param string $table
         * @param string $type
         * @return void
         */

        public function __construct($table, $type)
        {
            $this->data                = new StdClass;
            $this->data->type          = $type;

            $this->data->query         = new StdClass;
            $this->data->query->table  = $table;
            $this->data->query->insert = 0;
            $this->data->query->keys   = [];
            $this->data->query->values = [];
        }

        /**
         * Add key for insert
         *
         * @param string $key
         * @return object
         */

        public function key($key)
        {
            if(!$sanitized = qb::sanitizeKey($key))
            {
                DivHunt::log('Invalid key: ' . $key)->scheme('bt2')->log();
            }

            array_push($this->data->query->keys, $sanitized);

            return $this;
        }

        /**
         * Add value for insert
         *
         * @param mix $value
         * @return object
         */

        public function value($value)
        {
            if(!array_key_exists($this->data->query->insert, $this->data->query->values))
            {
                $this->data->query->values[$this->data->query->insert] = [];
            }

            array_push($this->data->query->values[$this->data->query->insert], qb::sanitizeValue($value, $this->data->type));

            return $this;
        }

        /**
         * Increment insert var for another insert
         *
         * @return object
         */

        public function add()
        {
            $this->data->query->insert++;

            return $this;
        }

        /**
         * Run query
         *
         * @param callable $success
         * @param callable $fail
         * @return object
         */

        public function run($success = false, $fail = false)
        {
            $data          = new StdClass;;
            $data->success = 0;
            $data->sql     = $this->query();

            if($data->query = qb::query($data->sql, $this->data->type))
            {
                $data->success = 1;
            }

            if($data->success)
            {
                if(is_callable($success))
                {
                    $success($data);
                }
            }
            else
            {
                if(is_callable($fail))
                {
                    $fail($data);
                }
            }

            return $data;
        }

        /**
         * Process sql
         *
         * @return string
         */

        private function query()
        {
            $query = 'INSERT INTO ' . $this->data->query->table . ' (';

            $i = 0; foreach($this->data->query->keys as $key) 
            { 
                $i++;
               
                if($i == count($this->data->query->keys)) 
                {
                    $query .= $key . ') VALUES ';
                }
                else 
                {
                    $query .= $key . ', ';
                }                                      
            }

            $i = 0; foreach($this->data->query->values as $insert => $values)
            {
                $i++;
                $query .= '(';

                $i2 = 0; foreach($values as $value) 
                { 
                    $i2++;

                    if($i2 == count($values)) 
                    {
                        $query .= $value;
                    }
                    else
                    {
                        $query .= $value . ', ';
                    } 
                }

                if($i == count($this->data->query->values)) 
                {
                    $query .= ')';
                }
                else  
                {
                    $query .= '), ';
                }                                     
            }

            return $query;
        }
    }