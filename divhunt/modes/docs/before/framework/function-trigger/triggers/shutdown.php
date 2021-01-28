<?php

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->category('shutdown');
        $t->title('shutdown_before');
        $t->h1('shutdown_before');
        $t->note('DivHunt::trigger("shutdown_before")');
        $t->p('Runs trigger callback at framework shutdown before loading mode files.');

        $t->h3('Callback Values');
        $t->p('This trigger does not have any return values.');
    });

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->category('shutdown');
        $t->title('shutdown_after');
        $t->h1('shutdown_after');
        $t->note('DivHunt::trigger("shutdown_after")');
        $t->p('Runs trigger callback at framework shutdown after loading mode files.');

        $t->h3('Callback Values');
        $t->p('This trigger does not have any return values.');
    });

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->category('shutdown');
        $t->title('shutdown_headers_sent_before');
        $t->h1('shutdown_headers_sent_before');
        $t->note('DivHunt::trigger("shutdown_headers_sent_before")');
        $t->p('Runs trigger callback at framework shutdown before loading mode files and only if headers are sent.');

        $t->h3('Callback Values');
        $t->p('This trigger does not have any return values.');
    });

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->category('shutdown');
        $t->title('shutdown_headers_sent_after');
        $t->h1('shutdown_headers_sent_after');
        $t->note('DivHunt::trigger("shutdown_headers_sent_after")');
        $t->p('Runs trigger callback at framework shutdown after loading mode files and only if headers are sent.');

        $t->h3('Callback Values');
        $t->p('This trigger does not have any return values.');
    });

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->category('shutdown');
        $t->title('shutdown_headers_not_sent_before');
        $t->h1('shutdown_headers_not_sent_before');
        $t->note('DivHunt::trigger("shutdown_headers_not_sent_before")');
        $t->p('Runs trigger callback at framework shutdown before loading mode files and only if headers are not sent.');

        $t->h3('Callback Values');
        $t->p('This trigger does not have any return values.');
    });

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->category('shutdown');
        $t->title('shutdown_headers_not_sent_after');
        $t->h1('shutdown_headers_not_sent_after');
        $t->note('DivHunt::trigger("shutdown_headers_not_sent_after")');
        $t->p('Runs trigger callback at framework shutdown after loading mode files and only if headers are not sent.');

        $t->h3('Callback Values');
        $t->p('This trigger does not have any return values.');
    });
    