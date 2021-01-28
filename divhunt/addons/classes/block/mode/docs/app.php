<?php

    $page = DivHunt::docsPage('framework', function($p)
    {
        $p->title('Class: Block')->slug('class-block')->category('Classes');
        $p->description('Start creating reusable dynamic HTML pieces of code and prevent code repetition.')->time(6);
    });

    include 'sections.php';
    include 'functions.php';
    include 'methods.php';
    include 'triggers.php';