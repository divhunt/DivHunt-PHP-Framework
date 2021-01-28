<?php

    Trait BindDomain
    {
        /**
         * Bind Domain
         *
         * @var callable $callback
         * @return string
         */

        public static function domain($callback = false)
        {
            if(self::isBinded() || !is_callable($callback))
            {
                return __DIR__ . '/load/empty.php';
            }

            $domain = self::domainPrepare(); $callback($domain);
            $domain = $domain->getDomain();

            if(
                $domain->tdl       == self::getTdl()       &&
                $domain->subdomain == self::getSubdomain() &&
                $domain->domain    == self::getDomain()    &&
                ($domain->https    == self::isHttps()      || $domain->https == 2)
            )
            {
                self::$binded = $domain;

                if($domain->subdomain)
                {   
                    DivHunt::ajaxAddOrigin($domain->subdomain . '.' . $domain->domain . '.' . $domain->tdl);
                }
                else
                {
                    DivHunt::ajaxAddOrigin($domain->domain . '.' . $domain->tdl);
                }

                foreach(DivHunt::getTriggers('bind_domain') as $trigger) { $trigger($domain); }
                return DivHunt::getPath() . $domain->path;
            }

            return __DIR__ . '/load/empty.php';
        }

        /**
         * Bind Domain Prepare
         *
         * @return object
         */

        private static function domainPrepare() 
        {
            return new class 
            {
                private $domain;

                public function __construct()
                {
                    $this->domain            = new StdClass;
                    $this->domain->tdl       = false; 
                    $this->domain->subdomain = false; 
                    $this->domain->domain    = false; 
                    $this->domain->https     = false; 
                    $this->domain->path      = '/';
                }

                public function tdl($tdl) 
                {
                    if(!is_scalar($tdl))
                    {
                        return false;
                    }

                    $this->domain->tdl = $tdl;
                }

                public function subdomain($subdomain) 
                {
                    if(!is_scalar($subdomain))
                    {
                        return false;
                    }

                    $this->domain->subdomain = $subdomain;
                }

                public function domain($domain) 
                {
                    if(!is_scalar($domain))
                    {
                        return false;
                    }

                    $this->domain->domain = $domain;
                }

                public function https($https) 
                {
                    if(!is_scalar($https))
                    {
                        return false;
                    }

                    if(strtolower($https) === 'any')
                    {
                        $this->domain->https = 2;
                    }
                    else if($https)
                    {
                        $this->domain->https = 1;
                    }
                    else
                    {
                        $this->domain->https = 0;
                    }
                }

                public function path($path) 
                {
                    if(!is_scalar($path))
                    {
                        return false;
                    }
                    
                    $path = preg_replace('/[^a-z0-9A-Z\/\.]/', '', $path);

                    if(strpos($path, '.php') !== false)
                    {
                        $this->domain->path = $path;
                    }
                    else
                    {
                        $this->domain->path = rtrim($path, '/') . '/' . 'app.php';
                    }
                }

                public function getDomain() 
                {
                    return $this->domain;
                }
            };
        }
    }