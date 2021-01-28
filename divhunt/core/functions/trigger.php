<?php

    Trait DivHuntFunctionTrigger
    {
        /**
         * Prepare and add triger to array.
         *
         * @param string $name
         * @param array $modes
         * @param callable $callback
         * @return void
         */

        public static function trigger($name, $modes, $callback)
        {   
            if(!$modes)
            {
                $modes = ['any'];
            }
            
            if(!is_string($name) || !is_array($modes) || !is_callable($callback) || !$name)
            {
                return;
            }

            $name = strtolower($name);

            if(preg_match('/[^a-zA-Z0-9_]/i', $name))
            {
                return;
            }

            if(!in_array(DivHunt::getActiveMode(), $modes) && !in_array('any', $modes))
            {
                return;
            } 

            if(!isset(self::$triggers[$name]))
            {
                self::$triggers[$name] = [];
            }

            array_push(self::$triggers[$name], $callback);
        }
    }