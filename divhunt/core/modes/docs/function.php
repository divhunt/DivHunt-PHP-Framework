<?php

    Trait DivHuntDocsFunction
    {
        /**
         * Add docs function
         *
         * @param callable $callback 
         * @return string
         */

        public static function docsFunction($page, $callback = false) 
        {
            if(!DivHunt::isActiveMode('docs') || !is_callable($callback) || !isset($page->project))
            {
                return false;
            }

            if(!$project = self::docsGetProjectBySlug($page->project ?? false))
            {
                return false;
            }

            $function = self::docsFunctionPrepare(); $callback($function);

            if(!$function = $function->getFunction())
            {
                return false;
            }

            array_push(self::$docs['projects'][$project->slug]->pages[$page->slug]->{($function->type)}, $function);

            return true;
        }

        /**
         * Prepare default docs function
         *
         * @return object
         */

        private static function docsFunctionPrepare() 
        {
            return new class()
            {
                private $function;

                /**
                 * Class construct with default parameters
                 *
                 * @return void
                 */

                public function __construct()
                {
                    $this->function           = new StdClass;
                    $this->function->title    = false;
                    $this->function->category = false;
                    $this->function->type     = 'functions';
                    $this->function->elements = [];
                }

                /**
                 * Configure title
                 *
                 * @param string $title 
                 * @return object
                 */

                public function title($title) 
                {
                    $this->function->title = htmlspecialchars($title, ENT_QUOTES);

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
                    $this->function->category = preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($category));

                    return $this;
                }

                /**
                 * Configure type
                 *
                 * @param string $type 
                 * @return object
                 */

                public function type($type) 
                {
                    $type = strtolower($type);

                    if($type == 'function')
                    {
                        $this->function->type = 'functions';
                    }
                    else if($type == 'trigger')
                    {
                        $this->function->type = 'triggers';
                    }
                    else if($type == 'method')
                    {
                        $this->function->type = 'methods';
                    }

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
                    array_push($this->function->elements, ['h1' => htmlspecialchars($h1, ENT_QUOTES)]);

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
                    array_push($this->function->elements, ['h3' => htmlspecialchars($h3, ENT_QUOTES)]);

                    return $this;
                }

                /**
                 * Configure p
                 *
                 * @param string $p
                 * @return object
                 */

                public function p($p, $predefined = false) 
                {
                    switch ($predefined) 
                    {
                        case 'no-method-parameters':
                            $p = 'This method does not accept any parameters';
                            break;

                        case 'no-function-parameters':
                            $p = 'This function does not accept any parameters';
                            break;
                    }
                  

                    array_push($this->function->elements, ['p' => htmlspecialchars($p, ENT_QUOTES)]);
                
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
                    array_push($this->function->elements, ['note' => htmlspecialchars($note, ENT_QUOTES)]);
                
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
                    array_push($this->function->elements, ['warning' => htmlspecialchars($warning, ENT_QUOTES)]);
                
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
                    array_push($this->function->elements, ['danger' => htmlspecialchars($danger, ENT_QUOTES)]);
                
                    return $this;
                }

                /**
                 * Configure parameter
                 *
                 * @param string $name
                 * @param string $description
                 * @return object
                 */

                public function parameter($name, $description) 
                {
                    $name       = htmlspecialchars($name, ENT_QUOTES);
                    $description = htmlspecialchars($description, ENT_QUOTES);

                    array_push($this->function->elements, ['parameter' => '<div class="name">'.$name.'</div><div class="description">'.$description.'</div>']);
                
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

                    array_push($this->function->elements, ['code' => '<pre><code class="language-php">' . htmlspecialchars(file_get_contents($file), ENT_QUOTES) . '</code></pre><script>hljs.initHighlightingOnLoad();</script>']);
                
                    return $this;
                }

                /**
                 * Returns entire object with project configuration
                 *
                 * @return object
                 */

                public function getFunction()
                {
                    if(!count($this->function->elements) || !$this->function->title)
                    {
                        return false;
                    }

                    return $this->function;
                }
            };
        }
    }   