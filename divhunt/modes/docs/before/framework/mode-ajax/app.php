<?php

    $page = DivHunt::docsPage('framework', function($p)
    {
        $p->title('Mode: Ajax')->slug('mode-ajax')->category('modes');
        $p->description('Fetch, update or do certain actions without refreshing page with ease thanks to "Ajax" mode.')->time(3);
    });

    include 'sections.php';
    include 'methods.php';
    include 'triggers.php';