<?php

    $page = DivHunt::docsPage('framework', function($p)
    {
        $p->title('Mode: Docs')->slug('docs-app')->category('modes');
        $p->description('Explore, learn and contribute to your project documentation anytime and anywhere.')->time(16);
    });

    include 'sections.php';
    include 'functions.php';
    include 'methods.php';