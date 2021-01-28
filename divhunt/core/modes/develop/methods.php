<?php

    Trait DivHuntDevelopMethods
    {
        /* [Fatal] */

            public static function developGetFatals()
            {
                return self::$develop['fatals'];
            }

            public static function developAddFatal($text)
            {
                array_push(self::$develop['fatals'], htmlspecialchars($text, ENT_QUOTES));
            }

        /* [Errors] */

            public static function developGetErrors()
            {
                return self::$develop['errors'];
            }

            public static function developAddError($text)
            {
                array_push(self::$develop['errors'], htmlspecialchars($text, ENT_QUOTES));
            }

        /* [Warnings] */

            public static function developGetWarnings()
            {
                return self::$develop['warnings'];
            }

            public static function developAddWarning($text)
            {
                array_push(self::$develop['warnings'], htmlspecialchars($text, ENT_QUOTES));
            }

        /* [Notices] */

            public static function developGetNotices()
            {
                return self::$develop['notices'];
            }

            public static function developAddNotice($text)
            {
                array_push(self::$develop['notices'], htmlspecialchars($text, ENT_QUOTES));
            }
    }   