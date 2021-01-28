<?php

    Trait DivHuntDocsBlock
    {
        /**
         * Add docs block
         *
         * @param callable $callback 
         * @return string
         */

        public static function docsBlock($page, $callback = false) 
        {
            if(!DivHunt::isActiveMode('docs') || !is_callable($callback) || !isset($page->project))
            {
                return false;
            }

            if(!$project = self::docsGetProjectBySlug($page->project ?? false))
            {
                return false;
            }

            $block = self::docsBlockPrepare(); $callback($block);

            if(!$block = $block->getBlock())
            {
                return false;
            }

            if(!isset(self::$docs['projects'][$project->slug]->pages[$page->slug]->blocks[$block->category]))
            {
                self::$docs['projects'][$project->slug]->pages[$page->slug]->blocks[$block->category] = [];
            }

            array_push(self::$docs['projects'][$project->slug]->pages[$page->slug]->blocks[$block->category], $block);

            return true;
        }

        /**
         * Prepare default docs block
         *
         * @return object
         */

        private static function docsBlockPrepare() 
        {
            return new class()
            {
                private $block;

                /**
                 * Class construct with default parameters
                 *
                 * @return void
                 */

                public function __construct()
                {
                    $this->block            = new StdClass;
                    $this->block->title     = false;
                    $this->block->category  = false;
                    $this->block->code      = false;
                    $this->block->hide_html = false;
                }

                /**
                 * Configure title
                 *
                 * @param string $title 
                 * @return object
                 */

                public function title($title) 
                {
                    $this->block->title = htmlspecialchars($title, ENT_QUOTES);

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
                    $this->block->category = preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($category));

                    return $this;
                }

                /**
                 * Configure code
                 *
                 * @param string $file
                 * @return object
                 */

                public function code($file, $hide_html = false) 
                {
                    if(!file_exists($file))
                    {
                        return $this;
                    }   

                    if($hide_html)
                    {
                        $this->block->hide_html = true;
                    }

                    $this->block->code = file_get_contents($file);
                
                    return $this;
                }

                /**
                 * Returns entire object with block configuration
                 *
                 * @return object
                 */

                public function getBlock()
                {
                    if(!$this->block->title || !$this->block->category || !$this->block->code)
                    {
                        return false;
                    }

                    return $this->block;
                }
            };
        }
    }   