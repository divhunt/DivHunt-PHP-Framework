<?php

    Trait LoadStatic
    {
        /**
         * Get static code
         *
         * @param object $path 
         * @param string $type
         * @return mix
         */

        public static function getStatic($path, $type)
        {
            if(!is_string($path) || !in_array($type, ['css', 'js']))
            {
                return false;
            }
            
            if(!file_exists($path))
            {
                return false;
            }

            $files = self::getStaticFiles(rtrim($path, '/') . '/', $type);
            $code  = '';

            foreach($files as $file)
            {
                $code .= self::getStaticCode($file) . ' ';
            }

            if(!empty($code))
            {
                return rtrim($code, ' ');
            }

            return false;
        }

        /**
         * Get static files
         *
         * @param string $path 
         * @param string $type
         * @param array $files
         * @return array
         */

        private static function getStaticFiles($path, $type, $files = [])
        {
            $dirs = scandir($path);

            unset($dirs[array_search('.', $dirs, true)]);
            unset($dirs[array_search('..', $dirs, true)]);

            if(count($dirs) < 1)
            {
                return $files;
            }

            foreach($dirs as $dir)
            {
                if(is_dir($path . '/' . $dir)) 
                {
                    $files = self::getStaticFiles($path . $dir . '/', $type, $files);
                }
                else
                {
                    if(strpos($dir, '.' . $type) !== false)
                    {
                        array_push($files, $path . $dir);
                    }
                }
            }

            sort($files);
            return $files;
        }

         /**
         * Get code from file
         *
         * @param string $path 
         * @return string
         */

        private static function getStaticCode($path)
        {
            $code = file_get_contents($path);
            $path = explode('/', $path);
            $path = $path[count($path) - 1];

            if(strpos($path, '.min') !== false) 
            {
                return str_replace(array('\n','\r'), ' ', trim(preg_replace('/\s+/', ' ', $code)));
            }

            return $code;
        }
    }