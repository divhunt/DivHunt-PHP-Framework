<?php

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->title('ajax_exit');
        $t->h1('ajax_exit');
        $t->note('DivHunt::trigger("ajax_exit")');
        $t->p('Runs trigger callback before exiting "Ajax" mode.');

        $t->h3('Callback Values');
        $t->parameter('array $data', 'Ajax output data.');
    });
