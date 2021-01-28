<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getPath');
        $f->h1('getPath');
        $f->note('block::getPath(string $key) : string');
        $f->p('Returns block predefined path if exist.');

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
        $f->note('block::setPath(string $key, string $path) : void');
        $f->p('Sets block path for later use.');

        $f->h3('Paremeters');
        $f->parameter('key', 'Path unique inditifier (key).');
        $f->parameter('path', 'Block path.');

        $f->h3('Return Values');
        $f->p('This method does not have any return value.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getPublicBlockPath');
        $f->h1('getPublicBlockPath');
        $f->note('route::getPublicBlockPath() : string');
        $f->p('Returns public block path.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns string');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getPublicBlockFile');
        $f->h1('getPublicBlockFile');
        $f->note('block::getPublicBlockFile(string $inditifier, string $type, bool $exist_check) : string');
        $f->p('Returns block public file path.');

        $f->h3('Paremeters');
        $f->parameter('inditifier', 'Block unique ID.');
        $f->parameter('type', '"css" or "js".');
        $f->parameter('exist_check', 'If true, method will check if file actually exist.');

        $f->h3('Return Values');
        $f->p('Returns string or false.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getStatic');
        $f->h1('getStatic');
        $f->note('block::getStatic(string $path, string $type) : string');
        $f->p('Returns code from block static files.');

        $f->h3('Paremeters');
        $f->parameter('path', 'Block path.');
        $f->parameter('type', '"css" or "js".');

        $f->h3('Return Values');
        $f->p('Returns string or false if there are no static files.');
    });
