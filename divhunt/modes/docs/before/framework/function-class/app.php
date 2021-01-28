<?php

    $page = DivHunt::docsPage('framework', function($p)
    {
        $p->title('Function: Class')->slug('function-class')->category('functions');
        $p->description('Grow functionality of framework by using official or 3rd party classes with built-in function class().')->time(5);
    });

    include 'sections.php';
    include 'functions.php';
    include 'triggers.php';