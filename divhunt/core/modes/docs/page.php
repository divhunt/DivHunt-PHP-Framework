<?php

    Trait DivHuntDocsPage
    {
        /**
         * Add docs section
         *
         * @param callable $callback 
         * @return string
         */

        public static function docsPage($slug, $callback = false) 
        {
            if(!DivHunt::isActiveMode('docs') || !is_string($slug) || !is_callable($callback))
            {
                return false;
            }
            
            if(!$project = self::docsGetProjectBySlug($slug))
            {
                return false;
            }

            $page = self::docsPagePrepare($project->slug); $callback($page);

            if(!$page = $page->getPage())
            {
                return false;
            }

            if(isset(self::$docs['projects'][$project->slug]->pages[$page->slug]))
            {
                return self::$docs['projects'][$project->slug]->pages[$page->slug];
            }
            
            self::$docs['projects'][$project->slug]->pages[$page->slug] = $page; return $page;
        }

        /**
         * Prepare default docs page
         *
         * @return object
         */

        private static function docsPagePrepare($project) 
        {
            return new class($project)
            {
                private $page;

                /**
                 * Class construct with default parameters
                 *
                 * @return void
                 */

                public function __construct($project)
                {
                    $this->page              = new StdClass;
                    $this->page->project     = $project;
                    $this->page->title       = false;
                    $this->page->slug        = false;
                    $this->page->category    = false;
                    $this->page->description = false;
                    $this->page->time        = 0;
                    $this->page->sections    = [];
                    $this->page->functions   = [];
                    $this->page->methods     = [];
                    $this->page->triggers    = [];
                    $this->page->blocks      = [];
                }

                /**
                 * Configure title
                 *
                 * @param string $title 
                 * @return object
                 */

                public function title($title) 
                {
                    $this->page->title = htmlspecialchars($title, ENT_QUOTES);
                
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
                    $this->page->slug = preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($slug));
                    
                    return $this;
                }

                /**
                 * Configure category
                 *
                 * @param string $category 
                 * @return object
                 */

                public function category($category) 
                {
                    $this->page->category = preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($category));
                    
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
                    $this->page->description = htmlspecialchars($description, ENT_QUOTES);

                    return $this;
                }

                /**
                 * Configure read time
                 *
                 * @param int $time 
                 * @return object
                 */

                public function time($time) 
                {
                    $this->page->time = (int) $time;
                
                    return $this;
                }

                /**
                 * Returns entire object with page configuration
                 *
                 * @return object
                 */

                public function getPage()
                {
                    if(
                        !$this->page->title       ||
                        !$this->page->slug        ||
                        !$this->page->description
                    )
                    {
                        return false;
                    }

                    return $this->page;
                }
            };
        }
    }   