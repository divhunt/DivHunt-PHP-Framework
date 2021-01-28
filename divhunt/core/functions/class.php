<?php

    Trait DivHuntFunctionClass
    {
        /**
         * Initialize class
         *
         * @param string $name 
         * @param array $constructs 
         * @return object
         */

        public static function class($name, ...$constructs)
        {
            return new class($name, $constructs) 
            {
                /**
                 * Constructor
                 *
                 * @param string $name 
                 * @param array $constructs 
                 * @return vodi
                 */

                public function __construct($name, $constructs)
                {
                    $this->class             = new StdClass;
                    $this->class->instance   = false;
                    $this->class->path       = false;
                    $this->class->full_path  = false;
                    $this->class->name       = preg_replace('/[^a-zA-Z0-9_]/', '', $name);
                    $this->class->constructs = $constructs; 
                }

                /**
                 * Setup if should be created instance
                 *
                 * @param bool $instance 
                 * @return object
                 */

                public function instance($instance)
                {
                    $this->class->instance = ($instance ?? false) ? true : false;

                    return $this;
                }

                /**
                 * Setup path
                 *
                 * @param string $path 
                 * @return mixed
                 */

                public function from($path, $full = false)
                {
                    if($full)
                    {
                        $this->class->path      = rtrim($path, '/');
                        $this->class->full_path = true;
                    }
                    else
                    {
                        $path = preg_replace('/[^a-z.A-Z\/0-9_-]/', '', $path);
                        $this->class->path = ltrim(rtrim($path, '/'), '/');
                    }
                    
                    return $this->load();
                }

                /**
                 * Load class
                 *
                 * @return object
                 */

                private function load()
                {
                    if(!$this->loadClassExist())
                    {
                        DivHunt::log($this->class->name . ': folder could not be found')->scheme('bt2')->log();
                    }

                    include_once $this->class->path . 'class.php';

                    if(!class_exists($this->class->name))
                    {
                        DivHunt::log('Class name missmatch.')->scheme('bt2')->log();
                    }

                    if(file_exists($this->class->path . 'mode/' . DivHunt::getActiveMode() . '/app.php'))
                    {
                        include_once $this->class->path . 'mode/' . DivHunt::getActiveMode() . '/app.php';
                    }

                    if(file_exists($this->class->path . 'hook/run/app.php'))
                    {
                        include_once $this->class->path . 'hook/run/app.php';
                    }

                    foreach(DivHunt::getTriggers('class_load') as $trigger) { $trigger($this->class); }
                    
                    DivHunt::setLoad('class', $this->class->name, ['path' => $this->class->path]);

                    $class = $this->class->name;

                    if($this->class->instance)
                    {
                        $class = new $class(...$this->class->constructs);
                        
                        foreach(DivHunt::getTriggers('class_instance') as $trigger) { $trigger($class, $this->class); }
                        
                        return $class; 
                    }
                    else
                    {
                        if(method_exists($class, 'construct'))
                        {
                            $class::construct(...$this->class->constructs);
                        }
                    }
                }

                /**
                 * Check if class exist
                 *
                 * @return bool
                 */

                private function loadClassExist() 
                {
                    if($this->class->path)
                    {
                        if($this->class->full_path)
                        {
                            $this->class->path = $this->class->path . '/' . $this->class->name . '/';
                        }
                        else
                        {
                            $this->class->path =  DivHunt::getPath() . $this->class->path . '/' . $this->class->name . '/';
                        }
                    }
                    else
                    {
                        $this->class->path = DivHunt::getPath() . $this->class->name . '/';
                    }
                    
                    if(file_exists($this->class->path . 'class.php'))
                    {
                        return true;
                    }
                }              
            };
        }
    }