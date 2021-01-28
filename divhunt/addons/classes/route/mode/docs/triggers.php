<?php

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->title('route_match');
        $t->h1('route_match');
        $t->note('DivHunt::trigger("route_match")');
        $t->p('Runs trigger callback once route is fully matched.');

        $t->h3('Callback Values');
        $t->parameter('object $route', 'Matched route data.');
    });

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->title('route_star_match');
        $t->h1('route_star_match');
        $t->note('DivHunt::trigger("route_star_match")');
        $t->p('Runs trigger callback once route is star match.');

        $t->h3('Callback Values');
        $t->parameter('object $route', 'Matched route data.');
    });