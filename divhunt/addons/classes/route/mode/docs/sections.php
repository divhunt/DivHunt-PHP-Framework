<?php

    DivHunt::docsSection($page, function($s)
    {
        $s->title('About');
        $s->h1('What is class Route?');
        $s->note('DivHunt::class("route")->from(DivHunt::getClassesPath(), true)');
        $s->p('Route helps you organize your project by loading certain files when certain urls has been accessed. Check basic usage below.');
        $s->code(__DIR__ . '/code/route.php');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Variables');
        $s->h1('Variables');
        $s->p('Routes are cappable of extracting dynamic values and turning them into variables.');
        $s->code(__DIR__ . '/code/vars.php');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Star');
        $s->h1('Star');
        $s->p('Using star, you can seperate routes in more large areas. Keep in mind that even if route is matched, it does not stop route from searching for new ones, as star does not full match route.');
        $s->p('Route can match wide range of URIs at same time, using "*" we can accomplish that.');
        $s->code(__DIR__ . '/code/star.php');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Paths');
        $s->h1('Paths');
        $s->p('Route provides options to save paths and reuse later. This option comes in hand if you want to be able to change path at one place and be automatically chaged everywhere, making it easier for you to be more dynamic.');
        $s->code(__DIR__ . '/code/paths.php');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('$_GET');
        $s->h1('$_GET');
        $s->p('Route can extract any $_GET values from URL');
        $s->code(__DIR__ . '/code/get-values.php');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Ajax');
        $s->h1('Ajax');
        $s->p('Route can automatically add file into Ajax mode.');
        $s->code(__DIR__ . '/code/ajax.php');
    });