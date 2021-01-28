<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('info');
        $f->title('getHost');
        $f->h1('getHost');
        $f->note('DivHunt::getHost() : string');
        $f->p('Returns host.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns string.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('info');
        $f->title('getRequestMethod');
        $f->h1('getRequestMethod');
        $f->note('DivHunt::getRequestMethod() : string');
        $f->p('Returns current active request method (GET,POST,PUT,DELETE).');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns string.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('info');
        $f->title('getURI');
        $f->h1('getURI');
        $f->note('DivHunt::getURI() : object');
        $f->p('Returns object with URI string and URI array.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns object.');
    });