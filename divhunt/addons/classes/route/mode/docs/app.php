<?php

    $page = DivHunt::docsPage('framework', function($p)
    {
        $p->title('Class: Route')->slug('class-route')->category('Classes');
        $p->description('Start creating application routes and organize your project even futher with framework class route.')->time(11);
    });

    include 'sections.php';
    include 'functions.php';
    include 'methods.php';
    include 'triggers.php';