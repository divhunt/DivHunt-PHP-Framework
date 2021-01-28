<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('var');
        $f->h1('var');
        $f->note('route::var(string $key) : scallar');
        $f->p('Returns extracted value from route.');

        $f->h3('Paremeters');
        $f->parameter('key', 'Variable key.');

        $f->h3('Return Values');
        $f->p('Returns scallar value (int, string, float...)');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getPath');
        $f->h1('getPath');
        $f->note('route::getPath(string $key) : string');
        $f->p('Returns route path if exist.');

        $f->h3('Paremeters');
        $f->parameter('key', 'Path unique inditifier (key).');

        $f->h3('Return Values');
        $f->p('Returns string if path exist, otherwise false.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('setPath');
        $f->h1('setPath');
        $f->note('route::setPath(string $key, string $path) : void');
        $f->p('Sets route path for later use.');

        $f->h3('Paremeters');
        $f->parameter('key', 'Path unique inditifier (key).');
        $f->parameter('path', 'Route path.');

        $f->h3('Return Values');
        $f->p('This method does not have any return value.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('setMatched');
        $f->h1('setMatched');
        $f->note('route::setMatched(bool $match) : void');
        $f->p('Set manually route match. Set true to cancel matching rest routes or false to continue matching.');

        $f->h3('Paremeters');
        $f->parameter('match', 'True or false.');

        $f->h3('Return Values');
        $f->p('This method does not have any return value.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('isMatched');
        $f->h1('isMatched');
        $f->note('route::isMatched() : bool');
        $f->p('Checks if route is matched.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getRoute');
        $f->h1('getRoute');
        $f->note('route::getRoute() : object');
        $f->p('Returns route if matched, if not returns false.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns object or false.');
    });