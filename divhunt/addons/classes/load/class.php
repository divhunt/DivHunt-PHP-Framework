<?php
    
    include 'load.methods.php';
    include 'load.create.php';
    include 'load.static.php';
    include 'load.echo.php';

    class load
    {
        use LoadMethods, LoadCreate, LoadStatic, LoadEcho;

        /**
         * Load
         *
         * @var object
         */

        public static $load = ['css' => [], 'js' => []];
    }