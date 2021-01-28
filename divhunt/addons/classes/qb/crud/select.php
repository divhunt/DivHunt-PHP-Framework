<?php

    Trait QBCrudSelect
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

            $this->{$name} = $value; return $this;
        }

        /**
         * This function will process user function query and items
         * run query and return data. 
         *
         * @param callable $pre_callable
         * @param callable $post_callable
         * @return object
         */

        public function run($pre_callable = false, $post_callable = false)
        {
            if(!method_exists($this, 'query') || !method_exists($this, 'items'))
            {
                DivHunt::log('Method "query" or "items" does not exist.')->scheme('bt2')->log();
            }

            if(is_callable($pre_callable))
            {
                $pre_callable($this);
            }

            $data = $this->items();

            if(is_callable($post_callable))
            {
                return $post_callable($data);
            }

            if($this->k('limit') == 1 || $this->k('count'))
            {
                return $data;
            }

            return $data['data'] ?? [];
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
         * Process each invidual item
         *
         * @param callbable $callback
         * @return array
         */

        private function item($callback)
        {
            if(!is_callable($callback))
            {
                DivHunt::log('Please provide callback for function "item"')->scheme('bt2')->log();
            }

            $data          = [];
            $data['data']  = [];
            $data['ids']   = [];
            $data['query'] = $this->query()->run();

            foreach($data['query']->data as $a)
            {
                if($this->k('count'))
                {
                    return $a['total'] ?? false;
                }

                $item = $callback($a);

                if($this->k('limit') == 1)
                {
                    return $item;
                }

                array_push($data['ids'], $item->id);
                $data['data'][$item->array_key ?? $item->id] = $item;
            }

            if($this->k('limit') == 1)
            {
                return false;     
            }

            return $data;
        }

        /**
         * Process where for query function
         *
         * @param callbable $callback
         * @return object
         */

        private function where($query, $callback = false)
        {
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