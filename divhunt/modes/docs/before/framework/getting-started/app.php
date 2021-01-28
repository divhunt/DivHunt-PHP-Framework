<?php

    $page = DivHunt::docsPage('framework', function($p)
    {
        $p->title('Getting Started')->slug('getting-started')->description('Start by learning more about framework, how it works, and to get easily started.')->time(11);
    });

    include 'sections.php';
    include 'functions.php';

    include 'methods/main.php';
    include 'methods/info.php';
    include 'methods/config.php';
    include 'methods/load.php';
    include 'methods/modes.php';
    include 'methods/paths.php';
    include 'methods/logging.php';
    include 'methods/timing.php';
