<?php

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->title('bind_domain');
        $t->h1('bind_domain');
        $t->note('DivHunt::trigger("bind_domain")');
        $t->p('Runs trigger callback on domain successfull bind.');

        $t->h3('Callback Values');
        $t->parameter('object $domain', 'Binded domain data.');
    });
