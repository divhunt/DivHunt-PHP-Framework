<?php

    Trait RouteProcess
    {
        /**
         * Process Request
         *
         * @param string $method
         * @param string $route
         * @param callable $callback
         * @return string
         */

        private static function process($method, $route, $callback)
        {
            self::$data->route = false;
            
            if(self::isMatched())
            {
                if($callback) { return __DIR__ . '/load/empty.php'; }
                else          { return false; }
            }

            if($method != DivHunt::getRequestMethod() && !in_array($method, ['ANY', 'AJAX']))
            {
                if($callback) { return __DIR__ . '/load/empty.php'; }
                else          { return false; }
            }

            $route = self::processRouteData($route, $method);
            $route = self::processRoutePath($route);
            $route = self::processRouteStar($route);
            $route = self::processRouteVars($route);

            if(array_diff($route->uri->array, $route->request->array))
            {
                if($callback) { return __DIR__ . '/load/empty.php'; }
                else          { return false; }
            }

            if(array_diff($route->request->array, $route->uri->array))
            {
                if($callback) { return __DIR__ . '/load/empty.php'; }
                else          { return false; }
            }

            if($route->star === null)
            {
                self::setMatched(true);
                foreach(DivHunt::getTriggers('route_match') as $trigger) { $trigger($route); }
            }
            else
            {
                foreach(DivHunt::getTriggers('route_star_match') as $trigger) { $trigger($route); }
            }

            if($callback) 
            { 
                self::$data->route = $route;
                
                $_callback   = self::processCallback(); $callback($_callback);
                $route->load = $_callback->getRoute();

                return __DIR__ . '/load/route.php'; 
            }
            else 
            { 
                self::$data->route = $route; return true;
            }
        }

        /**
         * Prepare callback
         *
         * @return object
         */

        private static function processCallback()
        {
            return new Class()
            {
                private $load = [];
                private $path = false;

                /**
                 * Construct load and get location of where
                 * route was called
                 *
                 * @return void
                 */

                public function __construct()
                {
                    $backtrace = str_replace('\\', '/', debug_backtrace()[3]['file']);
                    $backtrace = explode('/', $backtrace);

                    if(strpos($backtrace[count($backtrace) - 1], '.php') !== false) 
                    {
                        array_pop($backtrace);
                    }

                    $this->path = rtrim(implode('/', $backtrace), '/') . '/';;
                }

                /**
                 * Process load for route
                 *
                 * @return void
                 */

                public function load($load, $view = false)
                {
                    if(strpos($load, '.php') !== false) 
                    {
                        array_push($this->load, ['path' => $this->path . ltrim($load, '/'), 'view' => $view]);
                    }
                    else
                    {
                        array_push($this->load, ['path' => $this->path . rtrim($load, '/') . '/app.php', 'view' => $view]);
                    }
                }

                /**
                 * Get all loads for route
                 *
                 * @return void
                 */

                public function getRoute()
                {
                    return $this->load;
                }
            };
        }

        /**
         * Process route data
         *
         * @param string $route
         * @return object
         */

        private static function processRouteData($route, $method)
        {
            if(empty($route) || !$route)
            {
                $route = '/';
            }

            $data        = new StdClass;
            $data->vars  = new StdClass;

            $data->request         = new StdClass;
            $data->request->string = rtrim(ltrim($route, '/'), '/');
            $data->request->array  = array_values(array_filter(explode('/', $data->request->string)));

            $data->uri    = DivHunt::getURI();
            $data->star   = null;
            $data->method = $method;

            return $data;
        }

        /**
         * Process route path
         *
         * @param object $route
         * @return object
         */

        private static function processRoutePath($route)
        {
            $request_array_1 = [];
            $request_array_2 = [];

            foreach(array_reverse($route->request->array) as $key => $value)
            {
                if(strpos($value, '~') !== false)
                {
                    $paths = explode('/', self::getPath(str_replace('~', '', $value)));
                    $paths = array_values(array_filter($paths));

                    foreach($paths as $path)
                    {
                        array_push($request_array_1, $path);
                    }
                }
                else
                {
                    array_push($request_array_2, $value);
                }
            }

            $route->request->array = array_merge($request_array_1, array_reverse($request_array_2));

            return $route;
        }


        /**
         * Process route star
         *
         * @param object $route
         * @return object
         */

        private static function processRouteStar($route)
        {
            foreach($route->request->array as $key => $value)
            {
                if(strpos($value, '*') !== false)
                {
                    $route->star = $key;
                    unset($route->request->array[$key]);
                    unset($route->uri->array[$key]);
                }
            }

            if($route->star !== null)
            {
                foreach($route->uri->array as $key => $value)
                {
                    if($key >= $route->star)
                    {
                        unset($route->request->array[$key]);
                        unset($route->uri->array[$key]);
                    }
                }
            }

            return $route;
        }

        /**
         * Process route vars
         *
         * @param object $route
         * @return object
         */

        private static function processRouteVars($route)
        {
            foreach($route->request->array as $key => $value)
            {
                if(strpos($value, ':') !== false)
                {
                    $var_key   = str_replace(':', '', $value);
                    $var_value = $route->uri->array[$key] ?? false;

                    unset($route->request->array[$key]);
                    unset($route->uri->array[$key]);

                    $route->vars->{$var_key} = $var_value;
                }

                if(strpos($value, '?') !== false)
                {
                    $var_key   = str_replace('?', '', $value);
                    $var_value = $_GET[$var_key] ?? false;

                    unset($route->request->array[$key]);
                    unset($route->uri->array[$key]);

                    $route->vars->{$var_key} = $var_value;
                }
            }

            return $route;
        }
    }