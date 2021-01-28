<?php

    Trait BindMethods
    {
        public static function getTdls()
        {
            return self::$tdls;
        }

        public static function getTdl()
        {
            return self::$bind->tdl;
        }

        public static function getDomain()
        {
            return self::$bind->domain;
        }

        public static function getSubdomain()
        {
            return self::$bind->subdomain;
        }

        public static function getUrl()
        {
            return self::$bind->url;
        }

        public static function getUri()
        {
            return self::$bind->uri;
        }

        public static function isHttps()
        {
            return self::$bind->https;
        }

        public static function isBinded()
        {
            return (self::$binded) ? true : false;
        }

        public static function getBinded()
        {
            return self::$binded;
        }
    }