<?php

    Trait DivHuntHelper
    {
        /**
         * Check if function file exist and return function class
         *
         * @param string $function
         * @param array $arguments
         * @return object
         */

        public static function __callStatic($function, $arguments) 
        {    
            if(!$path = DivHunt::getLoad('class', get_class())[0]['path'] ?? false)
            {
                DivHunt::log('Could not find class path.')->scheme('bt2')->log();
            }

            if(!is_string($function))
            {
                DivHunt::log('Call to undefined function.')->scheme('bt2')->log();
            }

            if(!file_exists($path . 'functions/' . str_replace('_', '/', $function) . '.php'))
            {
                DivHunt::log('Call to undefined function "'.$function.'".')->scheme('bt2')->log();
            }

            $name = array_values(array_filter(explode('_', $function)));
            $name = $name[count($name) - 1];

            $class = include $path . 'functions/' . str_replace('_', '/', $function) . '.php';

            if(method_exists($class, $name))
            {
                return $class->{$name}(...$arguments);
            }

            return $class;
        }
    }