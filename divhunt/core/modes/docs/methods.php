<?php

    Trait DivHuntDocsMethods
    {
        public static function docsGetProjects()
        {
            return self::$docs['projects'];
        }

        public static function docsCountProjects()
        {
            return count(self::$docs['projects']);
        }

        public static function docsGetProjectBySlug($slug)
        {
            if(!is_string($slug))
            {
                return false;
            }

            return self::$docs['projects'][$slug] ?? false;
        }

        public static function docsGetProjectTime($project)
        {
            if(!is_array(($project->pages ?? false)))
            {
                return false;
            }

            $time = 0;

            foreach($project->pages as $page)
            {
                if(!isset($page->time))
                {
                    return false;
                }

                $time = $time + (int) $page->time;
            }

            return $time;
        }

        public static function docsGetPageBySlug($project, $slug)
        {
            if(!is_array(($project->pages ?? false)))
            {
                return false;
            }

            if(!is_string($slug))
            {
                return false;
            }

            return $project->pages[$slug] ?? false;
        }

        public static function docsGetSectionBySlug($page, $slug)
        {
            if(!is_string($slug))
            {
                return false;
            }

            if(!is_array(($page->sections ?? false)))
            {
                return false;
            }

            if($slug[0] == 's')
            {
                $slug = str_replace('s', '', $slug);
            }

            return $page->sections[$slug] ?? false;
        }

        public static function docsGetFunctionBySlug($page, $slug)
        {   
            if(!is_string($slug))
            {
                return false;
            }

            if($slug[0] == 'f')
            {
                $type = 'functions';
                $slug = str_replace('f', '', $slug);
            }
            else if($slug[0] == 't')
            {
                $type = 'triggers';
                $slug = str_replace('t', '', $slug);
            }
            else
            {
                $type = 'methods';
                $slug = str_replace('m', '', $slug);
            }

            if(!is_array(($page->{$type} ?? false)))
            {
                return false;
            }

            return $page->{$type}[$slug] ?? false;
        }

        public static function docsGetBlocksBySlug($page, $slug)
        {
            if(!is_string($slug))
            {
                return false;
            }

            if(!is_array(($page->blocks ?? false)))
            {
                return false;
            }

            return $page->blocks[$slug] ?? false;
        }
    }   