<?php
    
    $page = DivHunt::docsPage('framework', function($p)
    {
        $p->title('Class: Query Builder')->slug('class-query-builder')->category('Classes');
        $p->description('Simplifies query actions such as selects, inserts, deletes and updated.')->time(16);
    });

    include 'sections.php';
    include 'methods.php';
    include 'functions.php';