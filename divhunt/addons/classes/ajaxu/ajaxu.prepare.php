<?php

    Trait AjaxuPrepare
    {
        /**
         * Prepare ajaxu for use
         *
         * @return void
         */

        private static function prepare()
        {
            if(!$ajaxu = post('ajaxu'))
            {
                return;
            }

            $ajaxu = array_values(array_filter(explode(',', $ajaxu)));
            $identifier = $ajaxu[0] ?? false;

            if(!$ajaxu || !$identifier)
            {
                DivHunt::ajaxExit(0, 'Ajax Update could not be configured properly.');
            }

            unset($ajaxu[0]);

            self::$ajaxu->identifier = array_values(array_filter(explode('.', $identifier)));
            self::$ajaxu->value      = post('value');
            self::$ajaxu->data       = array_values(array_filter($ajaxu));
        }
    }