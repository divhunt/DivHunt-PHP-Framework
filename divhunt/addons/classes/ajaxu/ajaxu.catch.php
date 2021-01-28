<?php

    Trait AjaxuCatch
    {
        /**
         * Check if case match with identifier
         *
         * @param ...$identifier
         * @return object
         */

        public static function catch(...$identifier)
        {
            $match = false;

            $match1 = array_diff($identifier, self::$ajaxu->identifier);
            $match2 = array_diff(self::$ajaxu->identifier, $identifier);

            if(!count($match1) && !count($match2))
            {
                $match = true;
            }

            return self::catchClass($match);
        }

        /**
         * Create anonim. class for then
         *
         * @param $match
         * @return object
         */

        private static function catchClass($match)
        {
            return new Class($match, self::$ajaxu)
            {
                public function __construct($match, $ajaxu)
                {
                    $this->match = $match;
                    $this->ajaxu = $ajaxu;
                }

                public function then($callback = false)
                {
                    if(is_callable($callback) && $this->match)
                    {
                        $return = $callback($this->ajaxu->value, $this->ajaxu->data);

                        DivHunt::ajaxExit($return['success'] ?? 0, $return['info'] ?? 'AjaxU failed to update.', $return['data'] ?? []);
                    }
                }
            };
        }
    }