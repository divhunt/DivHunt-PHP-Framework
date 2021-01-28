<?php

    Trait DivHuntDocsSection
    {
        /**
         * Add docs section
         *
         * @param callable $callback 
         * @return string
         */

        public static function docsSection($page, $callback = false) 
        {
            if(!DivHunt::isActiveMode('docs') || !is_callable($callback) || !isset($page->project))
            {
                return false;
            }

            if(!$project = self::docsGetProjectBySlug($page->project ?? false))
            {
                return false;
            }

            $section = self::docsSectionPrepare(); $callback($section);

            if(!$section = $section->getSection())
            {
                return false;
            }

            array_push(self::$docs['projects'][$project->slug]->pages[$page->slug]->sections, $section);

            return true;
        }

        /**
         * Prepare default docs section
         *
         * @return object
         */

        private static function docsSectionPrepare() 
        {
            return new class()
            {
                private $section;

                /**
                 * Class construct with default parameters
                 *
                 * @return void
                 */

                public function __construct()
                {
                    $this->section           = new StdClass;
                    $this->section->title    = false;
                    $this->section->elements = [];
                }

                /**
                 * Configure title
                 *
                 * @param string $title 
                 * @return object
                 */

                public function title($title) 
                {
                    $this->section->title = htmlspecialchars($title, ENT_QUOTES);

                    return $this;
                }

                /**
                 * Configure h1
                 *
                 * @param string $h1 
                 * @return object
                 */

                public function h1($h1) 
                {
                    array_push($this->section->elements, ['h1' => htmlspecialchars($h1, ENT_QUOTES)]);

                    return $this;
                }

                /**
                 * Configure h3
                 *
                 * @param string $h3 
                 * @return object
                 */

                public function h3($h3) 
                {
                    array_push($this->section->elements, ['h3' => htmlspecialchars($h3, ENT_QUOTES)]);

                    return $this;
                }

                /**
                 * Configure p
                 *
                 * @param string $p
                 * @return object
                 */

                public function p($p) 
                {
                    array_push($this->section->elements, ['p' => htmlspecialchars($p, ENT_QUOTES)]);
                
                    return $this;
                }

                /**
                 * Configure note
                 *
                 * @param string $note
                 * @return object
                 */

                public function note($note) 
                {
                    array_push($this->section->elements, ['note' => htmlspecialchars($note, ENT_QUOTES)]);
                
                    return $this;
                }

                /**
                 * Configure warning
                 *
                 * @param string $warning
                 * @return object
                 */

                public function warning($warning) 
                {
                    array_push($this->section->elements, ['warning' => htmlspecialchars($warning, ENT_QUOTES)]);
                
                    return $this;
                }

                /**
                 * Configure danger
                 *
                 * @param string $danger
                 * @return object
                 */

                public function danger($danger) 
                {
                    array_push($this->section->elements, ['danger' => htmlspecialchars($danger, ENT_QUOTES)]);
                
                    return $this;
                }

                /**
                 * Configure code
                 *
                 * @param string $file
                 * @return object
                 */

                public function code($file) 
                {
                    if(!file_exists($file))
                    {
                        return $this;
                    }   

                    array_push($this->section->elements, ['code' => '<pre><code class="language-php">' . file_get_contents($file) . '</code></pre><script>hljs.initHighlightingOnLoad();</script>']);
                
                    return $this;
                }

                /**
                 * Returns entire object with project configuration
                 *
                 * @return object
                 */

                public function getSection()
                {
                    if(!count($this->section->elements) || !$this->section->title)
                    {
                        return false;
                    }

                    return $this->section;
                }
            };
        }
    }   