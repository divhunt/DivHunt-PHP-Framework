<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('main');
        $f->title('isConfigured');
        $f->h1('isConfigured');
        $f->note('DivHunt::isConfigured() : bool');
        $f->p('Checks if framework is properly configured.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('main');
        $f->title('isDevelop');
        $f->h1('isDevelop');
        $f->note('DivHunt::isDevelop() : bool');
        $f->p('Returns true if framework has develop enabled.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('main');
        $f->title('getPassword');
        $f->h1('getPassword');
        $f->note('DivHunt::getPassword() : string');
        $f->p('Returns modes password.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns string. Can also return null or false.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('main');
        $f->title('inShutdown');
        $f->h1('inShutdown');
        $f->note('DivHunt::inShutdown() : bool');
        $f->p('Return true if framework is in shutdown mode.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('main');
        $f->title('reload');
        $f->h1('reload');
        $f->note('DivHunt::reload(string $url) : void');
        $f->p('Redirects user to provided URL if headers are not sent, otherwise displays link.');

        $f->h3('Paremeters');
        $f->parameter('url', 'Internal or external link for redirection.');

        $f->h3('Return Values');
        $f->p('This method does not have return value.');
    });