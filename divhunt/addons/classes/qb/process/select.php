<?php

    class qb_select
    {
        /**
         * Select data
         *
         * @param object $data
         */

        private $data;

        /**
         * Consturct class
         *
         * @param string $select
         * @param string $type
         * @return void
         */

        public function __construct($select, $type)
        {
            $this->data                        = new StdClass;
            $this->data->type                  = $type;

            $this->data->query                 = new StdClass;
            $this->data->query->select         = $select;
            $this->data->query->table          = false;
            $this->data->query->limit          = false;
            $this->data->query->offset         = false;
            $this->data->query->group          = false;
            $this->data->query->order          = false;
            $this->data->query->key            = false;
            $this->data->query->join           = [];
            $this->data->query->where          = [];
            $this->data->query->where['key']   = [];
            $this->data->query->where['value'] = [];
            $this->data->query->types          = [
                'equal'            => "=",
                'regexp'           => "REGEXP",
                'notequal'         => "!=",
                'lessthan'         => "<",
                'greaterthan'      => ">",
                'greaterequalthan' => ">=",
                'greaterlessthan'  => "<>",
                'lessequalthan'    => "<=",
                'notnull'          => "IS NOT NULL",
                'null'             => "IS NULL",
                'like'             => "LIKE",
                'notlike'          => "NOT LIKE",
                'in'               => "IN",
                'notin'            => "NOT IN"
            ];

            return $this;
        }

        /**
         * Set from
         *
         * @param string $table
         * @return object
         */

        public function from($table)
        {
            $this->data->query->table = $table;

            return $this;
        }

        /**
         * Set limit
         *
         * @param int $limit
         * @return object
         */

        public function limit($limit)
        {
            $this->data->query->limit = $limit;

            return $this;
        }

        /**
         * Set offset
         *
         * @param int $offset
         * @return object
         */

        public function offset($offset)
        {
            $this->data->query->offset = $offset;

            return $this;
        }

        /**
         * Set group
         *
         * @param string $group
         * @return object
         */

        public function group($group)
        {
            $this->data->query->group = $group;

            return $this;
        }

        /**
         * Set order
         *
         * @param string $order
         * @return object
         */

        public function order($order)
        {
            $this->data->query->order = $order;

            return $this;
        }

        /**
         * Set offset
         *
         * @param string $key
         * @return object
         */

        public function key($key)
        {
            $this->data->query->key = $key;

            return $this;
        }

        /**
         * Set join
         *
         * @param string $join
         * @return object
         */

        public function join($join)
        {
            array_push($this->data->query->join, $join);

            return $this;
        }

        /**
         * Set where
         *
         * @param string $key
         * @return object
         */

        public function where($key)
        {
            array_push($this->data->query->where['key'], ') AND (' . qb::sanitizeKey($key));

            return $this;
        }

        /**
         * Set and
         *
         * @param string $key
         * @return object
         */

        public function and($key)
        {
            array_push($this->data->query->where['key'], ' AND ' . qb::sanitizeKey($key));

            return $this;
        }

        /**
         * Set or
         *
         * @param string $key
         * @return object
         */

        public function or($key)
        {
            array_push($this->data->query->where['key'], ' OR ' . qb::sanitizeKey($key));

            return $this;
        }

        /**
         * Set custom
         *
         * @param string $custom
         * @return object
         */

        public function custom($custom)
        {
            array_push($this->data->query->where['key'], ' ' . $custom);

            return $this;
        }

        /**
         * Set is
         *
         * @param string $type
         * @param string $value
         * @param bool $sanitize
         * @return object
         */

        public function is($type, $value = false, $sanitize = true)
        {
            $type = strtolower($type);

            if($sanitize && $value)
            {
                $value = qb::sanitizeValue($value,  $this->data->type);
            }

            if(array_key_exists($type, $this->data->query->types))
            {
                switch ($type) 
                {
                    case 'like':
                        array_push($this->data->query->where['value'], "LIKE '%" . ltrim(rtrim($value, "'"), "'")  . "%'");
                        break;

                    case 'notlike':
                        array_push($this->data->query->where['value'], "NOT LIKE '%" . ltrim(rtrim($value, "'"), "'")  . "%'");
                        break;

                    case 'in':
                        array_push($this->data->query->where['value'], "IN (" . str_replace(",", "','", $value)  . ")");
                        break;

                    case 'notin':
                        array_push($this->data->query->where['value'], "NOT IN (" . str_replace(",", "','", $value)  . ")");
                        break;

                    default:
                        array_push($this->data->query->where['value'], $this->data->query->types[$type] . ' ' . $value);
                        break;
                }
                
            }

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
            $data->total   = 0;
            $data->data    = [];
            $data->sql     = $this->query();

            if($data->query = qb::query($data->sql, $this->data->type))
            {
                $data->success = 1;

                while($row = $data->query->fetch_assoc())
                {
                    if($this->data->query->key)
                    {
                        if($key = $row[$this->data->query->key] ?? false)
                        {
                            $data->data[$key] = $row;
                        }
                        else
                        {
                            $data->data[$data->total] = $row;
                        }
                    }
                    else
                    {
                        $data->data[$data->total] = $row;
                    }

                    $data->total++;
                }
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
            $query  = 'SELECT ' . $this->data->query->select . ' FROM ' . $this->data->query->table;

            foreach($this->data->query->join as $join)
            {
                $query .= ' ' . $join;
            }

            $query .= ' WHERE (1=1';
            $wheres = [];

            foreach($this->data->query->where['key'] as $key => $value)
            {
                $wheres[$key] = $value;
            }

            foreach($this->data->query->where['value'] as $key => $value)
            {
                $wheres[$key] .= ' ' . $value;
            }

            foreach($wheres as $where)
            {
                $query .= $where;
            }

            $query  = str_replace('(1=1) AND ', '', $query);
            $query .= ')';
        
            if($this->data->query->group)
            {
                $query .= ' GROUP BY ' . $this->data->query->group;
            }

            if($this->data->query->order)
            {
                $query .= ' ORDER BY ' . $this->data->query->order;
            }

            if($this->data->query->limit)
            {
                $query .= ' LIMIT ' . $this->data->query->limit;
            }

            if($this->data->query->offset)
            {
                $query .= ' OFFSET ' . $this->data->query->offset;
            }

            if(strpos($query, '(1=1)') !== false) 
            {
                $query  = str_replace(' WHERE (1=1)', '', $query);
            }

            return $query;
        }
    }