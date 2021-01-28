<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('domain');
        $f->h1('domain');
        $f->note('bind::domain(callable $callback) : string');
        $f->p('Binds domain and returns string, path to specified file.');

        $f->h3('Paremeters');
        $f->parameter('callback', 'Use callback function to configure domain.');

        $f->h3('Callback Options');
        $f->parameter('->tdl(string $tdl)', 'Domain supported tdl.');
        $f->parameter('->domain(string $domain)', 'Domain name without tdl or subdomain.');
        $f->parameter('->subdomain(string $subdomain = false)', 'Subdomain name. False for no subdomain.');
        $f->parameter('->https(bool $https)', 'True, false or "any" to match both.');
        $f->parameter('->path(string $path)', 'Set file relative path based on framework configuration to be included if binded.');

        $f->h3('Return Values');
        $f->p('Function returns string, path to specified file if domain is binded, otherwise path to empty bind file.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/domain.php');
    });