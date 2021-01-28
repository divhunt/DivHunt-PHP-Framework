<?php

    Trait QBCrudUpdate
    {
        /**
         * Accept any income data
         *
         * @param string $name
         * @param array $arguments
         * @return void
         */

        public function __call($name, $arguments)
        {
            $value  = $arguments[0] ?? false;
            $option = strtolower($arguments[1] ?? false);

            if($option === 'null')
            {
                if(!$value) return $this;
            }

            if(!$value && !$option)
            {
                DivHunt::log("'" . $name . "'" . ' is false value. Please change or allow false values.')->scheme('bt2')->log();
            }

            if($name == 'keys')
            {
                DivHunt::log("'" . $name . "'" . ' is forbiddedn for use in QBCrudUpdate.')->scheme('bt2')->log();
            }

            $this->{$name} = $value; return $this;
        }

        /**
         * Accept any income key for update
         *
         * @param string $name
         * @param string $value
         * @param string $option
         * @return void
         */

        public function key($name, $value, $option = false)
        {
            if(!isset($this->keys)) $this->keys = [];

            $option = strtolower($option);

            if($option === 'null')
            {
                if(!$value) return $this;
            }

            if(!$value && !$option)
            {
                DivHunt::log("'" . $name . "'" . ' is false value. Please change or allow false values.')->scheme('bt2')->log();
            }

            $this->keys[$name] = $value; return $this;
        }

        /**
         * This function will process user function query 
         * run query and update data. 
         *
         * @param callable $pre_callable
         * @param callable $post_callable
         * @return object
         */

        public function run($pre_callable = false, $post_callable = false)
        {
            if(!method_exists($this, 'query'))
            {
                DivHunt::log('Method "query" does not exist.')->scheme('bt2')->log();
            }

            if(is_callable($pre_callable))
            {
                $pre_callable($this);
            }

            $query = $this->query();    

            if(is_array($query))
            {
                return $query;
            }

            $data = $query->run();

            if(is_callable($post_callable))
            {
                $post_callable($query, $data);
            }

            if($data->success)
            {
                return ['success' => 1, 'info' => 'Successfully updated.'];
            }

            return ['success' => 0, 'info' => 'There was problem performing update action.'];
        }

        /**
         * Get class property
         *
         * @param string $name
         * @param string $default
         * @return void
         */

        private function k($name, $default = false)
        {
            return $this->{$name} ?? $default;
        }

        /**
         * Loops tru keys.
         *
         * @param object $query
         * @param callable $callback
         * @return object
         */

        private function keys($query, $callback)
        {
            if(is_string($query))
            {
                return ['success' => 0, 'info' => $query];
            }

            if(!is_callable($callback))
            {
                DivHunt::log('Provide callback method for function "keys".')->scheme('bt2')->log();
            }

            foreach($this->k('keys', []) as $key => $value)
            {
                if(is_callable($callback))
                {
                    if($error = $callback($key, $value, $query))
                    {
                        return $error;
                    }
                }
            }

            return $query;
        }

        /**
         * Process where for query function
         *
         * @param callbable $callback
         * @return object
         */

        private function where($query, $callback = false)
        {
            if(is_string($query))
            {
                return ['success' => 0, 'info' => $query];
            }

            if(!is_callable($callback))
            {
                DivHunt::log('Please provide callback for function "where"')->scheme('bt2')->log();
            }

            foreach($this as $key => $value)
            {
                if(!in_array($key, ['limit', 'page', 'order', 'group']))
                {
                    $callback($key, $value, $query);
                }
            }

            if($this->k('limit'))
            {
                $query->limit($this->limit); 
            }

            if($this->k('limit') && $this->k('page'))
            {
                $query->offset($this->k('limit') * $this->k('page') - $this->k('limit'));
            }

            if($this->k('order'))
            {
                $query->order($this->k('order'));
            }

            if($this->k('group'))
            {
                $query->group($this->k('group'));
            }
          
            return $query;
        }
    }