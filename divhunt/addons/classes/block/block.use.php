<?php

    Trait BlockUse
    {
        /**
         * Use block
         *
         * @param string $name 
         * @param string $path 
         * @param callable $callback 
         * @return object
         */

        public static function use($name, $path = false, $callback = false) 
        {
            self::useSetBlock(false);

            if(is_callable($callback))
            {
                $class = self::useClass($name, $path);
                $callback($class);

                return $class->load();
            }
            else
            {
                return self::useClass($name, $path);
            }
        }

        /**
         * Use prepare class
         *
         * @param string $name 
         * @param string $path 
         * @return object
         */

        private static function useClass($name, $path = false) 
        {
            return new Class($name, $path)
            {
                /**
                 * Store block data
                 *
                 * @var object
                 */

                private $block;

                /**
                 * Construct class and set default data
                 *
                 * @param string $path 
                 * @param string $path 
                 * @return void
                 */

                public function __construct($name, $path)
                {
                    $this->block             = new StdClass;
                    $this->block->vars       = new StdClass;
                    $this->block->name       = $this->getName($name);
                    $this->block->path       = $this->getPath($name, $path);
                    $this->block->class      = false;
                    $this->block->id         = false;
                    $this->block->wrap       = true;
                    $this->block->force      = false;

                    $path = $this->block->path;
                    $path = ltrim($path, '/home/divhunt_wghf84ynw3tozogt/dh/');
                    $path = ltrim($path, '/opt/lampp/htdocs/dh/');

                    $this->block->indetifier = 'b' . substr(md5($path), 0, 6);
                }

                /**
                 * Accept any incoming key - value vars.
                 *
                 * @param string $path 
                 * @param array $arguments 
                 * @return object
                 */

                public function __call($name, $arguments)
                {
                    $name = strtolower($name);

                    if(count($arguments) > 1)
                    {
                        $this->block->vars->{$name} = $arguments; 
                    }
                    else if(count($arguments) == 1)
                    {
                        $this->block->vars->{$name} = $arguments[0]; 
                    }
                    
                    return $this;
                }

                /**
                 * Set class
                 *
                 * @param string $class 
                 * @return object
                 */

                public function class($class)
                {
                    if(!is_string($class))
                    {
                        return;
                    }

                    $this->block->class = $class;
                    return $this;
                }

                /**
                 * Set id
                 *
                 * @param string $id 
                 * @return object
                 */

                public function id($id)
                {
                    if(!is_string($id))
                    {
                        return;
                    }

                    $this->block->id = $id;
                    return $this;
                }

                /**
                 * Set wrap
                 *
                 * @param bool $wrap 
                 * @return object
                 */

                public function wrap($wrap)
                {
                    if(!is_bool($wrap))
                    {
                        return;
                    }

                    $this->block->wrap = $wrap;
                    return $this;
                }

                /**
                 * Force load on any mode
                 *
                 * @param bool $wrap 
                 * @return object
                 */

                public function force($force)
                {
                    if(!is_bool($force))
                    {
                        return;
                    }

                    $this->block->force = $force;
                    return $this;
                }

                /**
                 * Process block and load
                 *
                 * @return string
                 */

                public function load()
                {
                    if(!$this->block->name || !$this->block->path)
                    {
                        DivHunt::log('Block "' . $this->block->name . '" is invalid.')->type('warning')->show(true)->log();
                        return __DIR__ . '/load/empty.php';
                    }

                    if(!file_exists($this->block->path . 'block.php'))
                    {
                        DivHunt::log('Block "' . $this->block->name . '" does not exist.')->type('warning')->show(true)->log();
                        return __DIR__ . '/load/empty.php';
                    }

                    DivHunt::setLoad('block', $this->block->name, ['path' => $this->block->path]);
                    DivHunt::runTrigger('block_load', $this->block);

                    block::useSetBlock($this->block);

                    return __DIR__ . '/load/load.php';
                }

                /**
                 * Get block name
                 *
                 * @param string $name
                 * @return string
                 */

                private function getName($name)
                {
                    $name = preg_replace('/[^a-zA-Z\/0-9_-]/', '', $name);

                    return ltrim(rtrim($name, '/'), '/');
                }

                /**
                 * Get block path
                 *
                 * @param string $name
                 * @param string $path
                 * @return string
                 */

                private function getPath($name, $path)
                {
                    $global = block::getPath($path);
                    
                    if($global)
                    {
                        return DivHunt::getPath() . ltrim($global, '/') . $name . '/';
                    }
                    else if($path)
                    {
                        return rtrim($path, '/') . '/' . $name . '/';
                    }
                    else
                    {
                        return DivHunt::getPath() . $name . '/';
                    }
                }  
            };
        }

        /**
         * Use get block
         *
         * @return object
         */

        public static function useGetLoad()
        {
            return new Class(self::$block)
            {
                /**
                 * Store block data
                 *
                 * @var object
                 */

                private $block;

                /**
                 * Construct class and set default data
                 *
                 * @return void
                 */

                public function __construct($block)
                {
                    $this->block = $block;
                }

                /**
                 * Check if block is loaded
                 *
                 * @return bool
                 */

                public function isLoaded()
                {
                    if($this->block)
                    {
                        return true;
                    }
                }

                /**
                 * Get block path
                 *
                 * @return string
                 */

                public function getName()
                {
                    return $this->block->name ?? false;
                }

                /**
                 * Get block path
                 *
                 * @return string
                 */

                public function getPath()
                {
                    return $this->block->path ?? false;
                }

                /**
                 * Get block indetifier
                 *
                 * @return string
                 */

                public function getIdentifier()
                {
                    return $this->block->indetifier ?? false;
                }

                /**
                 * Get block class
                 *
                 * @return string
                 */

                public function getClass()
                {
                    return $this->block->class ?? false;
                }

                /**
                 * Get block ID
                 *
                 * @return string
                 */

                public function getID()
                {
                    return $this->block->id ?? false;
                }

                /**
                 * Check if block is wrappable
                 *
                 * @return string
                 */

                public function canWrap()
                {
                    return ($this->block->wrap ?? false) ? true : false;
                }

                /**
                 * Check if block should force load on any mode
                 *
                 * @return string
                 */

                public function shouldForce()
                {
                    return ($this->block->force ?? false) ? true : false;
                }

                /**
                 * Get block attributes
                 *
                 * @return array
                 */

                public function getAttributes()
                {
                    $attributes = [];

                    if($this->getClass())
                    {
                        array_push($attributes, 'class="' . $this->getClass() . ' ' . $this->getIdentifier() . '"');
                    }
                    else
                    {
                        array_push($attributes, 'class="' . $this->getIdentifier() . '"');
                    }

                    if($this->getID())
                    {
                        array_push($attributes, 'id="' . $this->getID() . '"');
                    }

                    return $attributes;
                }
                
                /**
                 * Get block var by key
                 *
                 * @param string $key
                 * @param string $type
                 * @return mix
                 */

                public function get($key, $type = false)
                {
                    $key = strtolower($key);

                    if($type === 'array')
                    {
                        return $this->block->vars->{$key} ?? [];
                    }
                    else
                    {
                        return $this->block->vars->{$key} ?? false; 
                    }
                }  
            };
        }

        /**
         * Use load block
         *
         * @param object $block 
         * @return void
         */

        public static function useSetBlock($block)
        {
            if(!$block)
            {
                self::$block = false; return;
            }

            if(is_object($block))
            {
                self::$block = $block;
            }
        }
    }