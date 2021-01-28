<?php

    include 'ajaxu.prepare.php';
    include 'ajaxu.catch.php';
    
    class ajaxu
    {
        use \AjaxuCatch, \AjaxuPrepare;

        /**
         * Data that will be stored after ajaxu is prepared
         *
         * @var object
         */

        private static $ajaxu;

        /**
         * Consturct class
         *
         * @return void
         */
    
        public static function construct()
        {
            self::$ajaxu             = new StdClass;
            self::$ajaxu->identifier = [];
            self::$ajaxu->data       = [];
            self::$ajaxu->value      = false;

            self::prepare();
            
            load::js('ajaxu', __DIR__ . '/js', 0);
        }
    }