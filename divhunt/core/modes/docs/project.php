<?php

    Trait DivHuntDocsProject
    {
        /**
         * Prepare docs project
         *
         * @param callable $callback 
         * @return string
         */

        public static function docsProject($callback = false) 
        {
            if(!DivHunt::isActiveMode('docs') || !is_callable($callback))
            {
                return false;
            }

            $project = self::docsProjectPrepare(); $callback($project);
            
            if(!$project = $project->getProject())
            {
                return false;
            }

            if(isset(self::$docs['projects'][$project->slug]))
            {
                return self::$docs['projects'][$project->slug];
            }
            
            self::$docs['projects'][$project->slug] = $project; return $project;
        }
        
        /**
         * Prepare default docs project
         *
         * @return object
         */

        private static function docsProjectPrepare() 
        {
            return new class 
            {
                private $project;

                /**
                 * Class construct with default parameters
                 *
                 * @return void
                 */

                public function __construct()
                {
                    $this->project              = new StdClass;
                    $this->project->title       = false;
                    $this->project->slug        = false;
                    $this->project->description = false;
                    $this->project->pages       = [];
                }

                /**
                 * Configure title
                 *
                 * @param string $title 
                 * @return object
                 */

                public function title($title) 
                {
                    $this->project->title = htmlspecialchars($title, ENT_QUOTES);
                
                    return $this;
                }

                /**
                 * Configure slug
                 *
                 * @param string $slug 
                 * @return object
                 */

                public function slug($slug) 
                {
                    $this->project->slug = preg_replace('/[^a-zA-Z0-9-]/', '', $slug);
                    
                    return $this;
                }

                /**
                 * Configure description
                 *
                 * @param string $description 
                 * @return object
                 */

                public function description($description) 
                {
                    $this->project->description = htmlspecialchars($description, ENT_QUOTES);

                    return $this;
                }

                /**
                 * Returns entire object with project configuration
                 *
                 * @return object
                 */

                public function getProject()
                {
                    if(
                        !$this->project->title       ||
                        !$this->project->slug        ||
                        !$this->project->description
                    )
                    {
                        return false;
                    }

                    return $this->project;
                }
            };
        }
    }   