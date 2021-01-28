<?php

    $page = DivHunt::docsPage('framework', function($p)
    {
        $p->title('Function: Trigger')->slug('function-trigger')->category('functions');
        $p->description('Trigger pieces of code on certain points in project such as shutdown, log, redirect, class load and more.')->time(5);
    });

    include 'sections.php';
    include 'functions.php';
    include 'methods.php';

    include 'triggers/shutdown.php';