<?php

    include 'route.process.php';
    include 'route.methods.php';
    include 'route.functions.php';

    class route
    {
        use \RouteProcess, \RouteMethods, \RouteFunctions;

        /**
         * Route data which will be stored
         *
         * @param object $data
         */

        public static $data;

        /**
         * Route paths
         *
         * @param object $data
         */

        private static $paths = [];

        /**
         * Consturct class
         *
         * @return void
         */

        public static function construct()
        {
            self::$data          = new StdClass;
            self::$data->matched = false;
            self::$data->route   = false;

            self::showPaths();
        }
    }