<?php

    Trait DivHuntModes
    {
        /**
         * Configure DivHunt modes
         *
         * @return void
         */

        public static function modes()
        {
            $mode = $_POST['mode'] ?? ($_GET['mode'] ?? 'app');

            switch($mode) 
            {
                case 'app':
                    self::$mode = 'app';
                    break;

                case 'ajax':
                    self::$mode = 'ajax';
                    break;

                case 'spa':
                    self::$mode = 'spa';
                    break;

                case 'develop':
                    self::$mode = 'develop';
                    break;

                case 'build':
                    self::$mode = 'build';
                    break;

                case 'docs':
                    self::$mode = 'docs';
                    break;
                
                default:
                    self::$mode = 'app';
                    break;
            }

            self::modesApp();
            self::modesAjax();
            self::modesSpa();
            self::modesDevelop();
            self::modesBuild();
            self::modesDocs();
        }

        /**
         * Configure App mode
         *
         * @return void
         */

        private static function modesApp()
        {
            self::$app  = 
            [

            ];
        }

        /**
         * Configure Ajax mode
         *
         * @return void
         */

        private static function modesAjax()
        {
            self::$ajax = 
            [
                'files'      => [],
                'origins'    => [],
                'creditials' => ['get' => [], 'post' => []]
            ];
        }

        /**
         * Configure Spa mode
         *
         * @return void
         */

        private static function modesSpa()
        {
            self::$spa = 
            [
                
            ];
        }

        /**
         * Configure Develop mode
         *
         * @return void
         */

        private static function modesDevelop()
        {
            self::$develop = 
            [
                'fatals'   => [],
                'errors'   => [],
                'warnings' => [],
                'notices'  => []
            ];
        }

        /**
         * Configure Build mode
         *
         * @return void
         */

        private static function modesBuild()
        {
            self::$build = 
            [

            ];
        }

        /**
         * Configure Docs mode
         *
         * @return void
         */

        private static function modesDocs()
        {
            self::$docs = 
            [
                'projects' => []
            ];
        }
    }
    