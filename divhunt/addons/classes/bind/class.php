<?php
    
    include 'bind.domain.php';
    include 'bind.methods.php';

    class bind
    {
        use \BindDomain, \BindMethods;

        /**
         * Data that will be stored after bind class is included
         *
         * @var array
         */

        private static $bind;

        /**
         * Binded domain data after succesfull bind
         *
         * @var array
         */

        private static $binded;

        /**
         * Supported tdls
         *
         * @var array
         */

        private static $tdls = ['com', 'org', 'net', 'ai', 'info', 'dev', 'to'];

        /**
         * Class constructor
         *
         * @var array $tdls
         * @return void
         */

        public static function construct($tdls = [])
        {
            if(is_array($tdls))
            {
                if(count($tdls)) self::$tdls = $tdls;
            }

            self::$bind            = new StdClass;
            self::$bind->host      = DivHunt::getHost();
            self::$bind->tdl       = false;
            self::$bind->domain    = false;
            self::$bind->subdomain = false;
            self::$bind->https     = false;
            self::$bind->url       = false;
            self::$bind->uri       = '/';
            self::$bind->binded    = 0;

            self::bindGetTDL();
            self::bindGetDomain();
            self::bindGetSubdomain();
            self::bindGetHttps();
            self::bindGetUri();
            self::bindBuildUrl();
        }

        /**
         * Get TDL
         *
         * @return void
         */

        private static function bindGetTDL()
        {
            $support = 0;

            foreach(self::$tdls as $tdl)
            {
                if(preg_match("~\b{$tdl}\b~", self::$bind->host))
                {
                    self::$bind->tdl  = $tdl;
                    self::$bind->host = str_replace('.' . $tdl, '', self::$bind->host);

                    $support = 1;
                }
            }

            if(!$support)
            {
                divhunt::log('Bind does not support your domain TDL. Please add TDL manually.')->log();
            }

            self::$bind->host = explode('.', self::$bind->host);
        }

        /**
         * Get Domain
         *
         * @return void
         */

        private static function bindGetDomain()
        {   
            $key = count(self::$bind->host) - 1;

            if(isset(self::$bind->host[$key]))
            {
                self::$bind->domain = self::$bind->host[$key]; unset(self::$bind->host[$key]);
            }
            else
            {
                divhunt::log('There was problem finding domain name.')->log();
            }
        }

        /**
         * Get Domain
         *
         * @return void
         */

        private static function bindGetSubdomain()
        {   
            foreach(self::$bind->host as $subdomain)
            {
                self::$bind->subdomain .= $subdomain . '.';
            }

            self::$bind->subdomain = rtrim(self::$bind->subdomain, '.'); unset(self::$bind->host);
        }

        /**
         * Get https status
         *
         * @return void
         */

        private static function bindGetHttps()
        {
            if(($_SERVER['HTTPS'] ?? false) === 'on') 
            {
                self::$bind->https = true;
            }
        }

        /**
         * Get URI
         *
         * @return void
         */

        private static function bindGetUri()
        {
            $uri = explode('?', ($_SERVER['REQUEST_URI'] ?? false))[0] ?? '/';
            $uri = preg_replace("/[^a-z\.A-z_0-9\/\-]/", '', $uri);
            
            self::$bind->uri = rtrim(ltrim($uri, '/'), '/');
        }

        /**
         * Get URL
         *
         * @return void
         */

        private static function bindBuildUrl()
        {
            if(self::$bind->https)
            {
                self::$bind->url = 'https://';
            }
            else
            {
                self::$bind->url = 'http://';
            }

            if(self::$bind->subdomain)
            {
                self::$bind->url .= self::$bind->subdomain . '.';
            }

            self::$bind->url .= self::$bind->domain;
            self::$bind->url .= '.' . self::$bind->tdl;
        }
    }