<?php

    Trait DivHuntFunctionLog
    {
        /**
         * Framework logging, aslo logging can be used outside framework.
         *
         * @param string $text 
         * @param closure $callback 
         * @return bool
         */

        public static function log($text, $log = false) 
        {
            if(!$text && $log)
            {
                return self::logWrite($log);
            }

            if(!is_string($text))
            {
                return;
            }

            return self::logPrepare($text);
        }

        /**
         * Prepare default settings for log,
         * settings can be changed by user 
         *
         * @param string $text
         * @return object
         */

        private static function logPrepare($text) 
        {
            return new class($text) 
            {
                /**
                 * Class construct, will create variables with default parameters
                 */

                public function __construct($text)
                {
                    $this->log         = new StdClass;
                    $this->log->text   = $text;
                    $this->log->file   = false;
                    $this->log->type   = 'error';
                    $this->log->scheme = [];
                    $this->log->show   = false;
                    $this->log->exit   = false;
                }

                /**
                 * Setup file name
                 *
                 * @param string $file 
                 * @return void
                 */

                public function file($file) 
                {
                    if($file = preg_replace('/[^a-zA-Z0-9_-]/', '', $file))
                    {
                        $this->log->file = DivHunt::getLogsPath() . $file . '.txt';
                    }

                    return $this;
                }

                 /**
                 * Setup log type 
                 *
                 * @param string $type 
                 * @return void
                 */

                public function type($type) 
                {
                    if(in_array($type, ['fatal', 'error', 'warning', 'notice']))
                    {
                        $this->log->type = $type;
                    }

                    return $this;
                }

                /**
                 * Determine if log will show
                 *
                 * @param bool $show 
                 * @return object
                 */

                public function show($show) 
                {
                    $this->log->show = ($show ?? false) ? true : false;

                    return $this;
                }

                /**
                 * Determine if should exit after log
                 *
                 * @param bool $exit 
                 * @return object
                 */

                public function exit($exit) 
                {
                    $this->log->exit = ($exit ?? false) ? true : false;

                    return $this;
                }

                /**
                 * Setup scheme
                 *
                 * @param string $scheme 
                 * @return object
                 */

                public function scheme($schemes)
                {
                    if(!is_string($schemes))
                    {
                        return $this;
                    }

                    foreach(explode(',', $schemes) as $scheme)
                    {
                        if(in_array($scheme, ['ip', 'time', 'uri', 'bt1', 'bt2', 'bt3', 'bt4']))
                        {
                            array_push($this->log->scheme, $scheme);
                        }
                    }

                    return $this;
                }

                /**
                 * Write log
                 *
                 * @return void
                 */

                public function log()
                {
                    DivHunt::log(false, $this);
                }

                /**
                 * Get log
                 *
                 * @return void
                 */

                public function getLog()
                {
                    return $this->log;
                }
            };
        }

        /**
         * Write log
         *
         * @param object $log
         * @return bool
         */

        private static function logWrite($log)
        {
            if(!method_exists($log, 'getLog'))
            {
                return false;
            }

            if(!$log = $log->getLog())
            {
                return false;
            }

            foreach(DivHunt::getTriggers('log') as $trigger) { $trigger($log); }

            $log->text = htmlspecialchars($log->text, ENT_QUOTES);

            if($log->type == 'error' && !self::canLogErrors())
            {
                return;
            }
            else if($log->type == 'warning' && !self::canLogWarnings())
            {
                return;
            }
            else if($log->type == 'notice' && !self::canLogNotices())
            {
                return;
            }

            foreach ($log->scheme as $scheme) 
            {
                $log->text = self::logScheme($scheme) . $log->text;   
            }

            if($log->file && is_writable(DivHunt::getLogsPath()))
            {
                if(!$file = fopen($log->file, 'a'))
                {
                    return false;
                }

                if(flock($file, LOCK_EX)) 
                {  
                    fwrite($file, $log->text . PHP_EOL);
                    flock($file, LOCK_UN);   
                } 

                fclose($file);
            }

            if($log->type == 'fatal')
            {
                self::developAddFatal($log->text);
            }
            else if($log->type == 'error')
            {
                self::developAddError($log->text);

                if(!self::inShutdown())
                {
                    self::setMode('develop'); exit;
                }
            }
            else if($log->type == 'warning')
            {
                self::developAddWarning($log->text);
            }
            else if($log->type == 'notice') 
            {
                self::developAddNotice($log->text);
            }

            $style = 'display: inline-block; color: #000; margin: 5px; padding: 10px 15px;';

            if($log->type == 'error' || $log->type == 'fatal')
            {
                $style .= 'background: rgb(230 68 68 / 0.1); border: 1px solid rgb(230 68 68 / 1); border-left: 5px solid rgb(230 68 68 / 1);';
            }
            else if($log->type == 'warning')
            {
                $style .= 'background: rgb(230 68 68 / 0.1); border: 1px solid rgb(230 68 68 / 1); border-left: 5px solid rgb(230 68 68 / 1);';
            }
            else
            {
                $style .= 'background: rgb(230 214 68 / 0.1); border: 1px solid rgb(230 214 68 / 1); border-left: 5px solid rgb(230 214 68 / 1);';
            }

            if($log->type == 'fatal')
            {
                echo '<div style="'.$style.'">' . $log->text . '</div>';
                exit;
            }

            if($log->show && DivHunt::isActiveMode(['app', 'develop', 'docs']))
            {
                echo '<div style="'.$style.'">' . $log->text . '</div>';
            }

            if(($log->exit || $log->type == 'error') && DivHunt::isActiveMode(['app']) && !self::inShutdown())
            {
                exit;
            }
        }

        /**
         * Create Log scheme
         *
         * @param string $scheme
         * @return string
         */

        private static function logScheme($scheme) 
        {
            switch ($scheme) 
            {
                case 'ip':
                    return self::logSchemeIP() . ' ';
                    break;

                case 'time':
                    return self::logSchemeTime() . ' ';
                    break;

                case 'uri':
                    return self::logSchemeURI() . ' ';
                    break;

                case 'bt1':
                    return self::logSchemeBacktrace(1) . ' ';
                    break;

                case 'bt2':
                    return self::logSchemeBacktrace(2) . ' ';
                    break;

                case 'bt3':
                    return self::logSchemeBacktrace(3) . ' ';
                    break;

                case 'bt4':
                    return self::logSchemeBacktrace(4) . ' ';
                    break;
            }
        }

        /**
         * Log Scheme IP
         *
         * @return string
         */

        private static function logSchemeIP()
        {
            if(!empty($_SERVER['HTTP_CLIENT_IP']))
            {
                return '[' . $_SERVER['HTTP_CLIENT_IP'] . ']';
            }
                
            if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
                return '[' . $_SERVER['HTTP_X_FORWARDED_FOR'] . ']';
            }
            
            return '[' . ($_SERVER['REMOTE_ADDR'] ?? '8.8.8.8') . ']';
        }

        /**
         * Log Scheme Time
         *
         * @return string
         */

        private static function logSchemeTime() 
        {
            $time = date("Y-m-d H:i:s");

            return '[' . $time . ']';
        }

        /**
         * Log Scheme URI
         *
         * @return string
         */

        private static function logSchemeURI() 
        {
            $uri = explode('?', $_SERVER['REQUEST_URI'])[0] ?? '/';
            $uri = preg_replace("/[^a-z\.A-z_0-9\/\-]/", '', $uri);
            $uri = ltrim(rtrim($uri, '/'), '/');

            if(!$uri)
            {
                $uri = '/';
            }

            return '[' . $uri . ']';
        }

        /**
         * Log Scheme Backtrace
         *
         * @param int $position
         * @return string
         */

        private static function logSchemeBacktrace($position)
        {
            $backtrace = debug_backtrace()[($position + 3)] ?? false;

            if($backtrace)
            {
                $backtrace = $backtrace['file'] . ' on line ' . $backtrace['line'];
            }

            if(!$backtrace)
            {
                return false;
            }

            return '[' . $backtrace . ']';
        }   
    }