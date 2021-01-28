<?php

    Trait DivHuntMethodsTriggers
    {
        public static function getTriggers($name)
        {
            if(!is_string($name))
            {
                return [];
            }

            return self::$triggers[strtolower($name)] ?? [];
        }

        public static function runTrigger($name, ...$data)
        {
            if(!is_string($name))
            {
                return;
            }

            foreach(self::getTriggers($name) as $trigger)
            {
                $trigger(...$data);
            }
        }
    }