<?php

    Trait LoadCreate
    {
        /**
         * Create static
         */

        private static function create($id, $type) 
        {
            $path = 
            [
                'addons' => DivHunt::getAddonsPath() . 'load/' . ceil($id / 1000) . '/' . $id . '.txt',
                'public' => load::getLoadPath() . ceil($id / 1000) . '/' . $id . '.' . $type
            ];

            if(!file_exists($path['addons']) || !file_exists($path['public']))
            {
                self::createAddonsFolder();
                self::createIDFolder($id);
                self::createIDFile($id, $type);
            }

            $file  = self::createGetFile($path);
            $build = self::createCheckBuild($file, $type);

            if($build || DivHunt::isDevelop())
            {
                self::createBuild($file, $type, $path);
            }

            return '/load/' . ceil($id / 1000) . '/' . $id . '.' . $type . '?v=' . filemtime($path['public']);
        }

        private static function createAddonsFolder()
        {
            if(!file_exists(DivHunt::getAddonsPath() . 'load'))
            {
                $maks = umask(0);
                mkdir(DivHunt::getAddonsPath() . 'load', 0777);
                umask($maks);
            }
        }

        private static function createIDFolder($id)
        {
            $folder = ceil($id / 1000);

            if(!file_exists(DivHunt::getAddonsPath() . 'load/' . $folder))
            {
                $maks = umask(0);
                mkdir(DivHunt::getAddonsPath() . 'load/' . $folder . '/', 0777);
                umask($maks);
            }

            if(!file_exists(load::getLoadPath() . $folder))
            {
                $maks = umask(0);
                mkdir(load::getLoadPath() . $folder . '/', 0777);
                umask($maks);
            }
        }

        private static function createIDFile($id, $type)
        {
            $folder = ceil($id / 1000);

            if(!file_exists(DivHunt::getAddonsPath() . 'load/' . $folder . '/' . $id . '.txt'))
            {
                $file = fopen(DivHunt::getAddonsPath() . 'load/' . $folder . '/' . $id . '.txt', 'w');
                fclose($file);
            }

            if(!file_exists(load::getLoadPath() . $folder . '/' . $id . '.txt'))
            {
                $file = fopen(load::getLoadPath() . $folder . '/' . $id . '.' . $type, 'w');
                fclose($file);
            }
        }

        private static function createGetFile($path)
        {
            $file = json_decode(file_get_contents($path['addons']));

            if(!$file)
            {
                $file      = new StdClass;
                $file->css = [];
                $file->js  = [];
            }
            else
            {
                $file->css = (array) $file->css;
                $file->js  = (array) $file->js;
            }

            return $file;
        }

        private static function createCheckBuild($file, $type)
        {
            $build = false;

            foreach(self::$load[$type] as $ids)
            {
                foreach($ids as $id => $paths)
                {
                    if(!in_array($id, $file->{$type}))
                    {
                        $build = true;
                    }
                }
            }

            return $build;
        }

        private static function createBuild($file, $type, $path)
        {
            ksort(self::$load[$type]);

            $file->{$type} = [];
            $code = '';

            foreach(self::$load[$type] as $ids)
            {
                foreach($ids as $id => $paths)
                {
                    if(!in_array($id, $file->{$type}))
                    {
                        array_push($file->{$type}, $id);
                    }

                    foreach($paths as $pth)
                    {
                        $code .= self::getStatic($pth, $type);
                    }
                }
            }

            file_put_contents($path['addons'], json_encode($file));
            file_put_contents($path['public'], $code);
        }
    }