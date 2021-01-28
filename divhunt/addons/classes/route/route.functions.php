<?php

    Trait RouteFunctions
    {
        /**
         * Process GET route
         *
         * @param string $route
         * @param callable $callback
         * @return string
         */

        public static function get($route, $callback = false)
        {
            if(!is_string($route))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            if($callback && !is_callable($callback))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            return self::process('GET', $route, $callback);
        }

        /**
         * Process POST route
         *
         * @param string $route
         * @param callable $callback
         * @return string
         */

        public static function post($route, $callback = false)
        {
            if(!is_string($route))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            if($callback && !is_callable($callback))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            return self::process('POST', $route, $callback);
        }

        /**
         * Process PUT route
         *
         * @param string $route
         * @param callable $callback
         * @return string
         */

        public static function put($route, $callback = false)
        {
            if(!is_string($route))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            if($callback && !is_callable($callback))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            return self::process('PUT', $route, $callback);
        }

        /**
         * Process DELETE route
         *
         * @param string $route
         * @param callable $callback
         * @return string
         */

        public static function delete($route, $callback = false)
        {
            if(!is_string($route))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            if($callback && !is_callable($callback))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            return self::process('DELETE', $route, $callback);
        }

        /**
         * Process ANY route
         *
         * @param string $route
         * @param callable $callback
         * @return string
         */

        public static function any($route, $callback = false)
        {
            if(!is_string($route))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            if($callback && !is_callable($callback))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            return self::process('ANY', $route, $callback);
        }

        /**
         * Process MULTIPLE route
         *
         * @param string $route
         * @param callable $callback
         * @return string
         */

        public static function match($match, $route, $callback = false)
        {
            if(!is_string($route) || !is_array($match))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            if($callback && !is_callable($callback))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            if(in_array(self::getMethod(), $match))
            {
                return self::process('ANY', $route, $callback);
            }
            else
            {
                if($callback) { return __DIR__ . '/load/empty.php'; }
                else          { return false; }
            }   
        }

        /**
         * Process AJAX route
         *
         * @param string $route
         * @return string
         */

        public static function ajax($route, $callback = false)
        {
            if(!is_string($route))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            if($callback && !is_callable($callback))
            {
                DivHunt::log('Bad formatted route.')->scheme('bt2')->log();
            }

            return self::process('AJAX', $route, $callback);
        }
    }