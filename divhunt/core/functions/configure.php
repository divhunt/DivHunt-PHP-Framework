<?php

    Trait DivHuntFunctionConfigure
    {
        /**
         * DivHunt configure method for framework setup
         *
         * @param closure $callback 
         * @return string
         */

        public static function configure($callback = null) 
        {
            if(!is_callable($callback))
            {
                return __DIR__ . '/../../checks.php';
            }

            $configure = self::configurePrepare(); $callback($configure);

            if(!self::isConfigured())
            {
                return __DIR__ . '/../../checks.php';
            }

            return __DIR__ . '/../../run.php';
        }

        /**
         * Prepare default settings for framework configuration,
         * settings can be changed by user 
         *
         * @return object
         */

        private static function configurePrepare() 
        {
            return new class 
            {
                /**
                 * Class construct with default parameters
                 *
                 * @return void
                 */

                public function __construct()
                {
                    DivHunt::setConfig('path', '/');
                    DivHunt::setConfig('develop', false);
                    DivHunt::setConfig('password', false);
                    DivHunt::setConfig('shutdown', false);
                    DivHunt::setConfig('logging', ['errors' => false, 'warnings' => false, 'notices' => false]);
                    DivHunt::setConfig('timing', ['enabled' => false, 'limit' => false, 'show' => false, 'start' => microtime(true)]);
                }

                /**
                 * Configure path
                 *
                 * @param string $path 
                 * @return object
                 */

                public function path($path) 
                {
                    if(!is_string($path))
                    {
                        return $this;
                    }

                    $path = rtrim(preg_replace('/[^a-zA-Z\/\.]/', '', $path), '/') . '/';
    
                    if($file = debug_backtrace()[2]['file'] ?? false)
                    {
                        $dir = rtrim(dirname($file), '/');
                    }
                    else
                    {
                        $dir = rtrim(dirname($_SERVER['DOCUMENT_ROOT']), '/');
                    }

                    DivHunt::setConfig('path', $dir . '/' . ltrim($path, '/'));
                    return $this;
                }

                /**
                 * Password
                 *
                 * @param string $password 
                 * @return object
                 */

                public function password($password) 
                {
                    if(!is_scalar($password) && !is_null($password))
                    {
                        return $this;
                    }

                    DivHunt::setConfig('password', $password);
                    return $this;
                }

                /**
                 * Develop
                 *
                 * @param bool $develop 
                 * @return object
                 */

                public function develop($develop) 
                {
                    if($develop)
                    {
                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);

                        DivHunt::setConfig('develop', true);
                    }

                    return $this;
                }

                /**
                 * Configure logging
                 *
                 * @param bool $errors 
                 * @param bool $warnings 
                 * @param bool $notices 
                 * @param string $pattern 
                 * @return object
                 */

                public function logging($errors, $warnings = false, $notices = false)
                {
                    $logging   = ['errors' => false, 'warnings' => false, 'notices' => false];
                    $reporting = [];

                    if($errors)
                    {
                        $logging['errors'] = true;
                    }

                    if($warnings)
                    {
                        $logging['warnings'] = true;
                    }

                    if($notices)
                    {
                        $logging['notices'] = true;
                    }

                    DivHunt::setConfig('logging', $logging);
                    return $this;
                }

                /**
                 * Configure timing
                 *
                 * @param bool $timing 
                 * @param int $limit 
                 * @param bool $show 
                 * @return object
                 */

                public function timing($enabled, $limit = false, $show = false)
                {
                    if(!$enabled)
                    {
                        return false;
                    }

                    $timing = ['enabled' => true, 'limit' => false, 'show' => false, 'start' => DivHunt::getConfig('timing/start')];

                    if($limit && is_integer($limit))
                    {
                        $timing['limit'] = $limit;
                    }

                    if($show)
                    {
                        $timing['show'] = true;
                    }

                    DivHunt::setConfig('timing', $timing);
                    return $this;
                }
            };
        }
    }