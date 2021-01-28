<?php

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->title('log');
        $t->h1('log');
        $t->note('DivHunt::trigger("log")');
        $t->p('Runs trigger callback before executing log.');

        $t->h3('Callback Values');
        $t->parameter('object $log', 'Log data.');
    });
