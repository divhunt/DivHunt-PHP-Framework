<?php

    $page = DivHunt::docsPage('framework', function($p)
    {
        $p->title('Mode: App')->slug('mode-app')->category('modes');
        $p->description('Most default mode, mode than runs your application and shows it to public world.')->time(1);
    });

    include 'sections.php';