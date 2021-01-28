<?php

    include 'cookies.set.php';
    include 'cookies.get.php';
    include 'cookies.remove.php';
    include 'cookies.settings.php';

    class cookies
    {
        use \CookiesSet, \CookiesGet, \CookiesRemove, \CookiesSettings;
    }