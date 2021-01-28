<?php
    
    include 'block.methods.php';
    include 'block.use.php';

    class block
    {
        use \BlockMethods, \BlockUse;

        /**
         * Block paths
         *
         * @var object
         */

        public static $paths;

        /**
         * Block load
         *
         * @var object
         */

        private static $block;

        /**
         * Consturct class
         *
         * @return void
         */

        public static function construct()
        {
            load::js('block', __DIR__ . '/js', 0);
        }
    }