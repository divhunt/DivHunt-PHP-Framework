<?php

    $page = DivHunt::docsPage('framework', function($p)
    {
        $p->title('Class: Bind')->slug('class-bind')->category('Classes');
        $p->description('Recognize easily domain name and based on provided configuration load site files.')->time(3);
    });

    include 'sections.php';
    include 'functions.php';
    include 'methods.php';
    include 'triggers.php';