<?php

    Trait ApiMethods
    {
        public static function get($key)
        {
            return self::${$key} ?? false;
        }
    }