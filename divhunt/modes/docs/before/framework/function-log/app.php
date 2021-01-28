<?php

    $page = DivHunt::docsPage('framework', function($p)
    {
        $p->title('Function: Log')->slug('function-log')->category('functions');
        $p->description('Keep track of errors, warnings and notices. Write logs in files and warn users about their mistakes.')->time(5);
    });

    include 'sections.php';
    include 'functions.php';
    include 'methods.php';
    include 'triggers.php';