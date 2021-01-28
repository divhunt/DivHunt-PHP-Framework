<?php

    Trait LoadEcho
    {
        /**
         * Echo load JS
         */

        public static function echoJS($id, $ignore = [], $show = false) 
        {
            $code = '';

            foreach(self::$load['js'] as $loads)
            {
                foreach($loads as $key => $paths)
                {
                    if($key === $id)
                    {
                        $files = [];

                        foreach($paths as $path)
                        {
                            foreach(self::getStaticFiles($path . '/', 'js') as $file)
                            {
                                $files[] = $file;
                            }
                        }

                        foreach ($files as $key => $file) 
                        {
                            if(str_replace($ignore, '', $file) != $file)
                            {
                                unset($files[$key]);
                            }
                        }

                        foreach($files as $key => $file)
                        {
                            $code .= self::getStaticCode($file);
                        }
                    }
                }
            }

            if($show)
            {
                print_r($files); return;
            }

            return $code;
        }

        /**
         * Echo load CSS
         */

        public static function echoCSS($id, $ignore = [], $show = false) 
        {
            $code = '';

            foreach(self::$load['css'] as $loads)
            {
                foreach($loads as $key => $paths)
                {
                    if($key === $id)
                    {
                        $files = [];

                        foreach($paths as $path)
                        {
                            foreach(self::getStaticFiles($path . '/', 'css') as $file)
                            {
                                $files[] = $file;
                            }
                        }

                        foreach ($files as $key => $file) 
                        {
                            if(str_replace($ignore, '', $file) != $file)
                            {
                                unset($files[$key]);
                            }
                        }

                        foreach($files as $key => $file)
                        {
                            $code .= self::getStaticCode($file);
                        }
                    }
                }
            }

            if($show)
            {
                print_r($files); return;
            }

            return $code;
        }

    }